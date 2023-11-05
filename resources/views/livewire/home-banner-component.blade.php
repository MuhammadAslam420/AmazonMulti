<section class="home-slider position-relative mb-10" style="padding-top:0;margin-top:0;">
    <div class="container" style="width:100%;margin:0;padding:0;"> 
        <div class="home-slide-cover">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1" >
              @if ($banners)
              @foreach ($banners as $banner )
              <a href="{{$banner->link}}">
              <div class="single-hero-slider single-animation-wrap"  style="background-image: url({{asset('assets/images')}}/{{ $banner->banner }});height:50vh;border-radius:1px;width:100%padding:0;margin:0;" >
                <div class="slider-content">
                    <h1 class="display-2 mb-30">
                       {!! $banner->title !!}
                    </h1>

                </div>
            </div>
            </a>
              @endforeach

              @else
              <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset('assets/images/slider-1.png')}})">
                <div class="slider-content">
                    <h1 class="display-2 mb-40">
                        Don’t miss amazing<br />
                        grocery deals
                    </h1>

                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap" style="background-image: url({{asset('assets/images/slider-2.png')}})">
                <div class="slider-content">
                    <h1 class="display-2 mb-40">
                        Fresh Vegetables<br />
                        Big discount
                    </h1>

                </div>
            </div>

              @endif
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
