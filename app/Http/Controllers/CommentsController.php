<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;


class CommentsController extends Controller
{

    private $comments;

    public function __construct(comments $comments){
        // Laravel 의 IOC(Inversion of Control) 입니다
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
        $this->comments = $comments;
    }



    public function index(Request $request, comments $comments)
    {
    $commentData = $comments->getData();
    // 로그파일에 기록
    /*
    $logData = '데이터가 없습니다';
    if ($commentData->isEmpty()) {
    echo "데이터가 없습니다.";
    dd($logData);
    Log::info($logData);
    } else {
    $logData = '데이터가 있습니다';
    dd($logData);
    Log::info($logData);
    }
    */

    return view('products.user-info', ['comment' => $commentData]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make(request()->all(), [
            // 'parent_id' => 'required',
            'commentStory' => 'required|max:255'
        ]);
        if($validator->fails()){
            // return redirect()->back();
            return redirect()->back()->withErrors($validator)->withInput()->with('error', '댓글 등록에 실패했습니다.');
        } else{
            $productID = $request->input('product_id');
            print_r($productID);
            $userName = $request->input('userName');
            $memberID = $request->input('member_id');
            Comments::create([
                'product_id' => $productID,
                'userID' => auth() -> id(),
                // 'userName' => Auth::user()->name,
                'member_id' => $memberID,
                'userName' => $userName,
                'content' => request() -> commentStory
            ]);
            session()->flash('success', '댓글이 성공적으로 등록되었습니다.');
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(comments $comments)
    {
        //
    }
}
