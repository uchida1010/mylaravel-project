<!DOCTYPE html>
<html. lang='ja'>

    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <link rel='stylesheet' href='{{ asset('/css/style.css') }}'>
    </head>

    <body>
        <h2>
            {{ $message }}
        </h2>
        <form action='#' method='post'>
            <table>
                <tr>
                    <td>
                        カテゴリ
                    </td>
                    <td>
                        @php
                        $category_date = [
                        'plastic_pallet' => 'プラスチックパレット',
                        'wood_pallet' => '木製パレット',
                        ];
                        @endphp
                        <select name='category' class='category'>
                            @foreach ($category_date as $category_date_key => $category_date_val)
                            <option value=$category_date_key>{{$category_date_val}}</option>";
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        サイズ
                    </td>
                    <td>
                        @php
                        $size_date = [
                        '1000size' => '1000サイズ以下',
                        '1100size' => '1100サイズ',
                        '1200size' => '1200サイズ',
                        '1300size' => '1300サイズ',
                        '1400size' => '1400サイズ',
                        '1500size' => '1500サイズ以上'
                        ];
                        @endphp
                        <select name='size' class='size'>
                            @foreach ($size_date as $size_date_key => $size_date_val)
                            <option value=$size_date_key>{{$size_date_val}}</option>";
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        仕様
                    </td>
                    <td>
                        @php
                        $specification_date = [
                        'no' => 'ー',
                        'oneside' => '片面',
                        'bothsides' => '両面',
                        'mix' => '混在'
                        ];
                        @endphp
                        <select name='specification' class='specification'>
                            @foreach ($specification_date as $specification_date_key => $specification_val)
                            <option value=$specification_date_key>{{$specification_val}}</option>";
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        置場(地方)
                    </td>
                    <td>
                        @php
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
                        @endphp
                        <select name='region' class='region'>
                            @foreach ($region_date as $region_date_key => $region_date_val)
                            <option value=$region_date_key>{{$region_date_val}}</option>";
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type='button' value='出力する'>
        </form>

    </body>

</html.>