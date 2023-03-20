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

  public function Sethtml()
  {
    $dom = new Dom;
    $dom->loadFromUrl($this->url);
    $html = $dom->outerHtml;
    return $html;
  }
}

class O_Site extends Site
{
  public function o_site()
  {
    return $this->html;
  }
}

class Reuse_Site extends Site
{
  public function reuse_site()
  {
    return $this->html;
  }
}

class Sell_Site extends Site {

  public function sell_site()
  {
    return $this->html;
  }
}
