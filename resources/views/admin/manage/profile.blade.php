
<h2>개인 정보</h2>
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
    @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
    @endif

    <div class="btn-wrapper-down">
        <button class="btn btn-primary edit-btn">돌아가기</button>
    </div>
    <br>
    <br>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            작업자 이름 : {{ $userAllData->name }}
        </div>
    </div>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            소속(회사): {{ $userAllData->company }}
        </div>
    </div>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            이메일 : {{ $userAllData->email }}
        </div>
    </div>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            연락처 : {{ $userAllData->phone }}
        </div>
    </div>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            소속(팀) : {{ $userAllData->team }}
        </div>
    </div>

    <br>
    <div class="btn-wrapper-down">
        <a href="{{ route('profile-edit') }}?manager={{$userAllData->email}}" class="btn btn-primary edit-btn">수정하기</a>
    </div>
{{-- javascript 시작 --}}
    <script>
    </script>
@endsection


