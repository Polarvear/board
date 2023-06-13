<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\jobs;

class JobsController extends Controller
{
  private $product;
  private $jobs;

  public function __construct(jobs $jobs){
      // Laravel 의 IOC(Inversion of Control) 입니다
      // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
      $this->jobs = $jobs;
  }
  public function index(Request $request, jobs $jobs){
    // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
    $data = $jobs->getData();
    $jobs = $this->jobs;
    // produce/index.blade 에 $products 를 보내줍니다
    // return view('products.user-info', compact('jobs'));
    return view('products.user-info', ['data' => $data]);
  }

}
