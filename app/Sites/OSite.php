<?php

namespace App\Sites;

use App\Sites\Site;
use Illuminate\Http\Request;
use \App\Http\Requests\ScrapingExecuteRequest;
use PHPHtmlParser\Dom;

class OSite extends Site
{
  protected $url = 'https://pallet-o.com/search?';
  protected $category;
  protected $size;
  protected $specification;
  protected  $region;
  protected  $test;


  public function __construct($category, $size, $specification, $region)
  {
    $this->category = $category;
    $this->size = $size;
    $this->specification = $specification;
    $this->region = $region;
  }

  public function oSite()
  {

    $parameter =
      [
        'q' => $this->category
      ];

    $parameter = http_build_query($parameter);

    $this->url = $this->url . $parameter;
    $this->test = $this->setOuterHtml(); 

    $this->test = $this->test->find('h1', 0); 
    return $this->test;

    }
}
