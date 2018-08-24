@extends('index')

@section('content')
  <!-- SLIDER SECTION START -->
  <div class="slider-1 pos-relative slider-overlay">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-3" class="slides">   
                    <div class="col-sm-4 col-xs-12"><img src="website/images/brand/slider.png" alt="" title="#slider-direction-1"  /></div>
                    <div class="col-sm-4 col-xs-12"><img src="website/images/slider/s2.jpg" alt="" title="#slider-direction-2"  /></div>
                </div>
                <!-- direction 1 -->
                <div id="slider-direction-1" class="slider-direction">
                    <div class="slider-content text-center">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h4 class="slider-1-title-1">Bienvenido <span>Inversiones & Proyectos</span></h4>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                            <h1 class="slider-1-title-2">TE ASESORAMOS EN LA BUSQUEDA DE SU LOCAL</h1>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                            <p class="slider-1-desc">Le asesoramos en la busqueda de la ubicación ideal para su marca <br> realizamos estudios de mercado y ranking de zonas </p>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                            <a class="slider-button mt-40" href="{{ url('marca') }}">SOY UNA MARCA</a>
                        </div>
                    </div>
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-content text-left">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                              <h4 class="slider-1-title-1">Bienvenido <span>Inversiones & Proyectos</span></h4>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                            <h1 class="slider-1-title-2">LE AYUDAMOS CON SU INMUEBLES</h1>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                            <p class="slider-1-desc">Si esta buscando un inmueble para venta y/o arriendo <br> o quiere promocionar uno. </p>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                            <a class="slider-button mt-40" href="#">BUSCO INMUEBLES</a>
                            <a class="slider-button mt-40" href="{{ url('results_inmobiliarias') }}">PROMOCIONAR MI INMUEBLE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SLIDER SECTION END -->
  <!-- Start page content -->
  <section id="page-content" class="page-wrapper">
            
            <!-- FIND HOME AREA START -->
                @include('components.searcher')
            <!-- FIND HOME AREA END -->
            
            <!-- FEATURED FLAT AREA START -->
            <div class="featured-flat-area pt-115 pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>PROPIEDADES MAS SOLICITADAS</h2>
                                <p>Sheltek is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-flat">
                        <div class="row">
                        <!-- flat-item --> 
                        @foreach($firstFiveProperties as $prop)
                            @include('partials.forms.requested_properties')
                        @endforeach
                            <!-- flat-item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEATURED FLAT AREA END -->

            <!-- BLOG AREA START -->
            <div class="blog-area pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title-2 text-center">
                                <h2>FROM BLOG</h2>
                                <p>Sheltek is the best theme for  elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="blog-carousel">
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="website/images/blog/1.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Maridland de Villa</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="website/images/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Latest Design House</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="website/images/blog/3.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Duplex Villa House</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                            <!-- blog-item -->
                            <div class="col-md-12">
                                <article class="blog-item bg-gray">
                                    <div class="blog-image">
                                        <a href="single-blog.html"><img src="website/images/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-info">
                                        <div class="post-title-time">
                                            <h5><a href="single-blog.html">Latest Design House</a></h5>
                                            <p>July 30, 2016 / 10 am</p>
                                        </div>
                                        <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                                        <a class="read-more" href="single-blog.html">Read more</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG AREA END -->

            <!-- BRAND AREA START -->
            @include('components.brands')
            <!-- BRAND AREA END -->
            
            <!-- SUBSCRIBE AREA START -->
             @include('components.subscribe')
            <!-- SUBSCRIBE AREA END -->
        </section>
        <!-- End page content -->
@endsection