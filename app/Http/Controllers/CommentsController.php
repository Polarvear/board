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
    } //end store


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

        $requestDataId = $request->commentId;
        $requestDataText = $request->commentText;


        try {
            // 오류가 발생할 수 있는 코드
            // 해당 commentId에 해당하는 레코드를 업데이트
            $comment = comments::where('id', $requestDataId)->first();
            if (!$comment) {
                return response()->json(['error' => '해당 댓글을 찾을 수 없습니다.'], 404);
            }

            // 댓글 내용을 업데이트
            $comment->comments = $requestDataText;
            $comment->save();
        } catch (\Exception $e) {
            // 오류 처리 및 로그 기록
            Log::error($e->getMessage());
            // 브라우저에 오류 메시지를 반환하거나 적절한 응답을 전송
            return response()->json(['error' => '오류가 발생했습니다.'], 500);
        }

        // 정상적인 응답을 반환
        return response()->json(['commentText' => $comment->comments]);
    } //end update

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
    } //end destroy



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, comments $comments)
    {
        // dd($request->all());
        $commentStatus = $request->commentStatus;
        $commentId = $request->commentId;

        try {
            // 오류가 발생할 수 있는 코드
            // 해당 commentId에 해당하는 레코드를 업데이트
            $comment = comments::where('id', $commentId)->first();
            if (!$comment) {
                return response()->json(['error' => '해당 댓글을 찾을 수 없습니다.'], 404);
            }

            // 댓글 내용을 업데이트
            $comment->status = 1;
            $comment->save();
        } catch (\Exception $e) {
            // 오류 처리 및 로그 기록
            Log::error($e->getMessage());
            // 브라우저에 오류 메시지를 반환하거나 적절한 응답을 전송
            return response()->json(['error' => '오류가 발생했습니다.'], 500);
        }

        // return back()->with('success', '댓글이 성공적으로 삭제되었습니다.');
        return response()->json(['status' => $comment->status]);
    }  //end status




    public function statusChange(Request $request, comments $comments)
    {
        // dd($request->all());
        $commentStatus = $request->commentStatus;
        $commentId = $request->commentId;

        try {
            // 오류가 발생할 수 있는 코드
            // 해당 commentId에 해당하는 레코드를 업데이트
            $comment = comments::where('id', $commentId)->first();
            if (!$comment) {
                return response()->json(['error' => '해당 댓글을 찾을 수 없습니다.'], 404);
            }

            // 댓글 내용을 업데이트
            $comment->status = 2;
            $comment->save();
        } catch (\Exception $e) {
            // 오류 처리 및 로그 기록
            Log::error($e->getMessage());
            // 브라우저에 오류 메시지를 반환하거나 적절한 응답을 전송
            return response()->json(['error' => '오류가 발생했습니다.'], 500);
        }

        // return back()->with('success', '댓글이 성공적으로 삭제되었습니다.');
        return response()->json(['status' => $comment->status]);
    }  //end status


}
