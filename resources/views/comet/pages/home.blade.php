@extends('comet.layouts.app')

    <!-- Home Section-->
    <section id="home">
        <!-- Home Slider-->
        <div id="home-slider" class="flexslider">
          <ul class="slides">
            @php
              $silders =App\Models\Slider:: where('status', true) -> latest() -> get();
            @endphp
            @foreach ( $silders as  $silders )
           
            <li>
             <img src="{{url('storage/slider/'. $silders -> photo)}}" alt="">
              <div class="slide-wrap">
                <div class="slide-content">
                  <div class="container">
                    <h1>{{$silders -> title}}<span class="red-dot"></span></h1>
                    <h6>{{$silders -> subtitle}}<</h6>
                    <p>
                       @foreach (json_decode($silders -> btns) as $btn )
                         <a href="{{$btn -> btn_link}}" class="{{$btn -> btn_type}}">{{$btn -> btn_title}}</a>
                       @endforeach
                    </p>
                  </div>
                </div>
              </div>
            </li>
            
            @endforeach
     

          </ul>
        </div>
        <!-- End Home Slider-->
      </section>
      <!-- End Home Section-->
{{-- about section --}}
@include('comet.pages.sections.about')
{{--end  about section --}}
@include('comet.pages.sections.expertise')
@include('comet.pages.sections.vision')
@include('comet.pages.sections.portpolio')
@include('comet.pages.sections.clients')
@include('comet.pages.sections.testimonials')
@include('comet.pages.sections.blog')
