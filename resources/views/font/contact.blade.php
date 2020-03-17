@extends('layouts/nav')

@section('container')



<section class="engine" ><a href="https://mobirise.info/u">bootstrap website templates</a></section>
<section class="mbr-section form1 cid-rTeER5Ms9M" id="form1-a" style="padding-top:100px">




    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">

                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    與我聯繫
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <form action="/contact/store" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form">
                    @csrf

                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-md-4  form-group" data-for="name">
                            <label for="name-form1-a" class="form-control-label mbr-fonts-style display-7">Name</label>
                            <input type="text" name="name" data-form-field="Name" required="required" class="form-control display-7" id="name-form1-a">
                        </div>
                        <div class="col-md-4  form-group" data-for="email">
                            <label for="email-form1-a" class="form-control-label mbr-fonts-style display-7">Email</label>
                            <input type="email" name="email" data-form-field="Email" required="required" class="form-control display-7" id="email-form1-a">
                        </div>
                        <div data-for="message" class="col-md-12 form-group">
                            <label for="message-form1-a" class="form-control-label mbr-fonts-style display-7">Message</label>
                            <textarea name="message" data-form-field="Message" class="form-control display-7" id="message-form1-a"></textarea>
                        </div>
                        <div class="col-md-12 input-group-btn align-center">
                            <button type="submit" class="btn btn-primary btn-form display-4">SEND FORM</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
