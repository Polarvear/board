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

                @php
                    $flow1Email = $product->flow_1_email;
                    $flow2Email = $product->flow_2_email;
                    $flow3Email = $product->flow_3_email;
                    $flow4Email = $product->flow_4_email;
                    $flow5Email = $product->flow_5_email;
                    $flow6Email = $product->flow_6_email;
                    $flow7Email = $product->flow_7_email;
                    $flow8Email = $product->flow_8_email;
                    $flow9Email = $product->flow_9_email;
                    $flow10Email = $product->flow_10_email;
                    $flow11Email = $product->flow_11_email;
                    $flow12Email = $product->flow_12_email;
                @endphp






            </td><!--영문이름-->
            <td class="inner-td" style="">
                <div class="inner-div" style="">
                    @if ($flow1Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow1Email }}&product_id={{ $product->id }}&flow=1" class="{{ $product->id }} a-tag">{{ $product->flow_1 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=1" class="{{ $product->id }} a-tag">등록</a>
                    @endif

                    @if ($flow2Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow2Email }}&product_id={{ $product->id }}&flow=2" class="{{ $product->id }} a-tag">{{ $product->flow_2 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=2" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--기획-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($flow3Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow3Email }}&product_id={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">{{ $product->flow_3 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">등록</a>
                    @endif

                    @if ($flow4Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow4Email }}&product_id={{ $product->id }}&flow=4" class="{{ $product->id }} a-tag">{{ $product->flow_4 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=4" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--획득-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($flow5Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow5Email }}&product_id={{ $product->id }}&flow=5" class="{{ $product->id }} a-tag">{{ $product->flow_5 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=3" class="{{ $product->id }} a-tag">등록</a>
                    @endif

                    @if ($flow6Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow6Email }}&product_id={{ $product->id }}&flow=6" class="{{ $product->id }} a-tag">{{ $product->flow_6 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=6" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--모델링-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($flow7Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow7Email }}&product_id={{ $product->id }}&flow=7" class="{{ $product->id }} a-tag">{{ $product->flow_7 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=7" class="{{ $product->id }} a-tag">등록</a>
                    @endif

                    @if ($flow8Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow8Email }}&product_id={{ $product->id }}&flow=8" class="{{ $product->id }} a-tag">{{ $product->flow_8 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=8" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--맵핑-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($flow9Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow9Email }}&product_id={{ $product->id }}&flow=9" class="{{ $product->id }} a-tag">{{ $product->flow_9 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=9" class="{{ $product->id }} a-tag">등록</a>
                    @endif

                    @if ($flow10Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow10Email }}&product_id={{ $product->id }}&flow=10" class="{{ $product->id }} a-tag">{{ $product->flow_10 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=10" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
                </div>
            </td><!--게임엔진-->
            <td class="inner-td">
                <div class="inner-div" style="">
                    @if ($flow11Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow11Email }}&product_id={{ $product->id }}&flow=11" class="{{ $product->id }} a-tag">{{ $product->flow_11 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=9" class="{{ $product->id }} a-tag">등록</a>
                    @endif

                    @if ($flow12Email)
                    <a href="{{ route('user-info') }}?manager={{ $flow12Email }}&product_id={{ $product->id }}&flow=12" class="{{ $product->id }} a-tag">{{ $product->flow_12 }}</a>
                    @else
                    <a href="{{ route('admin.pages.create') }}?product={{ $product->id }}&flow=12" class="{{ $product->id }} a-tag" >등록</a>
                    @endif
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

