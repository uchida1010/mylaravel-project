<?php

namespace App\Sites;

use App\Sites\Site;

class SellSite extends Site
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

  public function sellSite()
  {
    $this->url = 'https://sell.uppc.jp/?';
    
    if ($this->category === 'plasticpallet') {
      $parameter = [
        's' => 'プラスチックパレット'
      ];
    } elseif ($this->category === 'woodenpallet') {
      $parameter = [
        's' => '木製パレット'
      ];
    }

    $parameter = http_build_query($parameter);

    $this->url = $this->url . $parameter;

    return $this->setOuterHtml();
  }
}
