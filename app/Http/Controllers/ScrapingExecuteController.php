<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ScrapingExecuteController extends Controller
{
  public function execute()
  {
    return redirect('scraping');
  }
}
