<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
  public function index(Request $request) {
    if ($request->hasFile('files')) {
        $files = $request->file('files');
        $paths = [];

        foreach ($files as $file) {
            $path = $file->store('docs');
            $paths[] = $path;
        }

        return $paths;
    }

    return response()->json(['message' => 'No files uploaded.']);
  }
}
