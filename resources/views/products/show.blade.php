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
        .zip-down {
            float: left;
        }


    </style>

    <h2 class="mt-4 mb-3">Product View: {{$product->name}}</h2>
    <h2 class="mt-4 mb-3">id: {{$product->id}}</h2>

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

        <a href="{{ route('products.edit', ['product' => $product->id]) }}">
            <button type="button" class="btn btn-primary">수정하기</button>
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
        @foreach ($files as $file)
                <img src="{{ route('products.previewImage', ['foldername' => $product->name, 'filename' => basename($file)]) }}" alt="Image Preview">
                {{-- {{ basename($file) }} --}}
        @endforeach
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
            <a href="{{ route('products.downloadFile',['foldername' => $product->name, 'filename' => basename($file)]) }}" class="data-filename">
                {{ basename($file) }}
            </a>
            <button class="del-file" data-file="{{ basename($file) }}" data-folder="{{$product->name}}">x</button>
        </p>
    @endforeach
    <br>
    <div class="zip-down">
        {{-- {{ $product->id }} --}}
        <a href="{{ route('products.download', ['name' => $product->name]) }}">
            <button type="button" class="btn btn-primary down-btn">zip으로 다운로드</button>
        </a>
    </div>
    <br>

    <script>
        const delBtns = document.querySelectorAll('.del-file');

        delBtns.forEach(delBtn => {
            delBtn.addEventListener('click', async e => {
                // alert('dd');
                // const filename = event.currentTarget.getAttribute('data-filename');
                const fileName = e.target.dataset.file;
                const folderName = e.target.dataset.folder;
                const response = await fetch("{{ route('products.deleteFile') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        folderName: folderName,
                        fileName: fileName
                    })
                });

                if (response.ok) {
                    // 파일 삭제에 성공한 경우에 대한 처리
                    console.log('성공');
                } else {
                    // 파일 삭제에 실패한 경우에 대한 처리
                    console.error('실패');
                }
            });
        });


    </script>



@endsection
