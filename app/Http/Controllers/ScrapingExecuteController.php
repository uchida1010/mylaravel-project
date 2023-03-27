<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Sites\OSite;
use App\Sites\ReuseSite;
use App\Sites\SellSite;

class ScrapingExecuteController extends Controller
{
  public function execute(Request $request)
  {
    $sp_val = $this->scrapingVal($request->category, $request->size, $request->specification, $request->region);

    $o_html = new OSite($request->category, $request->size, $request->specification, $request->region);
    $reuse_html = new ReuseSite($request->category, $request->size, $request->specification, $request->region);
    $sell_html = new SellSite($request->category, $request->size, $request->specification, $request->region);

    // Spreadsheetオブジェクト生成
    $objSpreadsheet = new Spreadsheet();
    // シートの取得
    $objSheet = $objSpreadsheet->getActiveSheet();

    //セルに文字列設定
    $objSheet->setCellValue('A1', $o_html->oSite());
    $objSheet->setCellValue('A2', $reuse_html->reuseSite());
    $objSheet->setCellValue('A3', $sell_html->sellSite());


    // ブラウザへの指定
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=test.xlsx');

    // XLSX形式オブジェクト生成
    $objWriter = new Xlsx($objSpreadsheet);
    // ファイル書込み
    $objWriter->save('php://output');

    return redirect('scraping');
  }

  public function scrapingVal($category, $size, $specification, $region)
  {

    $category_date = [
      'plasticpallet' => 'プラスチックパレット',
      'woodenpallet' => '木製パレット'
    ];

    foreach ($category_date as $key => $value) {
      if ($category === $key) {
        $result = true;
        $category_value = $value;
      } else {
        $result = false;
      }
    }

    $size_date = [
      '1000size' => '1000サイズ以下',
      '1100size' => '1100サイズ',
      '1200size' => '1200サイズ',
      '1300size' => '1300サイズ',
      '1400size' => '1400サイズ',
      '1500size' => '1500サイズ以上'
    ];

    foreach ($size_date as $key => $value) {
      if ($size === $key) {
        $result = true;
      } else {
        $result = false;
      }
    }

    $specification_date = [
      'no' => 'ー',
      'oneside' => '片面',
      'bothsides' => '両面',
      'mix' => '混在'
    ];

    if ($category === 'plasticpallet') {
      foreach ($specification_date as $key => $value) {
        if ($specification === $key) {
          $result = true;
        } else {
          $result = false;
        }
      }
    }


    $region_date = [
      'no' => 'ー',
      'hokkaido' => '北海道',
      'tohoku' => '東北',
      'kantou' => '関東',
      'tyubu' => '中部',
      'kinnki' => '近畿',
      'tyusikoku' => '中四国',
      'kyusyu' => '九州',
      'okinawa' => '沖縄'
    ];

    foreach ($region_date as $key => $value) {
      if ($region === $key) {
        $result = true;
      } else {
        $result = false;
      }
    }

    if ($result === true) {
      return;
    }
  }
}
