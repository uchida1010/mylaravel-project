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
        @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif
        <form method="post" action="/execute">
            @csrf
            <table>
                <tr>
                    <td>
                        カテゴリ
                    </td>
                    <td>
                        <select name='category' class='category' id="category">
                            @foreach ($category_date as $category_date_key => $category_date_val)
                            <option value='{{$category_date_val}}'>{{$category_date_val}}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        サイズ
                    </td>
                    <td>
                        <select name='size' class='size'>
                            @foreach ($size_date as $size_date_key => $size_date_val)
                            <option value='{{$size_date_val}}'>{{$size_date_val}}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr id='specification'>
                    <td>
                        仕様
                    </td>
                    <td>
                        <select name='specification' class='specification' id='specification_sel'>
                            @foreach ($specification_date as $specification_date_key => $specification_val)
                            <option value={{$specification_val}}>{{$specification_val}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        置場(地方)
                    </td>
                    <td>
                        <select name='region' class='region'>
                            @foreach ($region_date as $region_date_key => $region_date_val)
                            <option value='{{$region_date_val}}'>{{$region_date_val}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type='submit' value='出力する'>
        </form>
        <script src="js/scraping.js"></script>
    </body>

</html.>