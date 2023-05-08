@extends('layouts.app')


@section('content')
@if ($message = Session::get('message'))
<div class="alert alert-success alert-block mt-2">
    <button type="button" class="close" data-dismiss="alert" style="color:black;">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div>
<div class="text-center">
    <img src='img/Background.png' width="1370" style="max-width: 100%; height:auto;">
</div>
<p></p>

<div class="header ml-3 mr-3 text-dark" style=" padding: 7px; margin-bottom: 5px;">
    <h1 class="text-center" style="font-size: 20px; font-weight:600; margin-top: 10px;">CONTACT INFORMATION</h1>
</div>
<div class="">
    <div class=" p-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-left" style="font-size: 22px; font-weight: 600;">Get in touch with us!</h1>
                <p class="text-justify" style="font-size: 18px;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente facilis repellendus architecto esse, amet at officia unde, omnis quod harum laudantium in veniam inventore soluta. Recusandae expedita deleniti vel voluptatem?</p>

                    <div class="mx-auto mt-5" style="width: 18rem;">
                        <div class="">
                            <div class="d-flex justify-content-center">

                            </div>
                            <p class="text-center" style="font-size: 16px; font-weight: 700;">NAME</p>
                            @foreach ($contacts as $cont)


                            <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                            {{$cont->name}}
                            </p>

                        </div>
                    </div>

                    <div class="mx-auto" style="width: 18rem;">
                        <div class="">
                            <div class="d-flex justify-content-center">

                            </div>
                            <p class="text-center" style="font-size: 16px; font-weight: 700;">EMAIL</p>

                            <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                            {{$cont->email}}
                            </p>

                        </div>
                    </div>

                <div class="mx-auto" style="width: 18rem;">
                    <div class="">
                        <div class="d-flex justify-content-center">

                        </div>
                        <p class="text-center" style="font-size: 16px; font-weight: 700;">ADDRESS</p>

                        <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                        {{$cont->address}}
                        </p>

                    </div>
                </div>


                <div class=" mx-auto" style="width: 18rem;">
                    <div class="">
                        <div class="d-flex justify-content-center">

                        </div>
                        <p class="text-center" style="font-size: 16px; font-weight: 700;">CONTACT</p>
                        <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                        {{$cont->number}}</p>

                            @endforeach

                    </div>
                </div>


            </div>
            <div class="col-md-6">
                <iframe class=""
                    src="https://maps.google.com/maps?width=667&amp;height=1&amp;hl=en&amp;q=helen larena siquijor &amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                    height="400" width="100%" style="border:0;" allowfullscreen="true" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>

                <div class=" p-2 rounded col-md-12 mt-1 mx-auto">
                    <p class="mt-1 text-center" style="font-size: 20px; font-weight: 500; color: dimgray"><span> Email us</span>
                    </p>

                    <form action="{{ url('/send-email') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="" style="color:dimgray">To:</label>
                            <input type="email" class="form-control" name="email"
                                value="None" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" style="color:dimgray">Subject:</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="" style="color:dimgray;">Content: </label>
                            <textarea style=" height: 150px;" id="" type="text" class="form-control" placeholder="" title=""
                                name="content" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success mt-3"><span class="fas fa-envelope"></span>
                            Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


