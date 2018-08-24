<footer id="footer" class="footer-area bg-2 bg-opacity-black-90">
    <div class="footer-top pt-110 pb-80">
        <div class="container">
            <div class="row">
                <!-- footer-address -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                        <h6 class="footer-titel">Estar en Contacto</h6>
                        <ul class="footer-address">
                            <li>
                                <div class="address-icon">
                                    <img src="website/images/icons/location-2.png" alt="">
                                </div>
                                <div class="address-info">
                                    <span>Barranquilla Atlantico</span>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <img src="website/images/icons/phone-3.png" alt="">
                                </div>
                                <div class="address-info">
                                    <span>Movil : {{ $contactInfo['address'] }}</span>
                                    <span>Telephone : {{ $contactInfo['phone'] }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <img src="website/images/icons/world.png" alt="">
                                </div>
                                <div class="address-info">
                                    <span>Email : {{ $contactInfo['email'] }}</span>
                                    <span>Web :<a href="#" target="_blank"> www.inversionesyproyectos.com</a></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-latest-news -->
                 <div class="col-lg-9 col-md-5 hidden-sm col-xs-12">
                            <div class="footer-widget middle">
                                <h6 class="footer-titel">ULTIMAS PROPIEDADES</h6>
                                <ul class="footer-latest-news">
                                    @foreach($latestThreeProperties as $prop)
                                    <li>
                                        <div class="latest-news-image">
                                            <a href="{{ route('/', $prop['id_property']) }}"> <img src="{{ (empty($prop['galleries'][0][0]['url']))? 'website/images/icons/4.png' : $prop['galleries'][0][0]['url'] }}"
                                            alt="" />
                                        </div>
                                        <div class="latest-news-info">
                                            <h6><a href="single-blog.html">{{ $prop['title'] }}</a></h6>
                                            <p> {{ $prop['observations'] }} </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                <!-- footer-contact -->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyright text-center">
                        <p>Copyright &copy; 2018 <a href="#"><b>consultortecno</b></a>. Todos los Derechos Reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>