<!doctype html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>
<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>





const editBtns = document.getElementsByClassName('edit-btn');

// editBtns를 배열로 변환하여 반복문 실행
  Array.from(editBtns).forEach((editBtn) => {
    editBtn.addEventListener('click', (e) => {

    let className = e.target.className;
    const classValue = className.match(/\d+/);
    let numberValue = classValue ? classValue[0] : "";
    //console.log(numberValue);

    let elements = document.getElementsByClassName(numberValue);

    // 선택된 요소들을 순회하며 작업 수행
    for (let i = 0; i < elements.length; i++) {
      let element = elements[i];
      // console.log(element.value);
      // if (aTagName === "A") {
      //   console.log(aTagName === "A");
      //   aTagName.remove();
      // }
      if(element.readOnly) {
        element.removeAttribute('readonly');
        //aTag.remove();

      }
    }
  });
});

const saveBtn = document.getElementsByClassName('save-btn');
Array.from(saveBtn).forEach((saveBtn) => {
  saveBtn.addEventListener('click', (e) => {
    let className = e.target.className;
    // console.log(className);
    const classValue = className.match(/\d+/);
    let numberValue = classValue ? classValue[0] : "";
    let elements = document.getElementsByClassName(numberValue);
    const flowList = [];
    for (let i = 0; i < elements.length; i++) {
      let element = elements[i];
      flowList.push(element.value);
        // console.log(element.value);

    }
    // console.log(numberValue);
    // console.log(flowList);

    $.ajax({
      type: "POST",
      url: "{{ route('product.ajaxRequest') }}",
      data: {
        flowList : JSON.stringify(flowList),
        numberValue,
        _token: '{{ csrf_token() }}'
      }, // Add a comma here
      success: function(response) {
        //console.log(response.flowList);
        // console.log('성공');
        location.reload();
      },
      error: function(response) {
        console.error(error);
      }
    });
  });
});


</script>

</body>
</html>
