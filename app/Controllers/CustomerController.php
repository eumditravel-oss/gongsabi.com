<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Repositories\BoardRepository;
use App\Repositories\InquiryRepository;

final class CustomerController extends BaseController
{
    public function notice(Request $request): Response
    {
        return $this->board($request, 'notice', '공지사항');
    }

    public function pds(Request $request): Response
    {
        return $this->board($request, 'pds', '자료실');
    }

    public function faq(Request $request): Response
    {
        return $this->board($request, 'faq', '자주 묻는 질문');
    }

    public function show(Request $request, string $id): Response
    {
        $post = (new BoardRepository())->find((int) $id);
        if (!$post) {
            return $this->view('pages/404', ['title' => '게시글을 찾을 수 없습니다.']);
        }

        return $this->view('customer/show', ['title' => (string) $post['title'], 'post' => $post]);
    }

    public function qnaForm(Request $request): Response
    {
        return $this->view('customer/qna', ['title' => 'Q&A']);
    }

    public function qnaStore(Request $request): Response
    {
        if ($response = $this->requireCsrf($request)) {
            return $response;
        }

        $name = trim((string) $request->input('name', ''));
        $email = trim((string) $request->input('email', ''));
        $title = trim((string) $request->input('title', ''));
        $content = trim((string) $request->input('content', ''));

        if ($name === '' || $title === '' || $content === '') {
            Flash::set('error', '문의 내용을 입력해 주세요.');
            return $this->redirect('/front/customer/qna');
        }

        (new InquiryRepository())->create([
            'user_id' => Auth::id(),
            'name' => $name,
            'email' => $email,
            'title' => $title,
            'content' => $content,
        ]);

        Flash::set('success', '문의가 접수되었습니다.');
        return $this->redirect('/front/customer/qna');
    }

    private function board(Request $request, string $type, string $title): Response
    {
        $keyword = trim((string) $request->input('keyword', ''));
        $posts = (new BoardRepository())->search($type, $keyword);

        return $this->view('customer/list', [
            'title' => $title,
            'boardType' => $type,
            'keyword' => $keyword,
            'posts' => $posts,
        ]);
    }
}
