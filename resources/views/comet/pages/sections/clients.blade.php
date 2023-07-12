<section>
    <div class="container">
      <div class="title center">
        <h4 class="upper">Some of the best.</h4>
        <h3>Our Clients<span class="red-dot"></span></h3>
        <hr>
      </div>
      <div class="section-content">
        <div class="boxes clients">
          <div class="row">
            @php
              $client = App\Models\Clients::where('status', true) -> latest() -> take(6) -> get();
            @endphp
            @php
              $i = 1;
              if ( $i === 1) {
                 $class_name = 'border-right border-bottom';
                 $dalay = 0;
              }elseif($i === 2) {
                $class_name = 'border-right border-bottom';
                 $dalay = 500;
              }elseif($i === 3) {
                $class_name = 'border-bottom';
                 $dalay = 1000;
              }elseif($i === 4) {
                $class_name = 'border-right';
                 $dalay = 0;
              }elseif($i === 5) {
                $class_name = 'border-right';
                 $dalay = 500;
              }elseif($i == 6) {
                $class_name = '';
                 $dalay = 1000;
              }
              
              
              
            @endphp

            @foreach ($client as $client )
            <div class="col-sm-4 col-xs-6 {{$class_name}} ">
              <img src="{{url('storage/clients/' . $client -> logo )}}" alt="" data-animated="true" data-delay="{{$dalay}}" class="client-image">
            </div>
            @php
              $i++;
            @endphp
            @endforeach
          <!-- end of row-->
        </div>
      </div>
      <!-- end of section content-->
    </div>
  </section>