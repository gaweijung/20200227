@extends('layouts/app')



@section('content')

<div class="container">
<form method="POST" action="/home/news/updata/{{$news->id}}">
    @csrf

    <div class="form-group">
        <label for="img">img</label>
    <input type="text" class="form-control" id="img" name="img" value="{{$news->img}}">

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
