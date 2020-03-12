@extends('layouts/nav')



@section('container')
<section class="engine"><a href="https://mobirise.info/x">css templates</a></section><section class="features3 cid-rRF3umTBWU" id="features3-7" style="padding-top:100px">
    <div class="container">
        <div class="media-container-row">

           title: {{$products->title}}
           <br>
           多張圖片


           @foreach ($products->img as $img)
                <img width="250"  src="{{asset($img->img)}}" alt="">

                {{-- {{$news_img->news_img}} --}}
           @endforeach

        </div>
    </div>



</section>

    @endsection
