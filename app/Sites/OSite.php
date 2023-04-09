<?php

namespace App\Sites;

use App\Sites\Site;
use Illuminate\Http\Request;
use \App\Http\Requests\ScrapingExecuteRequest;
class OSite extends Site
{
  protected $url;
  protected $category;
  protected $size;
  protected $specification;
  protected  $region;


  public function __construct($category, $size, $specification, $region)
  {
    $this->category = $category;
    $this->size = $size;
    $this->specification = $specification;
    $this->region = $region;
  }

  public function oSite()
  {
    $this->url = 'https://pallet-o.com/search?';

    if ($this->category === 'plasticpallet') {
      $parameter = [
        'q' => 'プラスチックパレット'
      ];
    } elseif ($this->category === 'woodenpallet') {
      $parameter = [
        'q' => '木製パレット'
      ];
    }

    $parameter = http_build_query($parameter);

    $this->url = $this->url . $parameter;

    return $this->setOuterHtml();
  }
}
