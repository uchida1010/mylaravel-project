<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PHPHtmlParser\Dom;
use App\Sites\O_Site;
use App\Sites\Reuse_Site;
use App\Sites\Sell_Site;

class ScrapingExecuteController extends Controller
{
  public function execute()
  {
    $o_html = new O_Site('https://www.pallet-o.com/');
    $reuse_html = new Reuse_Site('https://www.reuse-pallet.com/');
    $sell_html = new Sell_Site('https://sell.uppc.jp/');

    // $dom = new Dom;
    // $dom->loadFromUrl('https://www.pallet-o.com/');
    // $o_html = $dom->outerHtml;

    // $dom->loadFromUrl('https://www.reuse-pallet.com/');
    // $reuse_html = $dom->outerHtml;

    // $dom->loadFromUrl('https://sell.uppc.jp/');
    // $sell_html = $dom->outerHtml;

    // Spreadsheetオブジェクト生成
    $objSpreadsheet = new Spreadsheet();
    // シートの取得
    $objSheet = $objSpreadsheet->getActiveSheet();

    //セルに文字列設定
    $objSheet->setCellValue('A1', $o_html);
    $objSheet->setCellValue('A2', $reuse_html);
    $objSheet->setCellValue('A3', $sell_html);


    // ブラウザへの指定
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=test.xlsx');

    // XLSX形式オブジェクト生成
    $objWriter = new Xlsx($objSpreadsheet);
    // ファイル書込み
    $objWriter->save('php://output');

    return redirect('scraping');
  }
}
