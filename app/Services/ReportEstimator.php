<?php

declare(strict_types=1);

namespace App\Services;

final class ReportEstimator
{
    /** @param array<string, mixed> $input */
    public function estimate(array $input): array
    {
        $area = max(0, (float) ($input['area'] ?? 0));
        $floors = max(1, (int) ($input['floors'] ?? 1));
        $structure = (string) ($input['structure'] ?? 'reinforced_concrete');
        $finish = (string) ($input['finish_grade'] ?? 'standard');
        $region = (string) ($input['region'] ?? 'seoul');

        $unitPrice = $this->baseUnitPrice($structure) * $this->finishRatio($finish) * $this->regionRatio($region);
        $directCost = (int) round($area * $unitPrice);
        $floorPremium = (int) round($directCost * max(0, $floors - 3) * 0.018);
        $indirectCost = (int) round(($directCost + $floorPremium) * 0.115);
        $vat = (int) round(($directCost + $floorPremium + $indirectCost) * 0.1);
        $total = $directCost + $floorPremium + $indirectCost + $vat;

        return [
            'area' => $area,
            'unit_price' => (int) round($unitPrice),
            'direct_cost' => $directCost,
            'floor_premium' => $floorPremium,
            'indirect_cost' => $indirectCost,
            'vat' => $vat,
            'total' => $total,
            'duration_months' => max(1, (int) ceil($area / 350) + (int) ceil($floors / 4)),
            'notes' => [
                '초기 산식은 운영자가 관리자에서 실제 단가와 보정률을 입력하기 전까지 사용하는 기준값입니다.',
                '기존 서버 소스가 없는 상태라 공개 화면 흐름을 기준으로 재구현했습니다.',
            ],
        ];
    }

    private function baseUnitPrice(string $structure): float
    {
        return [
            'reinforced_concrete' => 1850000,
            'steel' => 1420000,
            'wood' => 1280000,
            'remodeling' => 960000,
        ][$structure] ?? 1850000;
    }

    private function finishRatio(string $finish): float
    {
        return [
            'economy' => 0.86,
            'standard' => 1.0,
            'premium' => 1.22,
        ][$finish] ?? 1.0;
    }

    private function regionRatio(string $region): float
    {
        return [
            'seoul' => 1.08,
            'metro' => 1.03,
            'local' => 0.97,
            'jeju' => 1.12,
        ][$region] ?? 1.0;
    }
}
