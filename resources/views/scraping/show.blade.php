<!DOCTYPE html>
<html. lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>

    <body>
        <h2>
            {{ $message }}
        </h2>
        <form action="#" method="post">
            <table>
                <tr>
                    <td>
                        カテゴリ
                    </td>
                    <td>
                        <select name="category" class="category">
                            <option value="plastic_pallet">プラスチックパレット</option>
                            <option value="wood_pallet">木製パレット</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        サイズ
                    </td>
                    <td>
                        <select name="specification" class="specification">
                            <option value="no">ー</option>
                            <option value="1100size">1000サイズ以下</option>
                            <option value="1100size">1100サイズ</option>
                            <option value="othersize">1200サイズ</option>
                            <option value="othersize">1300サイズ</option>
                            <option value="othersize">1400サイズ</option>
                            <option value="othersize">1500サイズ以上</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        仕様
                    </td>
                    <td>
                        <select name="specification" class="specification">
                            <option value="no">ー</option>
                            <option value="oneside">片面</option>
                            <option value="bothsides">両面</option>
                            <option value="mix">混在</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        置場(地方)
                    </td>
                    <td>
                    <select name="prefectures" class="prefectures">
                        <option value="no">ー</option>
                        <option value="北海道">北海道</option>
                        <option value="東北">東北</option>
                        <option value="関東">関東</option>
                        <option value="中部">中部</option>
                        <option value="近畿">近畿</option>
                        <option value="中四国">中四国</option>
                        <option value="九州">九州</option>
                        <option value="沖縄">沖縄</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="button" value="出力する">
        </form>

    </body>

</html.>