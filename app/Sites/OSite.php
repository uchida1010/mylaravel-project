<?php

namespace App\Sites;

use App\Sites\Site;

class OSite extends Site
{
  public function oSite()
  {
    return $this->setOuterHtml();
  }
}