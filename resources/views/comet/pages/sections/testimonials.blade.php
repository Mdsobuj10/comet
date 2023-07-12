<section class="parallax">
    <div data-parallax="scroll" data-image-src="frontend/images/bg/7.jpg" class="parallax-bg"></div>
    <div class="parallax-overlay pb-50 pt-50">
      <div class="container">
        <div class="title center">
          <h3>What They Say<span class="red-dot"></span></h3>
          <hr>
        </div>
        @php
          $testimonial = App\Models\Testimonials::where('status', true) -> latest() -> take(5) -> get();
        @endphp
        <div class="section-content">
          <div id="testimonials-slider" data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-outside">
            <ul class="slides">
              @foreach ($testimonial as $testimonial)
                               <li>
                <blockquote>
                  <p>{{ $testimonial -> testimonial}}</p>
                  <footer>{{$testimonial -> name}} - {{$testimonial -> company}} .</footer>
                </blockquote>
              </li>

              @endforeach
   

            </ul>
          </div>
        </div>
      </div>
      <!-- end of container-->
    </div>
  </section>