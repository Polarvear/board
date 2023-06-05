@extends('products.layout')

@section('content')
    <h2 class="mt-4 mb-3">Product View: {{$product->name}}</h2>
    <p style="text-align: right" class="pt-2">{{$product->created_at}}
      <a href="{{route("products.index")}}">
        <button type="button" class="btn btn-primary">돌아가기</button>
      </a>
    </p>
    
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$product->content}}
        </div>
    </div>

    


@endsection