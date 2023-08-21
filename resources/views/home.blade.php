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

    .table td, .table th {
        padding:0px !important;
    }
    </style>

@php
    $currentRoute = Route::current();

    if ($currentRoute) {
        $routeName = $currentRoute->getName(); // 현재 라우트의 이름
        $controllerAction = $currentRoute->getActionName(); // 현재 라우트의 컨트롤러 액션 정보

        // 라우트 정보를 출력 또는 활용
        echo "현재 라우트 이름: $routeName<br>";
        echo "현재 컨트롤러 액션: $controllerAction<br>";
    } else {
        echo "현재 라우트를 찾을 수 없습니다.";
    }
    // exit;
@endphp



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
        <col width="50px" />
        <col width="150px"/>
        <col width="150px"/>
        <col width="80px"/>
        <col width="80px"/>
        <col width="80px"/>
        <col width="80px"/>
        <col width="80px"/>
        <col width="80px"/>
        <col width=""/>
    </colgroup>
    <thead>
    <tr height="0">
        <th scope="col" style="text-align: center;">연번</th>
        <th scope="col" style="text-align: center;">이름</th>
        <th scope="col" style="text-align: center;">영문이름</th>
        <th scope="col" style="text-align: center;">기획</th>
        <th scope="col" style="text-align: center;">획득</th>
        <th scope="col" style="text-align: center;">모델링</th>
        <th scope="col" style="text-align: center;">맵핑</th>
        <th scope="col" style="text-align: center;">게임엔진</th>
        <th scope="col" style="text-align: center;">배포</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
    {{-- Product Controller의 index에서 넘긴 $products(product 데이터 리스트)를 출력해줍니다. --}}
    @foreach ($products as $key => $product)
        {{-- {{ $product }} --}}
        <tr>
            <th scope="row" style="display:flex; justify-content:center; border:none; border-top: 1px solid black;"></th>
            {{-- <th scope="row" style="display:flex; justify-content:center; border:none; border-top: 1px solid black;">{{$key+1 + (($ ->currentPage()-1) * 10)}}</th> --}}
            <td style="">
                <a style="display:flex; justify-content:center;" href="{{route("products.show", $product->id)}}">{{$product->name}}</a>
            </td>
            <td>

            </td><!--영문이름-->
            <td class="inner-td" style="">
                <div class="inner-div" style="">
                    @if ($product->flow_1_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_1_email }}&product_id={{ $product->id }}&flow=1&status={{ $product->flow_1_status }}" class="{{ $product->id }} a-tag">{{ $product->flow_1 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=1" class="{{ $product->id }} a-tag">등록</a>
                    @endif
                </div>
            </td><!--기획-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($product->flow_2_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_2_email }}&product_id={{ $product->id }}&flow=2&status={{ $product->flow_2_status }}" class="{{ $product->id }} a-tag">{{ $product->flow_2 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=2" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--획득-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($product->flow_3_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_3_email }}&product_id={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">{{ $product->flow_3 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">등록</a>
                    @endif
                </div>
            </td><!--모델링-->
            <td class="inner-td">
                <div class="inner-div" style="">

                    @if ($product->flow_4_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_4_email }}&product_id={{ $product->id }}&flow=4" class="{{ $product->id }} a-tag">{{ $product->flow_4 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=4" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--맵핑-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($product->flow_5_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_5_email }}&product_id={{ $product->id }}&flow=5" class="{{ $product->id }} a-tag">{{ $product->flow_5 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">등록</a>
                    @endif
                </div>
            </td><!--게임엔진-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($product->flow_6_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_6_email }}&product_id={{ $product->id }}&flow=6" class="{{ $product->id }} a-tag">{{ $product->flow_6 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=6" class="{{ $product->id }} a-tag" >등록</a>
                    @endif

                </div>
            </td><!--배포-->

            <!-- 수정 & 삭제 부분 주석처리 -->
            <td>
              <div style="display:flex; height:25px;" >
                  <!--button class="save-btn {{$product->id}}">저장</button-->
                  <!-- <input type="submit" class="save-btn {{$product->id}}"/> -->
                  {{-- <div>{{$product->id}}</div> --}}
                <!-- </form> -->
                <form action="{{route('products.destroy', $product->id)}}" method="post" style="margin-left: 10px;">
                    {{-- delete method와 csrf 처리필요 --}}
                    @method('delete')
                    @csrf
                    <input class="" onclick="return confirm('프로젝트를 삭제하겠습니까?')" type="submit" value="X"/>
                </form>
              </div>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
{{-- 페이지 네이션 속성 class="pagination" 으로 컨트롤 --}}
{!! $productsPage->links() !!}
@endsection

