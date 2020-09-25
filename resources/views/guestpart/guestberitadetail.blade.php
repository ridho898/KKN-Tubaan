<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Kampung Tubaan</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/guest/images/logo.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/guest/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/guest/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/guest/style.css">
    <!-- Colors CSS -->
    
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/guest/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/guest/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/guest/css/custom.css">

    <!--[if lt IE 9]>
      <script src="guest/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="guest/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="politics_version">

    <!-- LOADER -->
    <div id="preloader">
        <div id="main-ld">
            <div id="loader"></div>            
        </div>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div class="topbar text-center hidden-xs">        
        <p>This site uses cookies. By continuing to browse Tubaan Web, you are agreeing to use our site cookies. <a href="guest/#">Find out more here ></a></p>
    </div>

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">                    
                    <a class="navbar-brand" href="/"><img src="/guest/images/logos/logo.png" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>
                        <li><a data-scroll-nav="1" href="guest/#about">Profil Desa</a></li>
                        <li><a data-scroll-nav="2" href="guest/#issues">Berita</a></li>
                        <li><a data-scroll-nav="3" href="guest/#event">Kegiatan</a></li>
                        <li><a data-scroll-nav="4" href="guest/#gallery">Gallery</a></li>
                        <li><a data-scroll-nav="7" href="guest/#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @foreach ($detailberita as $row)
    <div id="issues" data-scroll-index="2" class="section lb">        
        <div class="container">
            <p><u><a href="/">home</a></u> >> <u><a href="/beritaIndex">berita</a></u> >> <u><a href="#">detail</a></u></p>
            <div class="section-title text-left">                
                <h3>{{$row->judul}}</h3>
                <p>Created At {{$row->updated_at}}</p>
                <hr style="border-color:red;">
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-10">
                    <div class="issuse-wrap2 clearfix">
                        <img src="{{ asset('storage/'.$row->img) }}" align="" class="center" style="width:900px;height:472px;" alt="" class="img-responsive img-rounded">  
                        <p></p>     
                        <div style="color:black;">
                        <p>{{ $row->deskripsi }} </p>                                                
                        </div>                                  
                        <p><br>posted by : {{$row->nama}}</p>
                    </div><!-- end issue -->
        </div><!-- end col -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    @endforeach

    <div id="event" data-scroll-index="2" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Berita-berita Lainnya</h3>                
            </div><!-- end title -->

            <div class="row">

                @foreach ($berita as $row)  
                <div class="col-md-4">
                    <div class="participate-wrap">                        
                        <figure>
                            <img src="{{ asset('storage/'.$row->img) }}" style="width:333px;height:168px;" alt="" class="img-responsive">
                            <figcaption><a href="{{url("berita/detail/". $row->id) }}" class="global-radius"> <i class="flaticon-unlink"></i> </a></figcaption>
                        </figure>
                        <div class="event_dit">
                            <h4><a href="{{url("berita/detail/". $row->id) }}">{{ str_limit($row->judul,40) }}</a></h4>                          
                            <p>{{ str_limit($row->deskripsi,200) }}</p>
                            
                        </div>
                    </div><!-- end participate -->
                </div><!-- end col -->
                @endforeach  

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->     

    <div id="donate" data-scroll-index="7" class="section db">
        <div class="container">
            <div class="section-title text-center">
                <h3>Contact</h3>
                <p class="lead">Hubungi Kami Pada kontak di bawah</p>                
                        <a href="guest/#">Facebook</a>
                        <a href="guest/#">Twitter</a>
                        <a href="guest/#">Instagram</a>
                        <a href="guest/#">Youtube</a>
                        <a href="guest/#">No.Hp: +628953396732172</a>
            </div><!-- end title -->

        </div><!-- end container -->
    </div><!-- end section -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                    
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="guest/#">Elpolitic</a> Design By : 
                    <a href="guest/https://html.design/">html design</a></p>
                </div>

                <div class="footer-right">
                    <form method="get" action="#">
                        <input placeholder="Subscribe our newsletter.." name="search">
                        <i class="fa fa-envelope-o"></i>
                    </form>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="guest/#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="/guest/js/all.js"></script>
    <!-- Camera Slider -->
    <script src="/guest/js/jquery.mobile.customized.min.js"></script>
    <script src="/guest/js/jquery.easing.1.3.js"></script> 
    <script src="/guest/js/camera.min.js"></script>
    <script src="/guest/js/scrollIt.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/guest/js/custom.js"></script>
    <script src="/guest/js/jquery.vide.js"></script>

</body>
</html>