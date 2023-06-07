<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  private $product;

  public function __construct(product $product){
      // Laravel 의 IOC(Inversion of Control) 입니다
      // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
      $this->product = $product;
  }
  public function index(){
    // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
    $products = $this->product->latest()->paginate(10);
    // produce/index.blade 에 $products 를 보내줍니다
    return view('products.index', compact('products')); //
  }

  public function create(){
    
    return view('products.create');
  }

  public function store(Request $request)
{
  // Request 에 대한 유효성 검사입니다, 다양한 종류가 있기에 공식문서를 보시는 걸 추천드립니다.
  // 유효성에 걸린 에러는 errors 에 담깁니다.
    $request->validate([
        'name' => 'required', //필수 데이터
        'content' => 'required', //필수 데이터
        'process-type' => 'required', //필수 데이터
        'files.*' => 'required|file' // files[] 필드에 대한 유효성 검사 규칙입니다
    ]);

    if ($request->hasFile('files')) {
        $files = $request->file('files');
        $paths = [];

        foreach ($files as $file) {
            $path = $file->store('docs');
            $paths[] = $path;
        }

        $requestData = $request->except('files');  //요청 데이터에서 "files" 필드를 제외합니다
        $requestData['files'] = $paths; // 업로드된 파일들의 경로를 요청 데이터에 추가합니다
        $requestData['type'] = $request->input('process-type'); // 넘어온 process-type도 함께 추가합니다

        $this->product->create($requestData);

        return redirect()->route('products.index');
    }

    return response()->json(['message' => '파일 업로드 실패']);
}

  // 상세 페이지
  public function show(Product $product){
  // show 에 경우는 해당 페이지의 모델 값이 파라미터로 넘어옵니다.
    return view('products.show', compact('product'));
  }

  public function edit(Product $product){
    return view('products.edit', compact('product'));
  }

  public function update(Request $request, Product $product){
    // dd($request->all());

    // dd($product);
    $request = $request->validate([
        'name' => 'required',
        'content' => 'required'
    ]);
    // $product는 수정할 모델 값이므로 바로 업데이트 해줍시다.
    $product->update($request);
    return redirect()->route('products.index', $product);
  }

  public function destroy(Product $product){
    $product->delete();
    return redirect()->route('products.index');
  }
}
