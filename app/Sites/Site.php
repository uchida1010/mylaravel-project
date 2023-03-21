<?php

namespace App\Sites;

use PHPHtmlParser\Dom;

class Site
{
  protected $url;
  protected $html;

  public function __construct($url)
  {
    $this->url = $url;
  }

  public function setOuterHtml()
  {
    $dom = new Dom;
    $dom->loadFromUrl($this->url);
    $this->html = $dom->outerHtml;
    return $this->html;
  }
}