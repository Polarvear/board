@extends('products.layout')

@section('content')

@yield('head')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .down-btn
        {
        float:right;
        }

        .swiper-container
        {
        width: 100%;
        height: 100%;
        }

        .swiper-slide img
        {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }


    </style>

    <h2 class="mt-4 mb-3">Product View: {{$product->name}}</h2>


    <p style="text-align: right" class="pt-2">{{$product->created_at}}


        @if (Auth::user()->type == 'user')
        <a href="javascript:history.back()">
        {{-- <a href="{{ route('home.index') }}"> --}}
            <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
    @else
        <a href="{{ route('products.index') }}">
            <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
    @endif
    </p>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$product->content}}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            타입 : {{$product->type}}
        </div>
    </div>
    <br>
    <!-- SwiperJS -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($files as $file)
                <div class="swiper-slide">
                    <img src="{{ route('products.previewImage', ['foldername' => $product->name, 'filename' => basename($file)]) }}" alt="Image Preview">
                    {{ basename($file) }}
                </div>
            @endforeach
        </div>
    </div>
    <br>






    {{-- @foreach ($files as $file)
     <a href="{{ route('products.downloadFile', ['foldername' => $product->name, 'filename' => basename($file)]) }}" target="_blank">
        <img src="{{ route('products.previewImage', ['foldername' => $product->name, 'filename' => basename($file)]) }}" alt="Image Preview" width="" height="">
     </a>
     @endforeach --}}
    @foreach ($files as $file)
        <p>
            {{-- {{ $file }} --}}
            파일명 :
            <a href="{{ route('products.downloadFile',['foldername' => $product->name, 'filename' => basename($file)]) }}">
                {{ basename($file) }}
            </a>
        </p>
    @endforeach
    <br>
    <div class="">
        {{-- {{ $product->id }} --}}
        <br>
        <a href="{{ route('products.download', ['name' => $product->name]) }}">
            <button type="button" class="btn btn-primary down-btn">zip으로 다운로드</button>
        </a>
    </div>
    <br>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: { // 수정: 페이지네이션 추가
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    </script>
@endsection
