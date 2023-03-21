<?php

namespace App\Sites;

use App\Sites\Site;

class SellSite extends Site {

  public function sellSite()
  {
    return $this->setOuterHtml();
  }
}
