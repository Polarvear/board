<?php

namespace App\Http\Controllers;
use App\Models\Product; // product 모델 사용
use App\Models\User;
use Illuminate\Http\Request;


class AdminPagesController extends Controller
{

    private $product;

    public function __construct(Product $product){
      // Laravel 의 IOC(Inversion of Control) 입니다
      // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
      $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(10); // 페이지네이션
        // $products = Product::all();
        return view('admin.pages.index', compact('products'));
    }


    public function create()
    {
        // $products = Product::all();
        return view('admin.pages.create');
    }



    public function userAjax(Request $request)
    {
        $term = $request->input('term'); //사용자 입력값
        $users = User::where('name', 'LIKE', '%' . $term . '%')->pluck('name');
        return response()->json($users);
    }
}
