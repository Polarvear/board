<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(Request $request) {
      // return "Hello from controller";
      return $request->file('file')->store('docs');
    }
}
