<?php

namespace App\Sites;

use App\Sites\Site;

class ReuseSite extends Site
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

  public function reuseSite()
  {
    $this->url = 'https://www.reuse-pallet.com/products/list?';

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
