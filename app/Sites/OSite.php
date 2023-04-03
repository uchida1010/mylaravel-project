<?php

namespace App\Sites;

use App\Sites\Site;
use Illuminate\Http\Request;

class OSite extends Site
{
  public function __construct($category, $size, $specification, $region)
  {
    $this->url = 'https://pallet-o.com/search?';
    $this->category = $category;
    $this->size = $size;
    $this->specification = $specification;
    $this->region = $region;
  }

  public function oSite()
  {
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