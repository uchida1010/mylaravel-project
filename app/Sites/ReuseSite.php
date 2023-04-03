<?php

namespace App\Sites;

use App\Sites\Site;

class ReuseSite extends Site
{

  public function __construct($category, $size, $specification, $region)
  {
    $this->url = 'https://www.reuse-pallet.com/products/list?';
    $this->category = $category;
    $this->size = $size;
    $this->specification = $specification;
    $this->region = $region;
  }

  public function reuseSite()
  {
    if ($this->category === 'plasticpallet') {
      $parameter = [
        'category_id' => '',
        'name' => 'プラスチックパレット'
      ];
    } elseif ($this->category === 'woodenpallet') {
      $parameter = [
        'category_id' => '',
        'name' => '木製パレット'
      ];
    }

    $parameter = http_build_query($parameter);

    $this->url = $this->url . $parameter;

    return $this->setOuterHtml();
  }
}
