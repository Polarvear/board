{{-- <h1>Hi, {{ $name }}</h1> --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Ajax CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>Laravel Mail Send</title>
    </head>
    <body >

        <form method="post" action="" enctype="multipart/form-data">
            <h3>E - Mail Address</h3>
            <input type="email" name="emailAddr" id="emailAddr" value="{{ Auth::user()->email }}" readonly>
            <hr>
            <h3>Name</h3>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly>
            <hr>
            <h3>Subject</h3>
            <input type="text" name="subject" id="subject">
            <hr>
            <h3>Content</h3>
            <textarea name="content" id="content"></textarea>
            <hr>
            {{-- <input type="submit" value="submit"> --}}
            <button type="button" class="sub-btn">전송하기</button>
        </form>
    </body>

    <script>

        const emailAddr = document.getElementById('emailAddr');
        const userName = document.getElementById('name');
        const subject = document.getElementById('subject');
        const content = document.getElementById('content');


        const subBtn = document.querySelector('.sub-btn');
        subBtn.addEventListener('click', (e) => {

            const subjectData = subject.value.trim();
            const contentData = content.value.trim();

            if (subject.value === '') {
                alert('제목을 작성해주세요.');
                return false;
            }

            if (content.value === '') {
                alert('이메일을 작성해주세요');
                return false;
            }

            fetch("{{route('mail.send')}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    emailAddr: emailAddr.value,
                    userName: userName.value,
                    subject: subjectData,
                    content: contentData
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
                console.log(data);
            })
            .catch(error => {
                console.error(error);
                console.log('실패함');
                // location.reload();
            });
            return false;
        });
    </script>
</html>
