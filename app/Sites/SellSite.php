<?php

namespace App\Sites;

use App\Sites\Site;

class SellSite extends Site
{
  protected $url = 'https://sell.uppc.jp/?';
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

    $parameter =
    [
      'q' => $this->category
    ];

    $parameter = http_build_query($parameter);

    $this->url = $this->url . $parameter;

    return $this->setOuterHtml();
  }
}
