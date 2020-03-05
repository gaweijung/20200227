@extends('layouts/app')



@section('content')
<h2>新增最新消息</h2>
<div class="container">
<form method="POST" action="/home/news/store" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="img">img</label>
        <input type="file" class="form-control" id="img" name="img" required>

      </div>
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
