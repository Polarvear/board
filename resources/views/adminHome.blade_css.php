@extends('layouts.app')


@section('head')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        label {
            display: flex;
            align-items: center;
            position: relative;
            top: 30px;
            left: 30px;
            transition: .5s;
        }
        .material-icons {
            font-size: 3rem;
            margin-left: 10px;
        }
        .bookmark-btt {
            border:none;
            outline:none;
            background-color: transparent;
            font-size: 3rem;
        }
        section {
            background-color: #34495e;
            color: #fff;
            width:200px;
            padding-top:30px;
            padding-left: 30px;
            position: absolute;
            top: 0;
            left: -200px;
            bottom:0;
            transition: 1s ease;
        }
        .bookmark-lists {
            padding-left: 45px;
        }
        .bookmark {
            margin: 30px 0;
        }
        .bookmark:nth-child(1) {
            margin-top: 50px;
        }
        .bookmark a {
            color: #fff;
            text-decoration: none;
        }

        .test-div {
            border:1px solid red;
        }
    </style>
@endsection


@section('content')
<body>
    <main>
        <label for="">
            <span class="material-icons">menu</span>
            <input type="button" value="Bookmark" class="bookmark-btt">
        </label>
        <section>
            <h1>북마크</h1>
            <div class="test-div" style="border:1px solid red;">안녕하세요</div>
            <ul class="bookmark-lists">
                <li class="bookmark"><a href="#">북마크1</a></li>
                <li class="bookmark"><a href="#">북마크2</a></li>
                <li class="bookmark"><a href="#">북마크3</a></li>
                <li class="bookmark"><a href="#">북마크4</a></li>
                <li class="bookmark"><a href="#">북마크5</a></li>
            </ul>
        </section>
    </main>
</body>
@endsection


