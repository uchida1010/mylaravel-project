<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ScrapingExecuteController extends Controller
{
  public function execute()
  {

    // Spreadsheetオブジェクト生成
    $objSpreadsheet = new Spreadsheet();
    // シートの取得
    $objSheet = $objSpreadsheet->getActiveSheet();

    // [A1]セルに文字列設定
    $objSheet->setCellValue('A1', 'Spreadsheet');

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
