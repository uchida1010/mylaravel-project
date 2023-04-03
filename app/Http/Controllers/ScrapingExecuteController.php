<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Sites\OSite;
use App\Sites\ReuseSite;
use App\Sites\SellSite;
use App\Http\Controllers\Controller;

class ScrapingExecuteController extends Controller
{
      /**
     * 新ブログポスト作成フォームの表示
     *
     * @return \Illuminate\View\View
     */

  public function execute($category, $size, $specification, $region)
  {
    $o_html = new OSite($category, $size, $specification, $region);
    $reuse_html = new ReuseSite($category, $size, $specification, $region);
    $sell_html = new SellSite($category, $size, $specification, $region);

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

     /**
     * 新しいブログポストの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  public function scrapingVal(Request $request)
  {
    $category = $request->category;
    $size = $request->size;
    $specification = $request->specification;
    $region = $request->region;

       $request->validate(
      [
        'category' => 'required|alpha:ascii|string',
        'size' => 'required|alpha_num:ascii|string',
        'specification' => 'required|alpha:ascii|string',
        'region' => 'required|alpha:ascii|string'
      ],
      [
        'category.required.string' => 'カテゴリを正しく選択してください',
        'category.alpha' => 'カテゴリを正しく選択してください',
        'size.required' => 'サイズを正しく選択してください',
        'size.alpha_num' => 'サイズを正しく選択してください',
        'specification.required' => '仕様を正しく選択してください',
        'specification.alpha' => '仕様を正しく選択してください',
        'region.required' => '置き場を正しく選択してください',
        'region.alpha' => '置き場を正しく選択してください'
      ]
    );

    return $this->execute($category, $size, $specification, $region);
    }
  }
