<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
  public function index(Request $request)
  {
      // 새로운 페이지의 로직 수행
      // 필요한 데이터 가져오기 등
      
      return view('products.user-info'); // 뷰 반환
  }
}
