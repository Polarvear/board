@extends('products.layout')

@section('content')
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




@endsection
