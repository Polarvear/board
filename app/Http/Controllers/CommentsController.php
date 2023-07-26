<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Log;


class CommentsController extends Controller
{


    public function __construct(){
        // Laravel 의 IOC(Inversion of Control) 입니다
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
    }



    public function index() {
    }


    public function create() // 댓글 등록기능
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
            // print_r($productID);
            // $userName = $request->input('userName');
            $memberID = $request->input('member_id');
            // print_r(request()->commentStory);
            // print_r($memberID);
            // exit;

            Comments::create([
                'product_id' => $productID,
                // 'userID' => auth()->id(),
                // 'userName' => Auth::user()->name,
                'flow_num' => $memberID,
                // 'user_name' => $userName,
                'comments' => request()->commentStory
            ]);
            session()->flash('success', '댓글이 성공적으로 등록되었습니다.');
            // exit;
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
    public function destroy(Request $request)
    {

        $commentId = $request->input('comment-id');
        $comment = DB::table('comments')->find($commentId);

        if (!$comment) {
            return back()->with('error', '삭제할 댓글을 찾을 수 없습니다.');
        }

        // 댓글 삭제
        DB::table('comments')->where('id', $commentId)->delete();
        return back()->with('success', '댓글이 성공적으로 삭제되었습니다.');
    }
}
