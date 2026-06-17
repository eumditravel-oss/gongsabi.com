<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Repositories\UserRepository;

final class AuthController extends BaseController
{
    public function loginForm(Request $request): Response
    {
        return $this->view('auth/login', ['title' => '로그인']);
    }

    public function login(Request $request): Response
    {
        if ($response = $this->requireCsrf($request)) {
            return $response;
        }

        $email = trim((string) $request->input('email', ''));
        $password = (string) $request->input('password', '');
        $user = (new UserRepository())->findByEmail($email);

        if (!$user || !password_verify($password, (string) $user['password_hash'])) {
            Flash::set('error', '아이디 또는 비밀번호가 올바르지 않습니다.');
            return $this->redirect('/front/auth/login');
        }

        Auth::login((int) $user['id']);
        return $this->redirect('/');
    }

    public function registerForm(Request $request): Response
    {
        return $this->view('auth/register', ['title' => '회원가입']);
    }

    public function register(Request $request): Response
    {
        if ($response = $this->requireCsrf($request)) {
            return $response;
        }

        $email = trim((string) $request->input('email', ''));
        $password = (string) $request->input('password', '');
        $name = trim((string) $request->input('name', ''));
        $phone = trim((string) $request->input('phone', ''));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8 || $name === '') {
            Flash::set('error', '필수 정보를 다시 확인해 주세요. 비밀번호는 8자 이상입니다.');
            return $this->redirect('/front/auth/regist');
        }

        $repo = new UserRepository();
        if ($repo->findByEmail($email)) {
            Flash::set('error', '이미 가입된 이메일입니다.');
            return $this->redirect('/front/auth/regist');
        }

        $userId = $repo->create([
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'phone' => $phone,
            'company' => trim((string) $request->input('company', '')),
            'role' => 'member',
        ]);

        Auth::login($userId);
        Flash::set('success', '회원가입이 완료되었습니다.');
        return $this->redirect('/');
    }

    public function logout(Request $request): Response
    {
        if ($response = $this->requireCsrf($request)) {
            return $response;
        }

        Auth::logout();
        return $this->redirect('/');
    }

    public function mypage(Request $request): Response
    {
        if (!Auth::user()) {
            Flash::set('error', '로그인이 필요합니다.');
            return $this->redirect('/front/auth/login');
        }

        return $this->view('auth/mypage', ['title' => '마이페이지', 'user' => Auth::user()]);
    }
}
