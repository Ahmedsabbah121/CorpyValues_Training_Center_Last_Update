<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Digital Marketing Agencies, SEO companies & Social Media specialists HTML5 Template" />
<meta name="keywords" content="marketing,seo,ppc,mapping,linkbuilding,analytics,ads" />
<meta name="author" content="ThemeMascot" />

<!-- ajax call -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Page Title -->

<title>Corpy Education</title>

<!-- Favicon and Touch Icons -->
<link href="{{ asset ('frontend/images/favicon.png') }}" rel="shortcut icon" type="image/png">
<link href="{{ asset ('frontend/images/apple-touch-icon.png') }}" rel="icon">
<link href="{{ asset ('frontend/images/apple-touch-icon-72x72.png') }}" rel="icon" sizes="72x72">
<link href="{{ asset ('frontend/images/apple-touch-icon-114x114.png') }}" rel="icon" sizes="114x114">
<link href="{{ asset ('frontend/images/apple-touch-icon-144x144.png') }}" rel="icon" sizes="144x144">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js">

<!-- Stylesheet -->
<link href="{{ asset('frontend/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/css/jquery-ui.min.css') }} " rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/css/css-plugin-collections.css') }} " rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="{{ asset('frontend/css/menuzord-megamenu.css') }} " rel="stylesheet"/>
<link id="menuzord-menu-skins" href="{{ asset('frontend/css/menuzord-skins/menuzord-boxed.css') }} " rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ asset('frontend/css/style-main.css') }} " rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ asset('frontend/css/preloader.css') }} " rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ asset('frontend/css/custom-bootstrap-margin-padding.css') }} " rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{ asset('frontend/css/responsive.css') }} " rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="{{ asset('frontend/css/colors/theme-skin-color-set1.css') }} " rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
<link  href="{{ asset('frontend/js/revolution-slider/css/settings.css') }} " rel="stylesheet" type="text/css"/>
<link  href="{{ asset('frontend/js/revolution-slider/css/layers.css') }} " rel="stylesheet" type="text/css"/>
<link  href="{{ asset('frontend/js/revolution-slider/css/navigation.css') }} " rel="stylesheet" type="text/css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>

<style type="text/css">

    .pull-right {
        float: right!important;
        margin-top: 10px;
    }


    #ex4 .p1[data-count]:after{
      position: absolute;
      right: 10%;
      top: 1%;
      content: attr(data-count);
      font-size: 50%;
      padding: 0.2em;
      border-radius: 50%;
      line-height: 1em;
      color: white;
      background: rgba(255,0,0,.85);
      text-align: center;
      min-width: 1em;

    }

    .fa-stack
    {
      margin-top: -10px;
    }

    [id='toggle-heart'] {
      position: absolute;
      left: -100vw;
    }

    [for='toggle-heart'] {
      color: #aab8c2;
      font-size: 1em;
      cursor: pointer;
      align-self: center;
      margin-left: 15px;
    }

    [id='toggle-heart']:checked + label {
      color: #e2264d;

    }



</style>



