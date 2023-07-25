<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class NaverController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('naver')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('naver')->user();
        // 로그인 처리 또는 회원 가입 등의 로직을 수행합니다.

        return redirect()->route('home');
    }
}
