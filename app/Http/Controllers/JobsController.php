<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\jobs;
use App\Models\comments;
use App\Models\User;

class JobsController extends Controller
{
  private $product;
  private $jobs;
  private $user;

  public function __construct(jobs $jobs, comments $comments, User $user, Product $product){
      $this->jobs = $jobs;
      $this->comments = $comments;
      $this->user = $user;
      $this->product = $product;
  }
  public function index(Request $request, jobs $jobs, comments $comments, User $user, Product $product){

    // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
    $managerEmail = $request->input('manager');


    $userAllData = User::where('email', $managerEmail)->first();
    $userName = $userAllData->name;



    $data = $jobs->getData();
    $jobs = $this->jobs;
    $user = $user->getUserData();
    $comments = $comments->getAllComments();
    $product = $product->getProductData();

    // produce/index.blade 에 $products 를 보내줍니다
    // return view('products.user-info', compact('jobs'));
    // return view('products.user-info', ['data' => $data, 'comments' => $comments, 'user' => $user, 'userAllData' => $userAllData]);
    return view('products.user-info', ['data' => $data, 'user' => $user, 'userAllData' => $userAllData, 'comments' => $comments, 'product' => $product]);
  }

}
