<?php

namespace App\Sites;

use App\Sites\Site;

class ReuseSite extends Site
{
  public function reuseSite()
  {
    return $this->setOuterHtml();
  }
}