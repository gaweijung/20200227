@extends('layouts/app')



@section('content')

<div class="container">
<form method="POST" action="/home/news/updata/{{$news->id}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="img">現有圖片</label>
        <img class="img-fluid" width="250" src="{{asset('/storage/'.$news->img)}}" alt="">

      </div>
      <div class="form-group">
        <label for="img">重新上傳圖片</label>
        <input type="file" class="form-control" id="img" name="img" multiple>

      </div>
      <div class="form-group">
        <label for="sort">sort</label>
        <input type="unmber" class="form-control" id="sort" name="sort" value="{{$news->sort}}">

      </div>
    <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}">

    </div>
    <div class="form-group">
      <label for="content">content</label>
      <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$news->content}}</textarea>
      {{-- <input type="text" class="form-control" id="content" name="content" value="{{$news->content}}"> --}}
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
