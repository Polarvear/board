
<h2>정보정보</h2>
{{-- {{Auth::user()->type}} --}}
@php //GET으로 받은 새로운 페이지
    $manager = request()->query('manager');
    $productId = request()->query('product_id');
    $flow = request()->query('flow');
@endphp

@yield('head')
    <style>
        .p-tag {
            display: flex;
            justify-content: space-between;
        }

        .comment-area {
            width:100%;
          }

        .btns {
        }
        .submit-btn {
            margin-top:10px;
        }
        .back-btn, .edit-btn {
            float: right;
        }



    </style>

@extends('products.layout')

@section('content')
    <h2 class="mt-4 mb-3"></h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    {{-- @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
    @endif --}}
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    {{-- <form action="{{route('admin.pages.update', $product)}}" method="post" enctype="multipart/form-data"> --}}
    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="btn-wrapper-down">
            <a href="{{ route('products.index') }}" class="btn btn-primary back-btn">취소</a>
        </div>
        <br>
        <br>
        <div class="content mt-4 rounded-3 border border-secondary">
            <div class="p-3">
                작업자 이름 : {{ $userAllData->name }}
                <input type="hidden" name="user-name" class="form-control" value="{{ $userAllData->name }}">
            </div>
        </div>

        <div class="content mt-4 rounded-3 border border-secondary">
            <div class="p-3">
                이메일 : {{ $userAllData->email }}
                <input type="hidden" name="email" class="form-control" value="{{ $userAllData->email }}">
            </div>
        </div>

        <div class="content mt-4 rounded-3 border border-secondary">
            <div class="p-3">
                <label for="companyInput">소속(회사):</label>
                <input type="text" id="companyInput" name="company" value="{{ $userAllData->company }}" class="form-control">
            </div>
        </div>

        <div class="content mt-4 rounded-3 border border-secondary">
            <div class="p-3">
                <label for="phoneInput">연락처:</label>
                {{-- <input type="text" id="phoneInput" name="phone" value="{{ $userAllData->phone }}" class="form-control"> --}}
                <input type="text" id="phoneInput" name="phone" class="form-control" oninput="oninputPhone(this)" maxlength="13" value="{{ $userAllData->phone }}">
            </div>
        </div>


        <div class="content mt-4 rounded-3 border border-secondary">
            <div class="p-3">
                <label for="teamInput">소속(팀):</label>
                <input type="tel" id="teamInput" name="team" value="{{ $userAllData->team }}" class="form-control">
                {{-- <input type="text" id="teamInput" name="team" class="form-control" oninput="oninputPhone(this)" maxlength="14" value="{{ $userAllData->team }}"> --}}
            </div>
        </div>

        <br>
        <div class="btn-wrapper-down">
            <button class="btn btn-primary edit-btn">저장</button>
        </div>
    </form>
{{-- javascript 시작 --}}
    <script>
        function oninputPhone(target) {
        target.value = target.value
        .replace(/[^0-9]/g, '')
        .replace(/(^02.{0}|^01.{1}|[0-9]{3,4})([0-9]{3,4})([0-9]{4})/g, "$1-$2-$3");
        }


    </script>
@endsection


