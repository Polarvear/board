<h2>NEW PAGE</h2>

@php //GET으로 받은 새로운 페이지
    $manager = request()->query('manager');
    $productId = request()->query('product_id');
@endphp
@extends('products.layout')

@section('content')
    <h2 class="mt-4 mb-3"></h2>
    <p style="text-align: right" class="pt-2">
      <a href="{{route("products.index")}}">
        <button type="button" class="btn btn-primary">돌아가기</button>
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
            작업자 이름 : {{ $manager }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            작업자 이름 : {{ $manager }}
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
        <input type="hidden" name="parent_id" value="">
        <textarea name="commentStory" class="border border-blue-300 resize-none w-full h-32"></textarea>
        <input type="submit" value="작성" class="mt-4 px-4 py-1 bg-gray-500 hover:bg-gray-700 text-gray-200">
    </form>
</div>
    {{-- @endauth --}}

@endsection


