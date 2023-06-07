{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')

    <h2 class="mt-4 mb-3">Product Create</h2>

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
            <label for="process-type" class="form-label">타입</label>
            <input type="text" name="process-type" class="form-control" id="" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">유물이름</label>
            <input type="text" name="name" class="form-control" id="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="assets-sort" class="form-label">문화재 분류</label>
            <input type="text" name="assets-sort" class="form-control" id="" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">유물설명</label>
            <textarea rows="10" cols="40" name="content" class="form-control" id="name" autocomplete="off"></textarea>
        </div>
        <div class="mb-3">
            <label for="process-level" class="form-label">작업단계</label>
            <input type="text" name="process-level" class="form-control" id="" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="advisor" class="form-label">자문위원</label>
            <input type="text" name="advisor" class="form-control" id="" autocomplete="off">
        </div>
        <input type="file" name="files[]" multiple>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route("products.index")}}">
          <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
    </form>
@endsection