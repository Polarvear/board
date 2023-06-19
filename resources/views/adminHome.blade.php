@extends('layouts.app')


@section('head')

    <style>

    </style>
@endsection


@section('content')
<div class="menu">
    <label for="expand-menu"><div>메뉴</div></label>
    <input type="checkbox" id="expand-menu" name="expand-menu">
    <ul>
        <li><a href="#" class="item"><div>프로필</div></a></li>
        <li><a href="#" class="item"><div>데이터사용량</div></a></li>
        <li><a href="#" class="item"><div>내URL</div></a></li>
        <li><a href="#" class="item"><div>구매내역</div></a></li>
        <li><a href="#" class="item"><div>추천목록</div></a></li>
        <li><a href="#" class="item"><div>설정</div></a></li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    You are a Admin User.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


