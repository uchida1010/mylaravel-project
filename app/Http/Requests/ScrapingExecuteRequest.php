<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category' => 'required|alpha:ascii|string',
            'size' => 'required|alpha_num:ascii|string',
            'specification' => 'required|alpha:ascii|string',
            'region' => 'required|alpha:ascii|string'
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
            'category.required' => 'カテゴリを正しく選択してください',
            'category.alpha' => 'カテゴリを正しく選択してください',
            'size.required' => 'サイズを正しく選択してください',
            'size.alpha_num' => 'サイズを正しく選択してください',
            'specification.required' => '仕様を正しく選択してください',
            'specification.alpha' => '仕様を正しく選択してください',
            'region.required' => '置き場を正しく選択してください',
            'region.alpha' => '置き場を正しく選択してください'
          ];
}
}
