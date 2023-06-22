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

    /* 인라인으로 넣어야함 */
    /* .inner-td {
        vertical-align: middle;
        text-align: center;
    } */
    .inner-div {
        display: flex;
        justify-content: space-evenly;
    }
    .pagination {
        display: flex;
        justify-content: center;
    }
    </style>


@section('content')
<h2 class="mt-4 mb-3">프로젝트 리스트</h2>

<a href="{{route("products.create")}}">
    <button type="button" class="btn btn-dark create-btn" style="float: right;">프로젝트 생성하기</button>
</a>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    pages 페이지입니다.
                </div>
            </div>
        </div>
    </div>
</div> --}}
<table class="table table-striped table-hover" >
    <colgroup>
        <col width="10%"/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
        <col width=""/>
    </colgroup>
    <thead>
    <tr>
        <th scope="col">연번</th>
        <th scope="col">이름</th>
        <th scope="col" style="width:177px;">영문이름</th>
        <th scope="col">기획</th>
        <th scope="col">획득</th>
        <th scope="col">모델링</th>
        <th scope="col">맵핑</th>
        <th scope="col">게임엔진</th>
        <th scope="col">배포</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
    {{-- Product Controller의 index에서 넘긴 $products(product 데이터 리스트)를 출력해줍니다. --}}
    @foreach ($products as $key => $product)
        <tr>
            <th scope="row">{{$key+1 + (($products->currentPage()-1) * 10)}}</th>
            <td style="">
                <a href="{{route("products.show", $product->id)}}">{{$product->name}}</a>
            </td>
            <td>

            </td><!--영문이름-->
            <td class="inner-td" style="">
                <div class="inner-div" style="">
                    <a href="{{ route('user-info') }}?manager={{$product->flow_1}}&product_id={{$product->id}}&flow=1" class="{{$product->id}} a-tag">{{ $product->flow_1 ?: '등록' }}</a>
                    <a href="{{ route('user-info') }}?manager={{$product->flow_2}}&product_id={{$product->id}}&flow=2" class="{{$product->id}} a-tag">{{ $product->flow_2 ?: '등록' }}</a>
                </div>
            </td><!--기획-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    <a href="{{ route('user-info') }}?manager={{$product->flow_3}}&product_id={{$product->id}}&flow=3" class="{{$product->id}} a-tag">{{ $product->flow_3 ?: '등록' }}</a>
                    <a href="{{ route('user-info') }}?manager={{$product->flow_4}}&product_id={{$product->id}}&flow=4" class="{{$product->id}} a-tag">{{ $product->flow_4 ?: '등록' }}</a>
                </div>
            </td><!--획득-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    <a href="{{ route('user-info') }}?manager={{$product->flow_3}}&product_id={{$product->id}}&flow=5" class="{{$product->id}} a-tag">{{ $product->flow_5 ?: '등록' }}</a>
                    <a href="{{ route('user-info') }}?manager={{$product->flow_4}}&product_id={{$product->id}}&flow=6" class="{{$product->id}} a-tag">{{ $product->flow_6 ?: '등록' }}</a>
                </div>
            </td><!--모델링-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    <a href="{{ route('user-info') }}?manager={{$product->flow_3}}&product_id={{$product->id}}&flow=7" class="{{$product->id}} a-tag">{{ $product->flow_7 ?: '등록' }}</a>
                    <a href="{{ route('user-info') }}?manager={{$product->flow_4}}&product_id={{$product->id}}&flow=8" class="{{$product->id}} a-tag">{{ $product->flow_8 ?: '등록' }}</a>
                </div>
            </td><!--맵핑-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    <a href="{{ route('user-info') }}?manager={{$product->flow_3}}&product_id={{$product->id}}&flow=9" class="{{$product->id}} a-tag">{{ $product->flow_9 ?: '등록' }}</a>
                    <a href="{{ route('user-info') }}?manager={{$product->flow_4}}&product_id={{$product->id}}&flow=10" class="{{$product->id}} a-tag">{{ $product->flow_10 ?: '등록' }}</a>
                </div>
            </td><!--게임엔진-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    <a href="{{ route('user-info') }}?manager={{$product->flow_3}}&product_id={{$product->id}}&flow=11" class="{{$product->id}} a-tag">{{ $product->flow_10 ?: '등록' }}</a>
                    <a href="{{ route('user-info') }}?manager={{$product->flow_4}}&product_id={{$product->id}}&flow=12" class="{{$product->id}} a-tag">{{ $product->flow_11 ?: '등록' }}</a>
                </div>
            </td><!--배포-->

            <!-- 수정 & 삭제 부분 주석처리 -->
            <td>
              <div style="display:flex;">
                  <!--button class="save-btn {{$product->id}}">저장</button-->
                  <!-- <input type="submit" class="save-btn {{$product->id}}"/> -->
                  <div>{{$product->id}}</div>
                <!-- </form> -->
                <form action="{{route('products.destroy', $product->id)}}" method="post" style="margin-left: 10px;">
                    {{-- delete method와 csrf 처리필요 --}}
                    @method('delete')
                    @csrf
                    <input class="btn btn-danger" onclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="프로젝트 삭제"/>
                </form>
              </div>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
{{-- 페이지 네이션 속성 class="pagination" 으로 컨트롤 --}}
{!! $products->links() !!}
@endsection

