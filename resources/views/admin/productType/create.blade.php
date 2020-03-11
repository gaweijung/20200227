@extends('layouts/app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <h2>新增產品類型</h2>
<form method="POST" action="/home/productType/store" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
      <label for="types">types</label>
      <input type="text" class="form-control" id="types" name="types" required>

    </div>
    <div class="form-group">
        <label for="sort">sort</label>
        <input type="unmber" class="form-control" id="sort" name="sort" >

      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection

