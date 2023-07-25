
<h2>수정할 페이지</h2>
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
    <p class="p-tag" style="" class="pt-2">
        @if (Auth::user()->type == 'user')
        <a href="javascript:history.back()">
            <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
        @else
        <a href="{{ route('products.index') }}">
            <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
        @endif

      {{-- {{$user[0]->type}}
      <a href="{{route("admin.pages.create")}}?product={{$productId}}&flow={{$flow}}">
        <button type="button" class="btn btn-primary">수정하기 </button>
      </a> --}}
    {{-- {{ Auth::user()->type }}
    @foreach ($user as $userInfo)
        @php
        $email = $userInfo->email;
        $type = $userInfo->type;
        @endphp
        @if ($email === $userAllData->email)
            {{ $type }}
        @endif
    @endforeach --}}
    @if (Auth::user()->type != 'admin')
      <style>
          .hide-button {
              display: none;
          }

      </style>
    @endif
    <a href="{{ route('admin.pages.create') }}?product={{ $productId }}&flow={{ $flow }}" class="btn btn-primary {{ Auth::user()->type != 'admin' ? 'hide-button' : '' }}">수정하기</a>

    </p>
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
            이메일 :
            <a href="mailto:{{ $userAllData->email }}">{{ $userAllData->email }}</a>
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            연락처 : {{ $userAllData->phone }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{-- 데이터 : {{ print_r($data) }} --}}
        </div>
    </div>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{-- 유저 데이터 : {{ dd($user) }} --}}
        </div>
    </div>
{{--  댓글작성   --}}
{{-- @auth() --}}
<div class="w-4/5 mx-auto mt-6 text-right">
    <form method="post" action="{{route('comment.add')}}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="parent_id" value="{{$board->id}}"> --}}
        <input type="hidden" name="product_id" value="{{ $productId }}">
        <input type="hidden" name="member_id" value="{{ $flow }}">
        <br>
        <textarea name="commentStory" class="border border-blue-300 resize-none w-full h-32 comment-area"></textarea>
        <button type="submit" class="btn btn-primary">등록하기</button>
    </form>
</div>
    {{-- @endauth --}}

    <div class="content mt-4 rounded-3 border border-secondary">
        @foreach ($comments as $comment)
        @if ($comment->product_id == $productId && $comment->flow_num == $flow) {{-- 해당 댓글만 보여주기--}}
        <p>댓글: {{ $comment->comments }}
            <button type="" class="btn btn-success confirm-btn">확인</button>
        </p>
        @endif
        @endforeach
    </div
@endsection
{{--
@section('scripts')

@endsection
 --}}


