<?php

namespace App\Http\Controllers;

use \App\Http\Requests\ScrapingExecuteRequest;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Sites\OSite;
use App\Sites\ReuseSite;
use App\Sites\SellSite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ScrapingExecuteController extends Controller
{

  public function execute(ScrapingExecuteRequest $request)
  {

    $validated = $request->validated();

    $o_html = new OSite($validated['category'], $validated['size'], $validated['specification'], $validated['region']);
    $reuse_html = new ReuseSite($validated['category'], $validated['size'], $validated['specification'], $validated['region']);
    $sell_html = new SellSite($validated['category'], $validated['size'], $validated['specification'], $validated['region']);

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
