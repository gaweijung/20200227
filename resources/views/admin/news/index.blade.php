@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

<div class="container">

    <a href="/home/news/create" class="btn btn-success">新增最新消息</a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>IMG</th>
                <th>sort</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th width="90"></th>

        </thead>

        <thead>
            @foreach ($all_news as $item)
            <tr>
                <th>{{$item->img}}</th>
                <th>{{$item->sort}}</th>
                <th>{{$item->title}}</th>
                <th>{{$item->content}}</th>
                <th>
                <a href="/home/news/edit/{{$item->id}}" class="btn btn-success btn-sm">修改</a>
                <button class="btn btn-danger btn-sm" onclick="show_confirm({{$item->id}})">刪除</button>
                <form id="delete-form-{{$item->id}}" action="/home/news/delete/{{$item->id}}" method="POST" style="display: none;">
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