<!-- external javascripts -->
<script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }} "></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }} "></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }} "></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('frontend/js/jquery-plugin-collection.js') }} "></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ asset('frontend/js/revolution-slider/js/jquery.themepunch.tools.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }} "></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="wrapper">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <div class="preloader-dot-loading">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>

  <!-- Header -->
  <header id="header" class="header modern-header modern-header-white">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="widget text-white">
              <ul class="list-inline xs-text-center text-white">
                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i> 376 000 99</a> </li>
                <li class="m-0 pl-10 pr-10">
                  <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i> info@corpy.net</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-0">
            <div class="widget">
              <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">


            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">

              @guest
              <li class="m-0 pl-10"> <a href="{{ route('login') }}" class="text-white"><i class="fa fa-user-o mr-5 text-white"></i> Login /</a> </li>

              <li class="m-0 pl-0 pr-10">
                <a href="{{ url('/register_page') }}" class="text-white"><i class="fa fa-edit mr-5"></i>Register</a>
              </li>
              @else
                  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"  style="color:#ffffff" aria-expanded="false" v-pre  >
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  @if(Auth::user()->type =='trainee')
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                      {{ __('My Profile') }}
                                    </a>
                                    <br>
                                  @else
                                  <a class="dropdown-item" href="{{ url('/center_profile') }}">
                                    {{ __('My Profile') }}
                                  </a>
                                  <br>
                                  
                                  @endif
                                   

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                  </li>
              @endguest

            </ul>


          </div>
        </div>
      </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center pb-30">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="{{ url('/') }}"><img src="{{ asset ('frontend/images/logo.png') }}" alt=""></a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="header-widget-contact-info-box sm-text-center">
              <div class="media element contact-info small-icon">
                <div class="media-body">
                  <a href="#" class="title"><i class="fa fa-envelope font-icon text-theme-colored3 sm-display-block"></i> Mail Us Today</a>
                  <h5 class="media-heading subtitle">info@corpy.net</h5>
                </div>
              </div>
              <div class="media element contact-info small-icon">
                <div class="media-body">
                  <a href="#" class="title"><i class="fa fa-phone-square font-icon text-theme-colored3 sm-display-block"></i> Call us for more details</a>
                  <h5 class="media-heading subtitle">+(02)376 000 99</h5>
                </div>
              </div>
              <div class="media element contact-info small-icon">
                <div class="media-body">
                  <a href="#" class="title"><i class="fa fa-building-o font-icon text-theme-colored3 sm-display-block"></i> Company Location</a>
                  <h5 class="media-heading subtitle">6 El Tahrir Street, El Dokki CAIRO, EGYPT</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="container">
          <nav id="menuzord" class="menuzord orange">

            <ul class="menuzord-menu">

              <li class="active"><a href="{{url('/')}}">Home</a>

              </li>


              <li><a href="#">Categories</a>
                <ul class="dropdown">
                  <!--li><a href="#">Layout Variations</a>
                    <ul class="dropdown">
                      <li><a href="#">Boxed Layout</a>
                        <ul class="dropdown">
                          <li><a href="features-index-boxed-layout1.html">Layout 1</a></li>
                          <li><a href="features-index-boxed-layout2.html">Layout 2</a></li>
                          <li><a href="features-index-boxed-layout3.html">Layout 3</a></li>
                          <li><a href="features-index-boxed-layout4.html">Layout 4</a></li>
                          <li><a href="features-index-boxed-layout5.html">Layout 5</a></li>
                        </ul>
                      </li>
                      <li><a href="#">RTL Layout</a>
                        <ul class="dropdown">
                          <li><a href="features-index-rtl-layout1.html">Layout 1</a></li>
                          <li><a href="features-index-rtl-layout2-boxed.html">Layout 2 - Boxed</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li-->
                  <?php
                    $publish_majors = DB::table('majors')
                            ->where('publication_status' , 1)
                            ->get();
                  ?>
                  <!-- products by categories -->
                  @foreach($publish_majors as $v_major)
                    <li><a href="#">{{$v_major->major_name}}</a>
                      <ul class="dropdown">
                        <?php
                            $courses_by_major = DB::table('courses')
                                            ->join('majors','courses.major_id' ,'=' ,'majors.major_id')
                                            ->select('courses.*' , 'majors.major_name')
                                            ->where('majors.major_id', $v_major->major_id)
                                            ->where('courses.publication_status' , 1)
                                            ->get();
                        ?>
                        @foreach($courses_by_major as $v_course)
                            <li><a href="{{url('/course_details/'.$v_course->course_id)}}">{{$v_course->course_name}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li><a href="#">Training Academies</a>
                <ul class="dropdown">
               
                
                @foreach($all_centers as $center)
                <li><a href="#">{{ ucfirst($center->name) }}</a>
                  <ul class="dropdown">
                    <li><a href="{{ route('view_center',['slug'=>$center->name.'-'.$center->id]) }}">About {{ ucfirst($center->name) }}</a></li>
                    <li><a href="page-about2.html">{{ ucfirst($center->name) }} Courses</a></li>
                  </ul>
                </li>
                @endforeach
                
              </ul>
            </li>
              

            </ul>

            <!-- Card Notification -->
            <?php
                  $all_item = DB::table('cards')->where('customer_id' , Auth::id())->get();
                  $num_card = count($all_item);


                  $all_wishs = DB::table('wishlists')->where('customer_id' , Auth::id())->get();

                  $num_wish = count($all_wishs);
            ?>

            @if(Auth::check())
            <div id="ex4" class="pull-right">

                  <span class="p1 fa-stack fa-2x has-badge" data-count="{{ $num_wish }}">
                      <a href="{{ url('/wishlist_content') }}">
                        <label for="toggle-heart">❤</label>
                      </a>
                  </span>



                   <span class="p1 fa-stack fa-2x has-badge" data-count="{{$num_card}}">
                    <a href="{{ url('/card_content') }}"><i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="4b"></i></a>
                  </span>
              <!--   <div class="dropdown">

                  <span class="p1 fa-stack fa-2x has-badge" data-count="{{$num_card}}">
                    <a href="{{ url('/card_content') }}"><i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="4b"></i></a>
                  </span>
                  <div class="dropdown-content">
                    <a href="#">link1</a>

                  </div>
                </div> -->
            </div>

            @else
            <div id="ex4" class="pull-right">

                <span class="p1 fa-stack fa-2x has-badge">

                  <a href="{{url('/login')}}">
                      <label for="toggle-heart">❤</label>
                  </a>
                </span>

              <span class="p1 fa-stack fa-2x has-badge">
                <a href="{{ url('/login') }}"><i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="4b"></i> </a>
              </span>

            </div>

            @endif

          </nav>
        </div>
      </div>
    </div>
  </header>


      @yield('content');



  <!-- Footer -->
  <footer id="footer" class="footer bg-black-111">
    <div class="container pt-70 pb-40">
      <div class="row border-bottom-black">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-20" alt="" src="images/logo-wide-white.png">
            <p>203, Envato Labs, Behind Alis Steet, Melbourne, Australia.</p>
            <ul class="mt-5">
              <li class="m-0 pl-0 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">376 000 99</a> </li>
              <li class="m-0 pl-0 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#">contact@yourdomain.com</a> </li>
              <li class="m-0 pl-0 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#">www.yourdomain.com</a> </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title">Useful Links</h4>
            <ul class="list-border">
              <li><a href="index-mp-layout1.html">Home</a></li>
              <li><a href="page-about1.html">About us</a></li>
              <li><a href="shortcode-sitemap.html">Sitemap</a></li>
              <li><a href="page-faq-style1.html">Faq's</a></li>
              <li><a href="page-contact1.html">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark mb-30">
            <h4 class="widget-title line-bottom">Twitter Feed</h4>
            <div class="twitter-feed list-border clearfix" data-username="Envato" data-count="2"></div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title">Opening Hours</h4>
            <div class="opening-hours">
              <ul class="list-border">
                <li class="clearfix"> <span> Mon - Tues :  </span>
                  <div class="value pull-right flip"> 6.00 am - 10.00 pm </div>
                </li>
                <li class="clearfix text-white"> <span> Wednes - Thurs :</span>
                  <div class="value pull-right flip"> 8.00 am - 6.00 pm </div>
                </li>
                <li class="clearfix"> <span> Fri : </span>
                  <div class="value pull-right flip"> 3.00 pm - 8.00 pm </div>
                </li>
                <li class="clearfix"> <span> Sun : </span>
                  <div class="value pull-right flip"> Closed </div>
                </li>
                <li class="clearfix"> <span> Sat : </span>
                  <div class="value pull-right flip"> 10.00 am - 2.00 pm </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black">
      <div class="container pt-10 pb-0">
        <div class="row">
          <div class="col-md-6 sm-text-center">
            <p class="font-13 text-black-777 m-0">Copyright &copy;2017 ThemeMascot. All Rights Reserved</p>
          </div>
          <div class="col-md-6 text-right flip sm-text-center">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-circled icon-sm">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a class="scrollToTop" href="#"><i class="flaticon-seo-transport-3"></i></a>
</div>
<!-- end wrapper -->



<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
  <script src="{{ asset('frontend/js/custom.js') }}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }} "></script>
<script src="https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script> 
{{-- <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.9.0/d3.min.js"></script> --}}
<script src="{{asset('frontend/js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }} "></script>

<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }} "></script>
<script src="{{ asset('frontend/js/revolution-slider/js/extensions/revolution.extension.video.min.js') }} "></script>
<script type="text/javascript" src="{{ asset ('backend/assets/js/pages/bootbox.min.js')}}"></script>


</body>
</html>
