{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">Product List</h2>

    <a href="{{route("products.create")}}">
        <button type="button" class="btn btn-dark" style="float: right;">Create</button>
    </a>


    <table class="table table-striped table-hover">
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
                <td></td><!--영문이름-->
                <td>
                  <div style="display:flex; width: 177px;">
                  @if (isset($product->flow_1))
                  <div style="">
                    <input type="text" name="flow_1" class="form-control {{$product->id}}" value="{{$product->flow_1}}" readonly>
                    <a href="{{ route('user-info') }}?flow_1={{$product->flow_1}}" class="{{$product->id}} a-tag">정보보기</a>  
                  </div>
                  @else
                    <div style="">
                      <input type="text" name="flow_1" class="form-control {{$product->id}}" value="" readonly>
                    </div>
                  @endif

                  @if (isset($product->flow_2))
                  <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_2" class="form-control {{$product->id}}" value="{{$product->flow_2}}" readonly>
                    </a>  
                  </div>
                  @else
                    <input type="text" name="flow_2" class="form-control {{$product->id}}" value="" readonly>
                  @endif
                  </div>
                </td><!--기획-->
                <td>
                  <div style="display:flex; width: 177px;">
                @if (isset($product->flow_3))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_3" class="form-control {{$product->id}}" value="{{$product->flow_3}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_3" class="form-control {{$product->id}}" value="" readonly>
                @endif

                @if (isset($product->flow_4))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_4" class="form-control {{$product->id}}" value="{{$product->flow_4}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_4" class="form-control {{$product->id}}" value="" readonly>
                @endif
                  </div>
                </td><!--획득-->
                <td>
                <div style="display:flex; width: 177px;">
                @if (isset($product->flow_5))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_5" class="form-control {{$product->id}}" value="{{$product->flow_5}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_5" class="form-control {{$product->id}}" value="" readonly>
                @endif

                @if (isset($product->flow_6))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_6" class="form-control {{$product->id}}" value="{{$product->flow_6}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_6" class="form-control {{$product->id}}" value="" readonly>
                @endif
                  </div>
                </td><!--모델링-->
                <td>
                <div style="display:flex; width: 177px;">
                @if (isset($product->flow_7))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_7" class="form-control {{$product->id}}" value="{{$product->flow_7}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_7" class="form-control {{$product->id}} " value="" readonly>
                @endif

                @if (isset($product->flow_8))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_8" class="form-control {{$product->id}}" value="{{$product->flow_8}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_8" class="form-control {{$product->id}}" value="" readonly>
                @endif
                </div>
                </td><!--맵핑-->
                <td>
                <div style="display:flex; width: 177px;">
                @if (isset($product->flow_9))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_9" class="form-control {{$product->id}}" value="{{$product->flow_9}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_9" class="form-control {{$product->id}}" value="" readonly>
                @endif

                @if (isset($product->flow_10))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag" >
                      <input type="text" name="flow_10" class="form-control {{$product->id}}" value="{{$product->flow_10}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_10" class="form-control {{$product->id}}" value="" readonly> 
                @endif
                </div>
                </td><!--게임엔진-->
                <td>
                <div style="display:flex; width: 177px;">
                @if (isset($product->flow_11))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_11" class="form-control {{$product->id}}" value="{{$product->flow_11}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_11" class="form-control {{$product->id}}" value="" readonly>
                @endif

                @if (isset($product->flow_12))
                <div style="">
                    <a href="https://www.naver.com/" class="{{$product->id}} a-tag">
                      <input type="text" name="flow_12" class="form-control {{$product->id}}" value="{{$product->flow_12}}" readonly>
                    </a>  
                  </div>
                @else
                  <input type="text" name="flow_12" class="form-control {{$product->id}}" value="" readonly>
                @endif
                </div>
                </td><!--배포-->
                
                
                
                
                
                
                <!-- 수정 & 삭제 부분 주석처리 -->
                <td>
                  <div style="display:flex;">
                    <!-- <input type="button" value="수정" onclick="location.href='{{route("products.edit", $product)}}'"/> -->
                    <button class="edit-btn {{$product->id}}">수정</button>
                    <!-- <input type="button" value="수정" onclick="" class="edit-btn {{$product->id}}"/> -->
                    <!-- <form action="{{route('products.update', $product->id)}}" method="post" style="margin-left: 10px;">
                      {{-- update method와 csrf 처리 필요 --}}
                      @method('patch')
                      @csrf -->
                      <button class="save-btn {{$product->id}}">저장</button>
                      <!-- <input type="submit" class="save-btn {{$product->id}}"/> -->
                      <div>{{$product->id}}</div>
                    <!-- </form> -->
                    <form action="{{route('products.destroy', $product->id)}}" method="post" style="margin-left: 10px;">
                        {{-- delete method와 csrf 처리필요 --}}
                        @method('delete')
                        @csrf
                        <input onclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="삭제"/>
                    </form>
                  </div>  
                </td>
               
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- 라라벨 기본 지원 페이지네이션 --}}
    {!! $products->links() !!}
@endsection