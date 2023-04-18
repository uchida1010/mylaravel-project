<?php

namespace App\Sites;

use App\Sites\Site;

class ReuseSite extends Site
{
  protected $url = 'https://www.reuse-pallet.com/products/list?';
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

    $parameter =
    [
      'q' => $this->category
    ];

    $parameter = http_build_query($parameter);

    $this->url = $this->url . $parameter;

    return $this->setOuterHtml();
  }
}
