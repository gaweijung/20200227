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
<form method="POST" action="/home/productType/updata/{{$product->id}}" enctype="multipart/form-data">
    @csrf


      <div class="form-group">
        <label for="sort">sort</label>
        <input type="unmber" class="form-control" id="sort" name="sort" value="{{$product->sort}}">

      </div>
    <div class="form-group">
      <label for="types">type</label>
      <input type="text" class="form-control" id="types" name="types" value="{{$product->types}}">

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection

@section('js')
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
@endsection
