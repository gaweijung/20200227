@extends('layouts/app')

@section('css')
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet"> --}}
@endsection

@section('content')

<div class="container">
    <h2>新增產品管理</h2>
<form method="POST" action="/home/products/store" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="img">主要圖片上傳</label>
        <input type="file" class="form-control" id="img" name="img" required>

      </div>
      {{-- <div class="form-group">
        <label for="news_imgs">多張圖片上傳</label>
        <input type="file" class="form-control" id="news_imgs" name="news_imgs[]"  multiple>

      </div> --}}
      <div class="form-group">
        <label for="types_id">types</label>
        <input type="text" class="form-control" id="types_id" name="types_id" required>

      </div>
      {{-- <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="types_id" name="types_id" >
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div> --}}
    <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" name="title" required>

    </div>
    <div class="form-group">
      <label for="content">content</label>
      <input type="text" class="form-control" id="content" name="content" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
//     $(document).ready(function() {
//   $('#content').summernote({
//     minHeight: 300,
//   });
// });
</script>
@endsection
