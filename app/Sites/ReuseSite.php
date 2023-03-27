<?php

namespace App\Sites;

use App\Sites\Site;

class ReuseSite extends Site
{
  public function __construct()
  {
    $this->url = 'https://www.reuse-pallet.com/';
  }

  public function reuseSite()
  {
    return $this->setOuterHtml();
  }
}
