<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapingShowController extends Controller
{
    public function show()
    {
        $message = '競合調査';
        return view('scraping.show', compact('message'));
    }
}
