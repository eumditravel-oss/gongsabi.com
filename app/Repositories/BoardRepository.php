<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;
use Throwable;

final class BoardRepository
{
    private ?PDO $db = null;

    public function __construct()
    {
        try {
            $this->db = Database::connection();
        } catch (Throwable) {
            $this->db = null;
        }
    }

    /** @return array<int, array<string, mixed>> */
    public function latest(string $type, int $limit = 5): array
    {
        if (!$this->db) {
            return $this->fallback($type);
        }
        try {
            $stmt = $this->db->prepare('SELECT * FROM board_posts WHERE board_type = :type AND is_published = 1 ORDER BY id DESC LIMIT :limit');
            $stmt->bindValue('type', $type);
            $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows ?: $this->fallback($type);
        } catch (Throwable) {
            return $this->fallback($type);
        }
    }

    /** @return array<int, array<string, mixed>> */
    public function search(string $type, string $keyword = ''): array
    {
        if (!$this->db) {
            return $this->fallback($type);
        }
        try {
            $sql = 'SELECT * FROM board_posts WHERE board_type = :type AND is_published = 1';
            $params = ['type' => $type];
            if ($keyword !== '') {
                $sql .= ' AND (title LIKE :keyword OR content LIKE :keyword)';
                $params['keyword'] = '%' . $keyword . '%';
            }
            $sql .= ' ORDER BY is_notice DESC, id DESC LIMIT 50';

            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $rows = $stmt->fetchAll();
            return $rows ?: $this->fallback($type);
        } catch (Throwable) {
            return $this->fallback($type);
        }
    }

    /** @return array<string, mixed>|null */
    public function find(int $id): ?array
    {
        if (!$this->db) {
            foreach (['notice','pds','faq'] as $type) {
                foreach ($this->fallback($type) as $row) {
                    if ((int)$row['id'] === $id) {
                        return $row;
                    }
                }
            }
            return null;
        }
        try {
            $stmt = $this->db->prepare('SELECT * FROM board_posts WHERE id = :id LIMIT 1');
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch();
            return is_array($row) ? $row : null;
        } catch (Throwable) {
            return null;
        }
    }

    public function count(string $type): int
    {
        if (!$this->db) {
            return count($this->fallback($type));
        }
        try {
            $stmt = $this->db->prepare('SELECT COUNT(*) FROM board_posts WHERE board_type = :type');
            $stmt->execute(['type' => $type]);
            return (int) $stmt->fetchColumn();
        } catch (Throwable) {
            return count($this->fallback($type));
        }
    }

    /** @return array<int, array<string, mixed>> */
    private function fallback(string $type): array
    {
        $sets = [
            'notice' => [
                ['공사비닷컴 온라인 회원이 되시면', '면적당 공사비 정보의 샘플 검색, 공사 단가 검색의 샘플 검색, 골조 면적별 수량 검색의 샘플 검색을 무료로 제공합니다.', '2020-11-27 00:00:00'],
                ['공사비닷컴 리뉴얼 준비 안내', '기존 서비스 복원을 위한 임시 공지입니다.', date('Y-m-d H:i:s')],
                ['신규 회원 DB 운영 안내', '회원 정보와 검색 권한은 신규 DB에서 관리됩니다.', date('Y-m-d H:i:s')],
            ],
            'pds' => [
                ['공사비 산정 기초 자료', '공사비 산정 흐름을 확인할 수 있는 기초 자료입니다.', date('Y-m-d H:i:s')],
                ['내역서 검토 체크리스트', '건축 및 골조 내역서 검토 항목입니다.', date('Y-m-d H:i:s')],
                ['공사기간 산정 참고표', '공사기간 산정 기준 검토용 참고표입니다.', date('Y-m-d H:i:s')],
            ],
            'faq' => [
                ['회원가입은 어떻게 하나요?', '무료회원과 유료회원으로 가입할 수 있습니다.', date('Y-m-d H:i:s')],
                ['결제 후 영수증은 어디서 확인하나요?', '마이페이지에서 확인할 수 있습니다.', date('Y-m-d H:i:s')],
                ['공사비 검색 결과는 어디서 확인하나요?', '마이페이지 > 공사비검색에서 스크랩 내용을 확인할 수 있습니다.', date('Y-m-d H:i:s')],
            ],
        ];
        $rows = $sets[$type] ?? [['게시글 준비중', '관리자에서 실제 내용을 등록하면 이 영역에 노출됩니다.', date('Y-m-d H:i:s')]];
        return array_map(static fn (array $row, int $index): array => [
            'id' => $index + 1,
            'board_type' => $type,
            'title' => $row[0],
            'content' => $row[1],
            'created_at' => $row[2],
            'views' => 0,
            'is_notice' => $index === 0 ? 1 : 0,
        ], $rows, array_keys($rows));
    }
}
