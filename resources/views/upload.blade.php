<h1>Upload File</h1>
<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="files[]" multiple>
  <br>
  <br>
  <button type="submit">Upload File</button>
</form>