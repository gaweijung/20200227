@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

<div class="container">

    <a href="/home/products/create" class="btn btn-success">新增產品</a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>IMG</th>
                <th>TYPES</th>
                <th>sort</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th width="125"></th>

        </thead>
        <thead>
            @foreach ($items as $item)
            <tr>
                <th>
                    <img width="120" src="{{asset($item->img)}}" alt="">
                </th>
                <th>{{$item->type_id}}</th>
                <th>{{$item->sort}}</th>
                <th>{{$item->title}}</th>
                <th>{!! $item->content !!}</th>
                <th>
                <a href="/home/products/edit/{{$item->id}}" class="btn btn-success btn-sm">修改</a>
                <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>
                <form id="delete-form-{{$item->id}}" action="/home/products/delete/{{$item->id}}" method="POST" style="display: none;">
                    @csrf
                </form>
                </th>
            </tr>
            @endforeach
        </thead>


    </table>
</div>

@endsection


@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "order":[[1 ,'desc']]
    });
} );

function show_confirm(id)
{
    console.log(id)
var r=confirm("確定刪除嗎?!");
if (r==true)
  {
    document.getElementById('delete-form-'+id).submit();
  }

}
</script>
@endsection
