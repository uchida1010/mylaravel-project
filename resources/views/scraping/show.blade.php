<!DOCTYPE html>
<html. lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/app.css">
</head>

<body>
    <h2>
        {{ $message }}
    </h2>
    <form action="#" method="post">
        <select name="category">
            <option value="plastic_pallet">プラスチックパレット</option>
            <option value="wood_pallet">木製パレット</option>
        </select>
        <select name="specification">
            <option value="oneside">片面</option>
            <option value="bothsides">両面</option>
            <option value="mix">混在</option>
        </select>
        <br>
        <input type="button" value="出力する">
    </form>

</body>

</html.>