<?php

namespace App\Sites;

use PHPHtmlParser\Dom;

class Site
{
  protected $url;
  protected $html;
  protected $dom;

  public function setOuterHtml()
  {
    $dom = new Dom;
    // $dom->loadFromUrl($this->url);
    $this->html = $dom->loadFromFile('../tests/data/big.html');
    // $this->html = $dom->outerHtml;
    return $this->html;
  }
}
