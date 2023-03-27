<?php

namespace App\Sites;

use App\Sites\Site;

class SellSite extends Site
{
  public function __construct()
  {
    $this->url = 'https://sell.uppc.jp/';
  }

  public function sellSite()
  {
    return $this->setOuterHtml();
  }
}
