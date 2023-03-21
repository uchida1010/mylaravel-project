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
  public function execute()
  {
    $o_html = new OSite('https://www.pallet-o.com/');
    $reuse_html = new ReuseSite('https://www.reuse-pallet.com/');
    $sell_html = new SellSite('https://sell.uppc.jp/');

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
}
