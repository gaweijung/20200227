@extends('layouts/app')



@section('content')
<h2>新增最新消息</h2>
<div class="container">
<form method="POST" action="/home/news/store">
    @csrf

    <div class="form-group">
        <label for="img">img</label>
        <input type="text" class="form-control" id="img" name="img">

      </div>
    <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" name="title">

    </div>
    <div class="form-group">
      <label for="content">content</label>
      <input type="text" class="form-control" id="content" name="content">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
