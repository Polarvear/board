
<h2>수정할 페이지</h2>

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
      <a href="{{route("admin.pages.index")}}">
        <button type="button" class="btn btn-primary">돌아가기</button>
      </a>

      <a href="{{route("admin.pages.create")}}?product={{$productId}}&flow={{$flow}}">
        <button type="button" class="btn btn-primary">수정하기 </button>
      </a>
    </p>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            작업자 이름 : {{ $manager }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        @foreach($data as $item)
        <div class="p-3">
            소속(회사): {{ $item->company }}
        </div>
        @endforeach
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            데이터 : {{ print_r($data) }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{-- 유저 데이터 : {{ dd($user) }} --}}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{ $productId }}
        </div>
    </div>
{{--  댓글작성   --}}
{{-- @auth() --}}
<div class="w-4/5 mx-auto mt-6 text-right">
    <form method="post" action="{{route('comment.add')}}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="parent_id" value="{{$board->id}}"> --}}
        <input type="text" name="userName" value="안길동">
        <input type="hidden" name="parent_id" value="1">
        <input type="text" name="product_id" value="{{ $productId }}">
        <input type="text" name="member_id" value="1">
        <textarea name="commentStory" class="border border-blue-300 resize-none w-full h-32"></textarea>
        <input type="submit" value="작성" class="mt-4 px-4 py-1 bg-gray-500 hover:bg-gray-700 text-gray-200">
    </form>
</div>
    {{-- @endauth --}}

    <div class="content mt-4 rounded-3 border border-secondary">
        @foreach($comments as $comment)
        <div class="p-3">
            댓글: {{ $comment->content }}
            <input type="button" value="삭제"/>
        </div>
        @endforeach
    </div>
@endsection


