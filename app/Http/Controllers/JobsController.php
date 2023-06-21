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

  public function __construct(jobs $jobs, comments $comments, User $user){
      $this->jobs = $jobs;
      $this->comments = $comments;
      $this->user = $user;
  }
  public function index(Request $request, jobs $jobs, comments $comments, User $user){
    // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
    $data = $jobs->getData();
    $jobs = $this->jobs;
    $user = $user->getUserData();
    $comments = $comments->getAllComments();

    // produce/index.blade 에 $products 를 보내줍니다
    // return view('products.user-info', compact('jobs'));
    return view('products.user-info', ['data' => $data, 'comments' => $comments, 'user' => $user]);
  }

}
