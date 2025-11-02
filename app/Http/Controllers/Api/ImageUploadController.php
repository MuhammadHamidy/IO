<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->file('file')) {
        $path = $request->file('file')->store('contents', 'public');
        return response()->json(['location' => '/storage/' . $path]);
    }

    return response()->json(['location' => null], 400);
}
}
