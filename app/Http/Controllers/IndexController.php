<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Panel\AboutMeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    //
    public function index()
    {
        $about = new AboutMeController();
        $content = Storage::disk('local')->get($about->file);

        return view('index' , compact('content'));
    }
}
