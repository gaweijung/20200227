@extends('layouts/app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<style>
.news_img_card .btn-danger{
  position: absolute;
  right: -3px;
  top: -18px;
  border-radius: 50%;
}


</style>
@endsection

@section('content')

<div class="container">
<form method="POST" action="/home/products/updata/{{$product->id}}" enctype="multipart/form-data">
    @csrf
    <br>
    <div class="form-group">
        <label for="img">現有主要圖片</label>
        <img class="img-fluid" width="250" src="{{asset($product->img)}}" alt="">

      </div>
      <div class="form-group">
        <label for="img">重新上傳主要圖片</label>
        <input type="file" class="form-control" id="img" name="img" multiple>

      </div>
      <br>


      <div class="form-group">
        <label for="sort">sort</label>
        <input type="unmber" class="form-control" id="sort" name="sort" value="{{$product->sort}}">

      </div>
      <div class="form-group">
        <label for="price">price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">

      </div>
    <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">

    </div>
    <div class="form-group">
      <label for="content">content</label>
      <textarea class="form-control" name="content" id="content" cols="30" rows="10">{!! $product->content !!}</textarea>
      {{-- <input type="text" class="form-control" id="content" name="content" value="{{$news->content}}"> --}}
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection

{{-- @section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

        $('.news_img_card .btn-danger').click(function(){

        var newsimgid = this.getAttribute('data-newsimgid')

        $.ajax({
            url: "/home/ajax_delete_news_img",
            method: 'post',
            data: {
                newsimgid: newsimgid,
                  },
                success: function(result){
                $(`.news_img_card[data-newsimgid=${newsimgid}]`).remove();
                }
            });
        });

        function ajax_post_sort(element,img_id){
            var img_id;
            var sort_value = element.value;

            $.ajax({
            url: "/home/ajax_post_sort",
            method: 'post',
            data: {
                id: img_id,
                sort: sort_value
                  },
                success: function(result){
                $(`.news_img_card[data-newsimgid=${newsimgid}]`).remove();
                }
            });
        }
        $(document).ready(function() {
  $('#content').summernote({
    minHeight: 300,
  });
});



</script>
@endsection --}}
