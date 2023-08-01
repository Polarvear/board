
<h2>수정할 페이지</h2>
{{-- {{Auth::user()->type}} --}}
@php //GET으로 받은 새로운 페이지
    $manager = request()->query('manager');
    $productId = request()->query('product_id');
    $flow = request()->query('flow');
@endphp

@yield('head')
    <style>
        .p-tag {
            display: flex;
            justify-content: space-between;
        }

        .comment-area {
            width:100%;
          }

        .btns {
        }
        .submit-btn {
            margin-top:10px;
        }



    </style>

@extends('products.layout')

@section('content')
    <h2 class="mt-4 mb-3"></h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
    @endif
    <p class="p-tag" style="" class="pt-2">
        @if (Auth::user()->type == 'user')
        <a href="javascript:history.back()">
            <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
        @else
        <a href="{{ route('products.index') }}">
            <button type="button" class="btn btn-primary">돌아가기</button>
        </a>
        @endif

      {{-- {{$user[0]->type}}
      <a href="{{route("admin.pages.create")}}?product={{$productId}}&flow={{$flow}}">
        <button type="button" class="btn btn-primary">수정하기 </button>
      </a> --}}
    {{-- {{ Auth::user()->type }}
    @foreach ($user as $userInfo)
        @php
        $email = $userInfo->email;
        $type = $userInfo->type;
        @endphp
        @if ($email === $userAllData->email)
            {{ $type }}
        @endif
    @endforeach --}}
    @if (Auth::user()->type != 'admin')
      <style>
          .hide-button {
              display: none;
          }

      </style>
    @endif
    <a href="{{ route('admin.pages.create') }}?product={{ $productId }}&flow={{ $flow }}" class="btn btn-primary {{ Auth::user()->type != 'admin' ? 'hide-button' : '' }}">수정하기</a>

    </p>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            작업자 이름 : {{ $userAllData->name }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            소속(회사): {{ $userAllData->company }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            이메일 :
            <a href="mailto:{{ $userAllData->email }}">{{ $userAllData->email }}</a>
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            연락처 : {{ $userAllData->phone }}
        </div>
    </div>
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            소속(팀) : {{ $userAllData->team }}
        </div>
    </div>

    {{--

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            유저 데이터 : {{ dd($user) }}
        </div>
    </div>

     --}}
{{--  댓글작성   --}}
{{-- @auth() --}}
    <div class="w-4/5 mx-auto mt-6 text-right">
        <form method="post" action="{{route('comment.add')}}" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="parent_id" value="{{$board->id}}"> --}}
            <input type="hidden" name="product_id" value="{{ $productId }}">
            <input type="hidden" name="member_id" value="{{ $flow }}">
            <br>
            <textarea name="commentStory" class="border border-blue-300 resize-none w-full h-32 comment-area"></textarea>
            <button type="submit" class="btn btn-primary submit-btn">등록하기</button>
        </form>
    </div>
    {{-- @endauth --}}

    <div class="content mt-4 rounded-3 border border-secondary">
        @foreach ($comments as $comment)
        @if ($comment->product_id == $productId && $comment->flow_num == $flow) {{-- 해당 댓글만 보여주기--}}
        <p>
            요청사항 : <span id="comment{{ $comment->id }}">{{ $comment->comments }}</span>
        </p>
    </div>
    <div class="btns">
        {{-- 버튼색 변경 start --}}
        @if ($comment->status == 1)
        <button type="button" class="btn btn-success ing-btn" name="status-change" value="{{ $comment->status }}/{{$comment->id}}">진행중</button>
        @elseif ($comment->status == 2)
        <button type="button" class="btn btn-warning done-btn" name="status-change" disabled value="{{ $comment->status }}/{{$comment->id}}">완료</button>
        @else
        <button type="button" class="btn btn-dark confirm-btn" name="status-change" value="{{ $comment->status }}/{{$comment->id}}">확인</button>
        @endif
        {{-- 버튼 색 변경 end --}}
        @if (Auth::user()->type != 'user') {{-- 수정 삭제 버튼은 user가 아닐경우 보임 //타입 따라 다르게 --}}
        <button type="" class="btn btn-primary" id="edit{{ $comment->id }}" onclick="editComment({{ $comment->id }})" type="submit">수정</button>
        <form action="" method="POST" id="deleteForm{{ $comment->id }}">
            @csrf
            {{-- @method('delete') --}}
            <input type="hidden" name="comment-id" value="{{ $comment->id }}">
            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $comment->id }})">삭제</button>
        </form>
        @endif
    </div>
    @endif
    @endforeach
{{-- javascript 시작 --}}
    <script>
    // 댓글 삭제기능
    const deleteUrl = "{{ route('comment.delete') }}";
    function confirmDelete(commentId) {
        if (confirm('댓글을 삭제하시겠습니까?')) {
            const formId = document.getElementById(`deleteForm${commentId}`);
            formId.setAttribute('action', deleteUrl);
            formId.submit();
        }
    }

    // 댓글 수정기능
    function editComment(commentId) {
        const commentSpan = document.getElementById(`comment${commentId}`);
        const editButton = document.getElementById(`edit${commentId}`);

        if (commentSpan && editButton) {
            const commentText = commentSpan.innerText;
            const inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.value = commentText;
            inputElement.name = `comment${commentId}`;
            inputElement.classList.add('form-control');

            commentSpan.innerText = '';
            commentSpan.appendChild(inputElement);

            editButton.innerText = '저장';
            editButton.onclick = () => saveComment(commentId); // saveComment 호출
        }
    }


    function saveComment(commentId) {
        const commentSpan = document.getElementById(`comment${commentId}`);
        const editButton = document.getElementById(`edit${commentId}`);
        const inputElement = commentSpan.querySelector('input');

        if (inputElement) {
            const commentText = inputElement.value;
            // 여기서 AJAX 요청
            fetch("{{ route('comment.update') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    commentId: commentId,
                    commentText: commentText
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to save comment');
                }
                return response.json();
            })
            .then(data => {
                // 서버에서 반환한 데이터를 처리하는 코드
                commentSpan.innerText = data.commentText;
                editButton.innerText = '수정';
                editButton.onclick = () => editComment(commentId);
            })
            .catch(error => {
                console.error(error);
                alert('댓글 저장에 실패했습니다.');
                // location.reload();
            });
        }
    }


    //댓글 확인 기능
    const confirmBtns = document.querySelectorAll('.confirm-btn');

    confirmBtns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            console.log(btn.value);
            const value = btn.value.split('/');
            const commentStatus = value[0];
            const commentId = value[1];


            if (confirm('진행하시겠습니까?')) {
                fetch("{{ route('comment.status') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        commentStatus: commentStatus,
                        commentId: commentId
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed change to comment status');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    // 서버에서 반환한 데이터를 처리하는 코드
                    location.reload();
                })
                .catch(error => {
                    console.error(error);
                    // alert('error');
                    // location.reload();
                });

            } else {

            }

        });
    });




    const ingBtns = document.querySelectorAll(".ing-btn");

    ingBtns.forEach((btn) => { //진행중 버튼 이벤트 등록
        btn.addEventListener('click', (e) => {
            console.log(btn.value);
            const value = btn.value.split('/');
            const commentStatus = value[0];
            const commentId = value[1];


            if (confirm('완료하시겠습니까?')) {
                fetch("{{ route('comment.statusChange') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        commentStatus: commentStatus,
                        commentId: commentId
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed change to comment status');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    // 서버에서 반환한 데이터를 처리하는 코드
                    location.reload();
                })
                .catch(error => {
                    console.error(error);
                    // alert('error');
                    // location.reload();
                });

            } else {

            }
        })
    })



    </script>
@endsection


