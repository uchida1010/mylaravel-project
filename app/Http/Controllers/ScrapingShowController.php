<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapingShowController extends Controller
{
    public function show()
    {
        $message = 'これがスクレイピング画面です';
        return view('scraping.show', compact('message'));
    }
}
