<?php

declare(strict_types=1);

namespace App\Services;

final class ReportEstimator
{
    /** @param array<string, mixed> $input @return array<string, mixed> */
    public function estimate(array $input): array
    {
        $area = max(0, (float) ($input['area'] ?? 0));
        $floors = max(1, (int) ($input['floors'] ?? 1));
        $basement = max(0, (int) ($input['basement'] ?? 0));
        $structure = (string) ($input['structure'] ?? 'reinforced_concrete');
        $finish = (string) ($input['finish_grade'] ?? 'standard');
        $region = (string) ($input['region'] ?? 'seoul');
        $building = (string) ($input['building_type'] ?? 'office');
        $type = (string) ($input['report_type'] ?? 'geonchuk');

        $baseUnit = $this->baseUnitPrice($structure) * $this->buildingRatio($building);
        $unitPrice = $baseUnit * $this->finishRatio($finish) * $this->regionRatio($region);
        $directCost = (int) round($area * $unitPrice);
        $floorPremium = (int) round($directCost * max(0, $floors - 3) * 0.018);
        $basementPremium = (int) round($directCost * $basement * 0.035);
        $adjustedDirect = $directCost + $floorPremium + $basementPremium;
        $indirectRatio = $this->indirectRatio($adjustedDirect, $building);
        $indirectCost = (int) round($adjustedDirect * $indirectRatio);
        $vat = (int) round(($adjustedDirect + $indirectCost) * 0.1);
        $total = $adjustedDirect + $indirectCost + $vat;

        $months = $this->durationMonths($area, $floors, $basement, $structure);
        $quantity = $this->structureQuantity($area, $structure);

        return [
            'report_type' => $type,
            'area' => $area,
            'unit_price' => (int) round($unitPrice),
            'direct_cost' => $directCost,
            'floor_premium' => $floorPremium,
            'basement_premium' => $basementPremium,
            'adjusted_direct_cost' => $adjustedDirect,
            'indirect_ratio' => round($indirectRatio * 100, 2),
            'indirect_cost' => $indirectCost,
            'vat' => $vat,
            'total' => $total,
            'duration_months' => $months,
            'quantity' => $quantity,
            'notes' => [
                '건물종류, 지역, 면적, 착공년도 입력 흐름을 기준으로 재구현한 산정 로직입니다.',
                '운영 DB에 실제 과거 내역서와 단가를 입력하면 기준 단가 테이블을 교체하여 사용할 수 있습니다.',
            ],
        ];
    }

    private function baseUnitPrice(string $structure): float
    {
        return [
            'reinforced_concrete' => 1850000,
            'steel' => 1420000,
            'src' => 2050000,
            'wood' => 1280000,
            'remodeling' => 960000,
        ][$structure] ?? 1850000;
    }

    private function buildingRatio(string $building): float
    {
        return ['office' => 1.0, 'housing' => 1.07, 'commercial' => 0.96, 'factory' => 0.84, 'medical' => 1.24, 'education' => 1.08][$building] ?? 1.0;
    }

    private function finishRatio(string $finish): float
    {
        return ['economy' => 0.86, 'standard' => 1.0, 'premium' => 1.22, 'luxury' => 1.38][$finish] ?? 1.0;
    }

    private function regionRatio(string $region): float
    {
        return ['seoul' => 1.08, 'gyeonggi' => 1.03, 'metro' => 1.03, 'local' => 0.97, 'jeju' => 1.12][$region] ?? 1.0;
    }

    private function indirectRatio(int $directCost, string $building): float
    {
        $base = $directCost >= 10000000000 ? 0.092 : ($directCost >= 3000000000 ? 0.105 : 0.118);
        return $base + (['medical' => 0.012, 'factory' => -0.01, 'housing' => 0.004][$building] ?? 0.0);
    }

    private function durationMonths(float $area, int $floors, int $basement, string $structure): int
    {
        $structureAdd = ['steel' => -1, 'src' => 1, 'remodeling' => -2][$structure] ?? 0;
        return max(1, (int) ceil($area / 450) + (int) ceil($floors / 4) + $basement + $structureAdd);
    }

    /** @return array<string, string> */
    private function structureQuantity(float $area, string $structure): array
    {
        if ($structure === 'steel') {
            return ['concrete' => number_format($area * 0.31, 2) . '㎥', 'rebar' => number_format($area * 0.045, 3) . 'ton', 'steel' => number_format($area * 0.078, 3) . 'ton', 'form' => number_format($area * 1.8, 2) . '㎡'];
        }
        return ['concrete' => number_format($area * 0.82, 2) . '㎥', 'rebar' => number_format($area * 0.135, 3) . 'ton', 'steel' => '-', 'form' => number_format($area * 4.9, 2) . '㎡'];
    }
}
