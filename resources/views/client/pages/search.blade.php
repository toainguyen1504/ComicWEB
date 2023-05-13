<!DOCTYPE html>
<html>

<head>
    <title>List gồm 2 cột</title>
    <style>
        table#search {
            border-collapse: collapse;
            width: 100%;
        }

        #search td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        img {
            max-width: 100%;
            /* height: 100px; */
        }

        #search ul li {
            padding-right: 20px;
        }

        #search .image-search {
            width: 25%;
        }

        #search .name-search {
            width: 75%;
            padding-right: 40px;
        }
        #search .name-search a {
            color: #000;
        }

        #search .name-search:hover a {
            color: rgb(149, 44, 44);
        }
        p{
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <table id="search">

        <tbody>

            @if (count($comics) > 0)
                <ul>
                    @foreach ($comics as $comic)
                        <li>

                            <tr>
                                <td class="image-search">
                                    <a href="{{ route('detail', ['slug' => $comic->slug]) }}"><img src="{{ asset('uploads/covers') }}/{{ $comic->image }}"></a>
                                </td>
                                <td class="name-search">
                                    <a href="{{ route('detail', ['slug' => $comic->slug]) }}">{{ $comic->name }}</a>
                                </td>
                            </tr>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Không có kết quả phù hợp</p>
            @endif

        </tbody>
    </table>
</body>

</html>
