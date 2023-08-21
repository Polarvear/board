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


    .step-1 {
        background-color: #8b0000;
    }

    .step-2 {
        background-color: #ff0000;
    }

    .step-3 {
        background-color: #ffd700;
    }

    .step-4 {
        background-color: #adff2f;
    }

    .step-5 {
        background-color: #008000;
    }

    .step-6 {
        background-color: #00bfff;
    }

    .step-7 {
        background-color: #1e90ff;
    }

    .flow-a-tag {
        color: black;
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
            <th scope="row" style="display:flex; justify-content:center; border:none; border-top: 1px solid black;">{{$key+1 + (($products->currentPage()-1) * 10)}}</th>
            <td style="">
                <a style="display:flex; justify-content:center;" href="{{route("products.show", $product->id)}}">{{$product->name}}</a>
            </td>
            <td>

            </td><!--영문이름-->
            <td class="inner-td" style="">
                <div class="inner-div @if ($product->flow_1_status == 1) step-1 @elseif ($product->flow_1_status == 2) step-2 @elseif ($product->flow_1_status == 3) step-3 @elseif ($product->flow_1_status == 4) step-4 @elseif ($product->flow_1_status == 5) step-5 @elseif ($product->flow_1_status == 6) step-6 @elseif ($product->flow_1_status == 7) step-7 @endif">
                    @if ($product->flow_1_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_1_email }}&product_id={{ $product->id }}&flow=1&status={{ $product->flow_1_status }}" class="{{ $product->id }} a-tag flow-a-tag">{{ $product->flow_1 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=1" class="{{ $product->id }} a-tag">등록</a>
                    @endif
                </div>
            </td><!--기획-->
            <td class="inner-td">
                <div class="inner-div @if ($product->flow_2_status == 1) step-1 @elseif ($product->flow_2_status == 2) step-2 @elseif ($product->flow_2_status == 3) step-3 @elseif ($product->flow_2_status == 4) step-4 @elseif ($product->flow_2_status == 5) step-5 @elseif ($product->flow_2_status == 6) step-6 @elseif ($product->flow_2_status == 7) step-7 @endif">
                    @if ($product->flow_2_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_2_email }}&product_id={{ $product->id }}&flow=2&status={{ $product->flow_2_status }}" class="{{ $product->id }} a-tag flow-a-tag">{{ $product->flow_2 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=2" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--획득-->
            <td class="inner-td">
                <div class="inner-div @if ($product->flow_3_status == 1) step-1 @elseif ($product->flow_3_status == 2) step-2 @elseif ($product->flow_3_status == 3) step-3 @elseif ($product->flow_3_status == 4) step-4 @elseif ($product->flow_3_status == 5) step-5 @elseif ($product->flow_3_status == 6) step-6 @elseif ($product->flow_3_status == 7) step-7 @endif">
                    @if ($product->flow_3_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_3_email }}&product_id={{ $product->id }}&flow=3&status={{ $product->flow_3_status }}" class="{{ $product->id }} a-tag flow-a-tag">{{ $product->flow_3 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">등록</a>
                    @endif
                </div>
            </td><!--모델링-->
            <td class="inner-td">
                <div class="inner-div @if ($product->flow_4_status == 1) step-1 @elseif ($product->flow_4_status == 2) step-2 @elseif ($product->flow_4_status == 3) step-3 @elseif ($product->flow_4_status == 4) step-4 @elseif ($product->flow_4_status == 5) step-5 @elseif ($product->flow_4_status == 6) step-6 @elseif ($product->flow_4_status == 7) step-7 @endif">
                    @if ($product->flow_4_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_4_email }}&product_id={{ $product->id }}&flow=4&status={{ $product->flow_4_status }}" class="{{ $product->id }} a-tag flow-a-tag">{{ $product->flow_4 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=4" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--맵핑-->
            <td class="inner-td">
                <div class="inner-div @if ($product->flow_5_status == 1) step-1 @elseif ($product->flow_5_status == 2) step-2 @elseif ($product->flow_5_status == 3) step-3 @elseif ($product->flow_5_status == 4) step-4 @elseif ($product->flow_5_status == 5) step-5 @elseif ($product->flow_5_status == 6) step-6 @elseif ($product->flow_5_status == 7) step-7 @endif">
                    @if ($product->flow_5_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_5_email }}&product_id={{ $product->id }}&flow=5&status={{ $product->flow_5_status }}" class="{{ $product->id }} a-tag flow-a-tag">{{ $product->flow_5 }}</a>
                    </div>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">등록</a>
                    @endif
                </div>
            </td><!--게임엔진-->
            <td class="inner-td">
                <div class="inner-div @if ($product->flow_6_status == 1) step-1 @elseif ($product->flow_6_status == 2) step-2 @elseif ($product->flow_6_status == 3) step-3 @elseif ($product->flow_6_status == 4) step-4 @elseif ($product->flow_6_status == 5) step-5 @elseif ($product->flow_6_status == 6) step-6 @elseif ($product->flow_6_status == 7) step-7 @endif">
                    @if ($product->flow_6_email)
                    <div class="flow-status">
                        <a href="{{ route('user-info') }}?manager={{ $product->flow_6_email }}&product_id={{ $product->id }}&flow=6&status={{ $product->flow_6_status }}" class="{{ $product->id }} a-tag flow-a-tag">{{ $product->flow_6 }}</a>
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
{!! $products->links() !!}
@endsection

