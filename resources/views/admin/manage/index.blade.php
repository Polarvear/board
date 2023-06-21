@extends('adminlte::page')


@yield('head')
    <style>
    table {
        width: 100%;
        border: 1px solid #444444;
    }
    th, td {
      border: 1px solid #444444;
    }

    .create-btn {
        margin-bottom: 10px;
    }
    </style>


@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    유저 관리 페이지입니다.
                </div>
            </div>
        </div>
    </div>
</div> --}}



<table class="table table-striped table-hover" >
    <colgroup>
        <col width="10%"/>
        <col width="20%"/>
        <col width="30%"/>
        <col width=""/>
    </colgroup>
    <thead>
    <tr>
        <th scope="col">연번</th>
        <th scope="col">이름</th>
        <th scope="col">등급</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
    {{-- Product Controller의 index에서 넘긴 $products(product 데이터 리스트)를 출력해줍니다. --}}
    @foreach ($users as $key => $user)
        <tr>
            {{-- <th scope="row">{{$key+1 + (($products->currentPage()-1) * 10)}}</th> --}}
            <th scope="row"></th>
            <td style="">
                <div style="display:flex; width: 177px;">
                    <div style="">
                      <a href="{{ route('user-info') }}?manager={{$user->name}}&product_id={{$user->name}}" class="{{$user->name}} a-tag">{{$user->name}}</a>
                    </div>
                  </div>
            </td>
            <td>
                <div style="display:flex; width: 177px;">
                    <div style="">
                      <a href="{{ route('user-info') }}?manager={{$user->name}}&product_id={{$user->name}}" class="{{$user->name}} a-tag">{{$user->type}}</a>
                    </div>
                </div>
            </td><!--영문이름-->

            <td>
              <div style="display:flex;">
                  {{-- <button class="save-btn {{$product->id}}">저장</button> --}}
                  {{-- <input type="submit" class="save-btn {{$product->id}}"/> --}}
                  {{-- <div>{{$product->id}}</div> --}}
                <!-- </form> -->

                <form action="{{route('admin.manage.destroy', $user->id)}}" method="post" style="margin-left: 10px;">
                    {{-- delete method와 csrf 처리필요 --}}
                    @method('delete')
                    @csrf
                    <input class="btn btn-danger" nclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="회원 탈퇴"/>
                </form>

              </div>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
@endsection
