<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // 디버깅 위해서 사용

class UserController extends Controller
{

    public function index(Request $request){

        $requestEmail = $request->manager;
        $userAllData = User::where('email', $requestEmail)->first();
        return view('admin.manage.profile', ['userAllData' => $userAllData]);
      }


      public function edit(Request $request){
        $requestEmail = $request->manager;
        $userAllData = User::where('email', $requestEmail)->first();
        return view('admin.manage.edit', ['userAllData' => $userAllData]);
      }

      public function update(Request $request){

        $users = User::all();
        // dd($request->all());
        $rules = [ // 유효성 검사
            'company' => 'required',
            'phone' => 'required',
        ];

        $validator = Validator::make(request()->all(), $rules);
        if($validator->fails()){
            // return redirect()->back();
            return redirect()->back()
                ->withErrors($rules)
                ->withInput()
                ->with('error', '소속(팀)을 제외하고는 빈칸을 채워주세요.');
        } else {
            $user = User::where('email', $request->email);
            if ($user) {
                    $user->update([
                    'company' => $request->company,
                    'phone' => $request->phone,
                    'team' =>  $request->input('team'),
                ]);
            }


        }
        return view('admin.manage.index', compact('users'));
      }
}
