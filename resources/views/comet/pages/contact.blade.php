@extends('comet.layouts.app')

@section('frontend-main')
<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="frontend/images/bg/5.jpg" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">Drop a Line<span class="red-dot"></span></h1>
              <h4>Let’s get in touch.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="icon-box-small"><i class="icon-map"></i>
            <hr>
            <h4>Address</h4>
            <p><span>Fourth Floor</span><span>76 Ninth Ave, New York</span>
            </p>
          </div>
          <!-- end of icon box-->
        </div>
        <div class="col-sm-4">
          <div class="icon-box-small"><i class="icon-phone"></i>
            <hr>
            <h4>Phones</h4>
            <p><span>+12 212-568-999</span><span>+12 323-999-568</span>
            </p>
          </div>
          <!-- end of icon box-->
        </div>
        <div class="col-sm-4">
          <div class="icon-box-small"><i class="icon-envelope"></i>
            <hr>
            <h4>E-mail</h4>
            <p><span>hello@comet.com</span><span>business@comet.com</span>
            </p>
          </div>
          <!-- end of icon box-->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 map-side">
          <div id="map" data-lat="40.773328" data-lang="-73.960088"></div>
          <!-- end of map-->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-2">
          <div class="title">
            <h4 class="upper">Let's work together.</h4>
            <h3>Contact Us<span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="section-content">
            <div class="contact-form">
              <form id="contact-form" method="POST" action="http://themes.hody.co/html/comet/mail.php">
                <div class="form-group">
                  <input name="fullname" type="text" placeholder="Your Name" data-required="true" class="form-control">
                </div>
                <div class="form-group">
                  <input name="email" type="email" placeholder="Your Email" data-required="true" class="form-control">
                </div>
                <div class="form-group">
                  <input name="phone" type="text" placeholder="Phone Number" class="form-control">
                </div>
                <div class="form-group">
                  <textarea name="message" placeholder="Message" data-required="true" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-color">Send Message</button>
                </div>
              </form>
            </div>
            <!-- end of contact form-->
          </div>
          <!-- end of section-content-->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>
  <section>
     @php
       
       $contact =App\Models\Contact:: where('status', true) -> latest() -> take(4) -> get();
       
     @endphp
    <div class="container">
      <div class="row">
        @foreach ($contact as $contact)
        <div class="col-md-3 col-sm-6">
          <div class="counter">
            <div class="counter-icon"><i class="{{$contact -> icon}}"></i>
            </div>
            <div class="counter-content">
              <h5><span data-count="{{$contact -> count}}" class="number-count">{{$contact -> count}}</span><span class="red-dot"></span></h5><span>{{$contact -> title}}</span>
            </div>
          </div>
          <!-- end of counter              -->
        </div>
        @endforeach
               -->
        </div>
      </div>
    </div>
  </section>

@endsection