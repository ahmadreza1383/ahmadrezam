<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutMeController extends Controller
{
    public $file = "about-me.html";
    //
    public function edit()
    {
        $content = Storage::disk('local')->get($this->file);
        return view('panel/about-me', compact('content'));
    }

    public function update(Request $request)
    {
        Storage::disk('local')->put($this->file, $request->content);
        echo "success";
    }
}
