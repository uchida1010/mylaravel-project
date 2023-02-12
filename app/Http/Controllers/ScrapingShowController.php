<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapingShowController extends Controller
{
    public function show()
    {
        $message = '競合調査';

        $category_date = $this->categoryDate();

        $size_date = $this->sizeDate();

        $specification_date = $this->specificationDate();

        $region_date = $this->regionDate();

        return view('scraping.show', compact('message', 'category_date', 'size_date', 'specification_date', 'region_date'));
    }

    public function categoryDate()
    {
        $category_date = [
            'plasticpallet' => 'プラスチックパレット',
            'woodenpallet' => '木製パレット'
        ];

        return $category_date;
    }

    public function sizeDate()
    {
        $size_date = [
            '1000size' => '1000サイズ以下',
            '1100size' => '1100サイズ',
            '1200size' => '1200サイズ',
            '1300size' => '1300サイズ',
            '1400size' => '1400サイズ',
            '1500size' => '1500サイズ以上'
        ];

        return $size_date;
    }

    public function specificationDate()
    {
        $specification_date = [
            'no' => 'ー',
            'oneside' => '片面',
            'bothsides' => '両面',
            'mix' => '混在'
        ];

        return $specification_date;
    }

    public function regionDate()
    {
        $region_date = [
            'no' => 'ー',
            '北海道' => '北海道',
            '東北' => '東北',
            '関東' => '関東',
            '中部' => '中部',
            '近畿' => '近畿',
            '中四国' => '中四国',
            '九州' => '九州',
            '沖縄' => '沖縄'
        ];

        return $region_date;
    }
}
