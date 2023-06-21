<?php

namespace App\Http\Controllers;
use App\Models\User; // user 모델 사용
use Illuminate\Http\Request;

class AdminManageController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.manage.index', compact('users'));
    }


    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.manage.index');
      }
}
