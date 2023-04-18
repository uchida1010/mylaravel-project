<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ScrapingExecuteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**d
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category' => ['required', Rule::in(['プラスチックパレット', '木製パレット'])],
            'size' => ['required', Rule::in(['1000サイズ以下', '1100サイズ','1200サイズ','1300サイズ','1400サイズ','1500サイズ以上'])],
            'specification' => ['required', Rule::in(['ー', '片面','両面','混在'])],
            'region' => ['required', Rule::in(['ー', '北海道','東北','関東', '中部','近畿','中四国','九州','沖縄'])]
          ];
    }

    /**
 * 定義済みバリデーションルールのエラーメッセージ取得
 *
 * @return array
 */
public function messages()
{
    return 
          [
            'category' => 'カテゴリを正しく選択してください',
            'size' => 'サイズを正しく選択してください',
            'specification' => '仕様を正しく選択してください',
            'region' => '置き場を正しく選択してください',
          ];
}
}
