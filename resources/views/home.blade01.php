
@extends('layouts.app')

@yield('head')
    <style>
    </style>



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are a User.
                    <a href="#" class="btn btn-primary">개인정보 수정</a>
                </div>
            </div>
            {{-- {{ $user->email }} --}}
            <h2 style="margin-top: 10px;">진행중인 작업 목록</h2>
            @foreach($products as $product)
            @php
            $productArray = $product->toArray();
            $targetEmail = $user->email;
            $matchingKeys = [];
            foreach ($productArray as $key => $value) {
            if ($value === $targetEmail) {
            $matchingKeys[] = $key;
                }
            }
            @endphp
            <div class="card">
                <div class="card-header">
                 프로젝트 명 : {{ $product->name }}
                </div>
                <div class="card-body">
                  <h5 class="card-title">담당 업무</h5>
                  @foreach ($matchingKeys as $flow)

                  @php
                  // 정규표현식으로 추출
                  preg_match('/\d+/', $flow, $matches);
                  $flowNumber = $matches[0];
                  @endphp
                  {{-- {{ $flowNumber }} --}}
                  {{-- <p class="card-text">{{ $flow }}</p> --}}
                  <a href="{{ route('user-info') }}?manager={{ $user->email }}&product_id={{ $product->id }}&flow={{ $flowNumber }}" class="{{ $product->id }} a-tag">{{ $flow }}</a>
                  <br>
                  <br>
                  @endforeach
                  <a href="{{route("products.show", $product->id)}}" class="btn btn-primary">프로젝트 정보보기</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
