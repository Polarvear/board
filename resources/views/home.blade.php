
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
                </div>
            </div>
            {{ $user->email }}
            @php
               print_r('출력출력:::');
               print_r($user->email);
            @endphp
            <h2 style="margin-top: 10px;">진행중인 작업 목록</h2>
            @foreach($products as $product)
            @php
            $productArray = $product->toArray();
            print_r($productArray);
            echo ":::배열인지아닌지";
            print_r(is_array($productArray));
            print_r($user->email);
            $targetEmail = $user->email;
            echo "::::";
            print_r($targetEmail);
            // $targetKey = array_keys($targetEmail, $productArray);

            @endphp
            {{-- {{ $targetKey }} --}}
            <div class="card">
                <div class="card-header">
                 프로젝트 명 : {{ $product->name }}
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
