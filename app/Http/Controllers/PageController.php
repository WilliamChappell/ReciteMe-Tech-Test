<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;
class PageController extends Controller
{
    public function index()
    {
        return view('main', ['feeds' => Feed::all()]);
    }
}
