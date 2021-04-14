@php

    $name_site = setting('name_site');
    $mission = setting('mission');
    $vision = setting('vision');
    $description = setting('description');
    $copyright = setting('copyright');

    $facebook = setting('facebook_link');
    $instagram = setting('instagram_link');
    $twitter = setting('twitter_link');
    $whatsUp = setting('whatsUp_link');
    $address = setting('address_link');
    $email = setting('email_link');

@endphp



    <!DOCTYPE html>
<html lang="en">
<head>

    <title>Blood Bank System</title>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('homePage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('homePage/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('homePage/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('homePage/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('homePage/css/owl.carousel.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('homePage/css/tooplate-style.css')}}">

</head>
<body>

<!-- PRE LOADER -->
<div class="preloader">
    <div class="spinner">
        <span class="sk-inner-circle"></span>
    </div>
</div>


<!-- MENU -->
<div class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- NAVBAR HEADER -->
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <!-- lOGO -->
            <a href="{{route('welcome')}}" class="navbar-brand">نظام التبرع بالدم الالكتروني</a>
            <img src="{{asset('dashboard_files/images/logo.jpg')}}" width="50px" height="50px" alt="">
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="smoothScroll">الرئيسية</a></li>
                <li><a href="#about" class="smoothScroll">تبرع بالدم</a></li>
                <li><a href="#team" class="smoothScroll">فريق العمل</a></li>
                <li><a href="#contact" class="smoothScroll">راسلنا</a></li>
                <li><a href="{{route('login')}}" class="smoothScroll">تسجيل دخول</a></li>
                <li>
                    @if(auth()->user())
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    @endif
                </li>
            </ul>
        </div>

    </div>
</div>


<!-- HOME -->
<section id="home" class="parallax-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-12">
                <div class="home-text">
                    <h1> موقع إلكتروني للتبرع بالدم</h1>
                    <p>ساعد الآخرين وسجل بياناتك احجز موعدًا للتبرع بالدم</p>
                    <ul class="section-btn">
                        <a href="{{'register'}}" class="smoothScroll"><span data-hover="go">تسجيل حساب جديد</span></a>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Video -->
    <video controls autoplay loop muted>
        <source src="{{asset('homePage/videos/video.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>


<!-- ABOUT -->
<section id="about" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-1 col-md-10 col-sm-12">
                <div class="about-info">
                    <h2 style="color: red">مركز التبرع بالدم </h2>
                    <h1>المركز الأول للتبرع بالدم عبر تقديم طلبات أونلاين والحجز المسبق</h1>
                    <h4>سجل بياناتك عبر انشاء حساب خاص بك لدينا وابحث عن فصيلة الدم التي تحتاجها</h4>
{{--                    <h4>قم بانشاء حساب وسجل بياناتك وابحث عن فصائل الدم التي تحتاجها</h4>--}}
                </div>
            </div>

        </div>
    </div>
</section>


<!-- PROJECT -->
<section id="project" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <!-- PROJECT ITEM -->
                <div class="project-item">
                    <a href="{{asset('image/1.jpg')}}" class="image-popup">
                        <img src="{{asset('image/1.jpg')}}" class="img-responsive" alt="">

                        <div class="project-overlay">
                            <div class="project-info">
                                <h1>لماذا نتبرع بالدم</h1>
                                <h3>إضغط للتكبير</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <!-- PROJECT ITEM -->
                <div class="project-item">
                    <a href="{{asset('image/3.jpg')}}" class="image-popup">
                        <img src="{{asset('image/3.jpg')}}" class="img-responsive" alt="" >

                        <div class="project-overlay">
                            <div class="project-info">
                                <h1>شروط التبرع بالدم</h1>
                                <h3>إضغط للتكبير</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <!-- PROJECT ITEM -->
                <div class="project-item">
                    <a href="{{asset('image/4.jpg')}}" class="image-popup">
                        <img src="{{asset('image/4.jpg')}}" class="img-responsive" alt="" >

                        <div class="project-overlay">
                            <div class="project-info">
                                <h1>هدية حياة</h1>
                                <h3>إضغط للتكبير</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <!-- PROJECT ITEM -->
                <div class="project-item">
                    <a href="{{asset('image/2.jpg')}}" class="image-popup">
                        <img src="{{asset('image/2.jpg')}}" class="img-responsive" alt="">

                        <div class="project-overlay">
                            <div class="project-info">
                                <h1>تبرعك يساوي حياة</h1>
                                <h3>إضغط للتكبير</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>





        </div>
    </div>
</section>


<!-- TEAM -->
<section id="team" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title">
                    <h1>فريق العمل</h1>
                </div>
            </div>


            <div class="clearfix"></div>
                <div id="owl-team" class="owl-carousel" >
                    @foreach($teamWorks as $teamWork)
                        <div class="col-md-4 col-sm-4 item ">
                            <div class="team-item">
                                <img src="{{asset('storage/'.$teamWork->image)}}" class="img-responsive" alt="">
                                <div class="team-overlay">
                                    <ul class="social-icon">
                                        <li><a href="{{$teamWork->link_contact_1}}" class="fa fa-instagram"></a></li>
                                        <li><a href="{{$teamWork->link_contact_1}}" class="fa fa-facebook"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <p>{{$teamWork->name}}</p>
                            <h3>{{$teamWork->email}}</h3>
                        </div>
                    @endforeach



{{--                <div class="col-md-4 col-sm-4 item">--}}
{{--                    <div class="team-item">--}}
{{--                        <img src="{{asset('homePage/images/team-image2.jpg')}}" class="img-responsive" alt="">--}}
{{--                        <div class="team-overlay">--}}
{{--                            <ul class="social-icon">--}}
{{--                                <li><a href="#" class="fa fa-instagram"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-github"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-facebook"></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p>Luke Wara</p>--}}
{{--                    <h3>Speciality Focus</h3>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-4 item">--}}
{{--                    <div class="team-item">--}}
{{--                        <img src="{{asset('homePage/images/team-image3.jpg')}}" class="img-responsive" alt="">--}}
{{--                        <div class="team-overlay">--}}
{{--                            <ul class="social-icon">--}}
{{--                                <li><a href="#" class="fa fa-instagram"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-dribbble"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-behance"></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p>Mono Mana</p>--}}
{{--                    <h3>Art director</h3>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-4 item">--}}
{{--                    <div class="team-item">--}}
{{--                        <img src="{{asset('homePage/images/team-image4.jpg')}}" class="img-responsive" alt="">--}}
{{--                        <div class="team-overlay">--}}
{{--                            <ul class="social-icon">--}}
{{--                                <li><a href="#" class="fa fa-twitter"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-facebook"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-envelope-o"></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p>Phway Phyu</p>--}}
{{--                    <h3>Designer in Chief</h3>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 col-sm-4 item">--}}
{{--                    <div class="team-item">--}}
{{--                        <img src="{{asset('homePage/images/team-image1.jpg')}}" class="img-responsive" alt="">--}}
{{--                        <div class="team-overlay">--}}
{{--                            <ul class="social-icon">--}}
{{--                                <li><a href="#" class="fa fa-twitter"></a></li>--}}
{{--                                <li><a href="#" class="fa fa-linkedin"></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p>Cherry Lynn</p>--}}
{{--                    <h3>Marketing Manager</h3>--}}
{{--                </div>--}}
            </div>

        </div>
    </div>
</section>


<!-- CONTACT -->
<section id="contact" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-3 col-md-6 col-sm-12">
                <div class="section-title">
                    <h1>قم بمراسلتنا</h1>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <!-- CONTACT FORM HERE -->
                <form id="contact-form" action="{{route('storeMessage')}}" method="post" role="form">
                    @csrf
                    @method('post')
                    <!-- IF MAIL SENT SUCCESSFULLY -->
                    <h6 class="text-success">Your message has been sent successfully. </h6>

                    <!-- IF MAIL SENDING UNSUCCESSFULL -->
                    <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>

                    <div class="col-md-6 col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="الاسم">
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="الايميل">
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control"  name="phone_number" placeholder="رقم الهاتف">
                        <textarea class="form-control" rows="5"  name="messages" placeholder="الرسالة"></textarea>
                    </div>

                    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4">
                        <div class="section-btn">
                            <button type="submit" class="form-control" ><span data-hover="أرسل الرسالة">أرسل الرسالة</span></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-sm-6">
                <h2>رسالة الموقع</h2>
                <p>{{$mission}}</p>
                <h2>رؤية الموقع</h2>
                <p>{{$vision}}</p>

            </div>

            <div class="col-md-4 col-sm-6">
                <div class="footer-info">
                    <h2>أبق على اتصال</h2>
                    <p><a href="tel:010-090-0780">{{$whatsUp}}</a></p>
                    <p><a href="mailto:info@company.com">{{$email}}</a></p>
                    <p><a href="#">{{$address}}</a></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">

                <h2>وصف الموقع</h2>
                <p>{{$description}}</p>
                <ul class="social-icon">
                    <li><a href="{{$twitter}}" class="fa fa-twitter"></a></li>
                    <li><a href="{{$facebook}}" class="fa fa-facebook"></a></li>
                    <li><a href="{{$instagram}}" class="fa fa-instagram"></a></li>
                </ul>

            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <div class="copyright-text">
                    <p>{{$copyright}}</p>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="{{asset('homePage/js/jquery.js')}}"></script>
<script src="{{asset('homePage/js/bootstrap.min.js')}}"></script>
<script src="{{asset('homePage/js/jquery.parallax.js')}}"></script>
<script src="{{asset('homePage/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('homePage/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('homePage/js/magnific-popup-options.js')}}"></script>
<script src="{{asset('homePage/js/modernizr.custom.js')}}"></script>
<script src="{{asset('homePage/js/smoothscroll.js')}}"></script>
<script src="{{asset('homePage/js/custom.js')}}"></script>

</body>
</html>
