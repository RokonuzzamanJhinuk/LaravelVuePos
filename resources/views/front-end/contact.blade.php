@extends('front-end')

@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('/') }}">Home</a> / <span>Contact Us</span></h3>
        </div>
    </div>
    <!--banner-->
    <!--content-->
    <div class="content">
        <!--contact-->
        <div class="mail-w3ls">
            <div class="container">
                <h2 class="tittle">Contact Us</h2>
                <div class="mail-grids">
                    <div class="mail-top">
                        <div class="col-md-4 mail-grid">
                            <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            <h5>Address</h5>
                            <p>{{ $basicInfo->company_address  }}</p>
                        </div>
                        <div class="col-md-4 mail-grid">
                            <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                            <h5>Phone</h5>
                            <p>Cellphone: {{ $basicInfo->company_hotLine  }} </p>
                        </div>
                        <div class="col-md-4 mail-grid">
                            <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                            <h5>E-mail</h5>
                            <p>E-mail:<a href="mailto:{{ $basicInfo->manager_cell }}"> {{ $basicInfo->manager_cell }}</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="map-w3">
                        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673607.6340751307!2d-104.44001811743372!3d48.738351336759585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5321f600f5170943%3A0x94f2e8e71e1dfc7a!2sE+Comertown+Rd%2C+Westby%2C+MT+59275%2C+USA!5e0!3m2!1sen!2sin!4v1467080368135"  allowfullscreen></iframe>--}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.963451954039!2d90.40204191498133!3d23.748682684590204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x87ab199b1a028225!2sHM+Traders+Limited!5e0!3m2!1sen!2sbd!4v1557094304263!5m2!1sen!2sbd" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                    <div class="mail-bottom">
                        <h4>Get In Touch With Us</h4>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Enter Your Name ." required="">
                            <input type="email" name="Email" placeholder="Enter Your Email ." required="">
                            <input type="text" name="Telephone" placeholder="Enter Your Cell Phone No." required="">
                            <textarea name="message" placeholder="Enter your Message Please..."  required=""> </textarea>
                            <input type="submit" value="Submit" >
                            {{--<input type="reset" value="Clear" >--}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--contact-->
    </div>
    <!--content-->
@endsection