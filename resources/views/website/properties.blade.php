@extends('index')

@section('content')
<!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-property bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title"></h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ url('') }}">Inicio</a></li>
                            <li>Inmobiliaria</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- BREADCRUMBS AREA END -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
    <!-- FIND HOME AREA START -->
    
    <!-- FIND HOME AREA END -->
     <!-- FEATURED FLAT AREA START -->
     
     <div class="featured-flat-area pt-115 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12 ">
                    <div class="featured-flat">
                        <div class="row">
                            <!-- flat-item --> 
                            @foreach($properties as $prop)
                                @include('partials.forms.requested_properties')
                            @endforeach
                            <!-- pagination-area -->
                            <div class="col-xs-12">
                                <div class="pagination-area mb-60">
                                    <ul class="pagination-list text-center">
                                        <li><a href=""><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                        @for($i = 1; $i <= 5; $i++)
                                            <li class="{{ $i == 5 ? 'active' : '' }}">
                                                <a href="{{ route('properties', array('page' => $i)) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                            <!-- widget-search -->
                            <aside class="widget widget-search mb-30">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Buscar">
                                    <button type="button" class=""><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories mb-50">
                                <h5>Categorias</h5>
                                <ul class="widget-categories-list">
                                    <li><a href="#">Locales Comerciales <span>1420</span></a></li>
                                    <li><a href="#">Lotes <span>780</span></a></li>
                                    <li><a href="#">Bodegas <span>670</span></a></li>
                                    <li><a href="#">Casas Coloniales <span>520</span></a></li>
                                    <li><a href="#">Franquicias <span>350</span></a></li>
                                </ul>
                            </aside>
                            <!-- widget-recent-post -->
                            <aside class="widget widget-recent-post mb-50">
                                <h5>Destacados</h5>
                                <div class="row">
                                    <!-- blog-item -->
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <article class="recent-post-item">
                                            <div class="recent-post-image">
                                                <a href="single-blog.html"><img src="website/images/recent-post/1.jpg" alt=""></a>
                                            </div>
                                            <div class="recent-post-info">
                                                <div class="recent-post-title-time">
                                                    <h5><a href="single-blog.html">Maridland de Villa</a></h5>
                                                    <p>July 30, 2016 / 10 am</p>
                                                </div>
                                                <p>Lorem must explain to you how all this mistaolt</p>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- blog-item -->
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <article class="recent-post-item">
                                            <div class="recent-post-image">
                                                <a href="single-blog.html"><img src="website/images/recent-post/2.jpg" alt=""></a>
                                            </div>
                                            <div class="recent-post-info">
                                                <div class="recent-post-title-time">
                                                    <h5><a href="single-blog.html">Maridland de Villa</a></h5>
                                                    <p>July 30, 2016 / 10 am</p>
                                                </div>
                                                <p>Lorem must explain to you how all this mistaolt</p>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- blog-item -->
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <article class="recent-post-item">
                                            <div class="recent-post-image">
                                                <a href="single-blog.html"><img src="website/images/recent-post/3.jpg" alt=""></a>
                                            </div>
                                            <div class="recent-post-info">
                                                <div class="recent-post-title-time">
                                                    <h5><a href="single-blog.html">Maridland de Villa</a></h5>
                                                    <p>July 30, 2016 / 10 am</p>
                                                </div>
                                                <p>Lorem must explain to you how all this mistaolt</p>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- blog-item -->
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <article class="recent-post-item">
                                            <div class="recent-post-image">
                                                <a href="single-blog.html"><img src="website/images/recent-post/3.jpg" alt=""></a>
                                            </div>
                                            <div class="recent-post-info">
                                                <div class="recent-post-title-time">
                                                    <h5><a href="single-blog.html">Maridland de Villa</a></h5>
                                                    <p>July 30, 2016 / 10 am</p>
                                                </div>
                                                <p>Lorem must explain to you how all this mistaolt</p>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </aside>
                        </div>
            </div>
        </div>
    </div>
            <!-- FEATURED FLAT AREA END -->       
            
    <!-- SUBSCRIBE AREA START -->
        @include('components.subscribe')
    <!-- SUBSCRIBE AREA END -->                    
</section>
<!-- End page content -->
@endsection