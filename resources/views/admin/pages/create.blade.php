@php //GET으로 받은 새로운 페이지
    //$user = request()->query('user');
    $product = request()->query('product');
    $flow = request()->query('flow');
@endphp

@yield('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<h2>create blade</h2>

<div>{{ $flow }}</div>
<div>{{ $product }}</div>



{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')

    <h2 class="mt-4 mb-3">담당자 등록하기</h2>

    {{-- 유효성 검사에 걸렸을 경우 --}}
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        {{-- 라라벨은 CSRF로 부터 보호하기 위해 데이터를 등록할 때의 위조를 체크 하기 위해 아래 코드가 필수 --}}
        @csrf
        <div class="mb-3">
            <label for="flow-manager" class="form-label">담당자</label>
            <input type="text" name="flow-manager" class="form-control" id="flow-manager" autocomplete="" placeholder="" >

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">이메일</label>
            <input type="email" name="email" class="form-control" id="email" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="assets-sort" class="form-label">전화번호</label>
            <input type="text" name="assets-sort" class="form-control" id="phone" autocomplete="off">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">등록하기</button>
        <a href="{{route("admin.pages.index")}}">
          <button type="button" class="btn btn-primary">취소</button>
        </a>
    </form>
@endsection


<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

$(function() {
    $('#flow-manager').autocomplete({
        source: '{{ route('admin.pages.userAjax') }}',
        minLength: 1, // 최소 입력 글자 수
    });
});

</script>
