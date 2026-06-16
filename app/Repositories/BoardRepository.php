<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;
use Throwable;

final class BoardRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connection();
    }

    /** @return array<int, array<string, mixed>> */
    public function latest(string $type, int $limit = 5): array
    {
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
        $stmt = $this->db->prepare('SELECT * FROM board_posts WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return is_array($row) ? $row : null;
    }

    public function count(string $type): int
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM board_posts WHERE board_type = :type');
        $stmt->execute(['type' => $type]);

        return (int) $stmt->fetchColumn();
    }

    /** @return array<int, array<string, mixed>> */
    private function fallback(string $type): array
    {
        $items = [
            'notice' => [
                ['id' => 27, 'title' => '특허청 상표등록증을 획득하였습니다.', 'date' => '2021-03-10'],
                ['id' => 23, 'title' => '대한민국 공사비 정보 플랫폼, ‘공사비닷컴’', 'date' => '2020-11-27'],
                ['id' => 22, 'title' => '[인터뷰] ‘건축견적 이야기’ 펴낸 현동명 대표', 'date' => '2020-11-27'],
                ['id' => 21, 'title' => '건축견적이야기 출판기념회 성료 (건설경제)', 'date' => '2020-11-27'],
            ],
            'pds' => ['공사비 산정 기초 자료', '내역서 검토 체크리스트', '공사기간 산정 참고표'],
            'faq' => ['회원가입은 어떻게 하나요?', '결제 후 영수증은 어디서 확인하나요?', '공사비 보고서는 어떻게 저장되나요?'],
        ][$type] ?? ['게시글 준비중'];

        if ($type === 'notice') {
            return array_map(static fn (array $item): array => [
                'id' => $item['id'],
                'board_type' => 'notice',
                'title' => $item['title'],
                'content' => '원본 사이트 기준 공지사항입니다.',
                'created_at' => $item['date'] . ' 00:00:00',
                'views' => 0,
            ], $items);
        }

        return array_map(static fn (string $title, int $index): array => [
            'id' => $index + 1,
            'board_type' => $type,
            'title' => $title,
            'content' => '관리자에서 실제 내용을 등록하면 이 영역에 노출됩니다.',
            'created_at' => date('Y-m-d H:i:s'),
            'views' => 0,
        ], $titles, array_keys($titles));
    }
}
