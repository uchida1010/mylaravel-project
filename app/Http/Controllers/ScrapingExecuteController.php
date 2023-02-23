<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapingExecuteController extends Controller
{
    public function show(){
      $title = 'フォーム受け取り成功';

      return view('scraping.send', compact('title'));
    }
}