@extends('layouts/nav')



@section('container')
<section class="engine"><a href="https://mobirise.info/x">css templates</a></section><section class="features3 cid-rRF3umTBWU" id="features3-7" style="padding-top:100px">

    <div class="container">
        <div class="media-container-row">

           title: {{$news->title}}
           <br>
           @foreach ($news->news_imgs as $news_img)
        <img src="{{$news_img->img}}" alt="">

           @endforeach

        </div>
    </div>
</section>

@endsection
