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
            foreach (['notice', 'pds', 'faq'] as $type) {
                foreach ($this->fallback($type) as $row) {
                    if ((int) $row['id'] === $id) {
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
            foreach (['notice', 'pds', 'faq'] as $type) {
                foreach ($this->fallback($type) as $row) {
                    if ((int) $row['id'] === $id) {
                        return $row;
                    }
                }
            }
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
        $items = [
            'notice' => [
                ['대한민국 공사비 정보 플랫폼, 공사비닷컴이 오픈하였습니다.', '면적당 공사비 정보의 샘플 검색, 공사 단가 검색, 골조 수량 검색 등 온라인 회원 서비스를 제공합니다.', '2020-11-27', 1],
                ['공사비닷컴 온라인 회원이 되시면', '면적당 공사비 정보의 샘플 검색과 공사비 교육, 자료실을 이용하실 수 있습니다.', '2020-11-27', 1],
                ['공사비닷컴 리뉴얼 준비 안내', '기존 경로와 메뉴 구성을 유지하면서 새 호스팅에 맞게 재구현합니다.', date('Y-m-d'), 0],
            ],
            'pds' => [
                ['공사비 산정 기초 자료', '공사비와 관련한 다양하고 유용한 정보를 제공합니다.', date('Y-m-d'), 0],
                ['내역서 검토 체크리스트', '건축 및 골조 내역서 검토 시 확인할 항목입니다.', date('Y-m-d'), 0],
                ['공사기간 산정 참고표', '면적, 층수, 구조 조건별 공사기간 산정 참고표입니다.', date('Y-m-d'), 0],
            ],
            'faq' => [
                ['전화 상담이 어려운 경우 어떻게 하나요?', "공사비닷컴의 이메일 'cs@gongsabi.com'로 문의 남겨주시면 순차적으로 도와드립니다.", date('Y-m-d'), 0],
                ['비회원도 공사비 검색이 가능한가요?', '비회원과 무료회원은 샘플만 검색이 가능하고 유료회원 가입 시 전체 정보를 검색할 수 있습니다.', date('Y-m-d'), 0],
                ['스크랩한 공사비 자료는 어디서 보나요?', '마이페이지 > 공사비검색 메뉴에서 확인할 수 있도록 구성합니다.', date('Y-m-d'), 0],
            ],
        ][$type] ?? [['게시글 준비중', '관리자에서 실제 내용을 등록하면 이 영역에 노출됩니다.', date('Y-m-d'), 0]];

        return array_map(static fn (array $item, int $index): array => [
            'id' => $index + 1,
            'board_type' => $type,
            'title' => $item[0],
            'content' => $item[1],
            'is_notice' => $item[3],
            'created_at' => $item[2] . ' 00:00:00',
            'views' => 0,
        ], $items, array_keys($items));
    }
}
