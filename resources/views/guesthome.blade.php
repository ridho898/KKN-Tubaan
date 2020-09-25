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
    <link rel="shortcut icon" href="guest/images/logo.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="guest/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="guest/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="guest/style.css">
    <!-- Colors CSS -->
    
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="guest/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="guest/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="guest/css/custom.css">

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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                </button>                  
                    <a class="navbar-brand" href="/"><img src="guest/images/logos/logo.png" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a data-scroll-nav="0" href="guest/#main-banner" class="active">Home</a></li>
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
	
	<div id="main-banner" class="banner-one" data-scroll-index="0">            
		@foreach ($banner as $row)
        <div data-src="{{ asset('storage/'.$row->img) }}">
			<div class="camera_caption">
				<div class="container">
					<h1 class="wow fadeInUp animated">{{$row->toptext}}</h1>
					<p class="wow fadeInUp animated" data-wow-delay="0.2s">{{$row->lowertext}}</p>
					<a data-scroll href="{{$row->link}}" class="btn btn-light btn-radius btn-brd grd1">LINK</a>
				</div> <!-- /.container -->
			</div> <!-- /.camera_caption -->
		</div>
        @endforeach
        <div id="main-banner" class="banner-one" data-scroll-index="0">
         </div>		
        <a href=""></a>
	</div> <!-- /#theme-main-banner -->


    <div id="about" data-scroll-index="1" class="section wb">
        <div class="container">
            @foreach ($profil as $row)
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4>Profil Desa</h4>
                        <h2>{{$row->judul}}</h2>
                        <!-- <blockquote class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</blockquote> -->

                        <p>{{$row->deskripsi}}</p>

                        <a href="guest/#services" data-scroll class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset('storage/'.$row->img) }}" alt="" class="img-responsive img-rounded">
                        <a href="{{$row->link}}" target="_blank" class="playbutton"><i class="flaticon-play-button"></i></a>
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->
            @endforeach
            <hr class="hr1"> 

            <div class="row text-center">
                @foreach ($imgprofil as $row)
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="service-widget">
                        <div class="post-media_pp wow fadeIn">
                            <a href="{{ asset('storage/'.$row->img) }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                            <div>
                            <img src="{{ asset('storage/'.$row->img) }}" style="width:558px;height:372px;" alt="" class="img-responsive">
                            </div>
							<div class="hover-up">
								<h3>{{$row->judul}}</h3>
								<p>{{$row->deskripsi}}</p>
							</div>
                        </div>                    
                    </div><!-- end service -->                    
                </div>
                @endforeach

                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="issues" data-scroll-index="2" class="section lb">
        <div class="container">
            <div class="section-title text-left">
                <h3><a href="/beritaIndex">Isu dan Berita Terkini</a></h3>
                <p class="lead">Dapatkan Isu dan Berita Terkini sseputar kampung Tubaan dan kecamatan Tabalar</p>
            </div><!-- end title -->

            <div class="row">
        @foreach ($newberita as $row)
				<div class="col-md-5">
                    <div class="issuse-wrap2 clearfix">
                        <img src="{{ asset('storage/'.$row->img) }}" alt="" class="img-responsive img-rounded">
                        <h4><a href="{{url("beritaIndex/detail/". $row->id) }}">{{ str_limit($row->judul,40) }}</a></h4>

                        <p>{{ str_limit($row->deskripsi,400) }}</p>                        
                    </div><!-- end issue -->
        </div><!-- end col -->
        @endforeach        

                <div class="col-md-7">
                @foreach ($berita as $row)  
                    <div class="issuse-wrap clearfix">
                        <img src="{{ asset('storage/'.$row->img) }}" alt="" class="img-responsive img-rounded alignleft">
                        <h4><a href="{{url("beritaIndex/detail/". $row->id) }}">{{ str_limit($row->judul,40) }}</a></h4>
                        <p>{{ str_limit($row->deskripsi,250) }}</p>
                    </div><!-- end issue -->
                @endforeach                        
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="event" data-scroll-index="3" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3><a href="/kegiatanIndex">Kegiatan, Acara, dan Event-event</a></h3>                
            </div><!-- end title -->

            <div class="row">

                @foreach ($kegiatan as $row)  
                <div class="col-md-4">
                    <div class="participate-wrap">                        
						<figure>
                            <div>
							<img src="{{ asset('storage/'.$row->img) }}" style="width:333px;height:168px;" alt="" class="img-responsive">
                            </div>
							<figcaption><a href="guest/#" class="global-radius"> <i class="flaticon-unlink"></i> </a></figcaption>
						</figure>
						<div class="event_dit">
							<h4>{{$row->judul}}</h4>
							<ul>
								<li> <a href="guest/#"> <i class="fa fa-calendar"></i>{{$row->tanggal}}</a> </li>
								<li> <a href="guest/#"> <i class="fa fa-clock-o"></i>{{$row->waktu}}</a>  </li>
								<li> <a href="guest/#"> <i class="fa fa-map-marker"></i>{{$row->tempat}}</a> </li>
							</ul>
							<p>{{$row->deskripsi}}</p>
							
						</div>
                    </div><!-- end participate -->
                </div><!-- end col -->
                @endforeach  

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

	
	<div id="gallery" data-scroll-index="4" class="section lb">
		<div class="container">
			<div class="section-title text-center">
                <h3>Gallery</h3>
                <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.<br> Sed a tellus quis mi rhoncus dignissim.</p>
            </div><!-- end title -->
			
			<div class="gallery-menu row">
				<div class="col-md-12">
					<div class="button-group filter-button-group text-center">                                        
						<button class="active" data-filter="*">All</button>
                    @foreach($kategori as $row)                        
                        <button data-filter=".{{$row->nama}}">{{$row->nama}}</button>  @endforeach                           
					</div>
				</div>
			</div>                                                
            
			<div class="gallery-list row">
                @foreach($gallery as $row)                 
                @if($loop->index > 5)
                @break                
                @else         
				<div class="col-md-4 col-sm-6 gallery-grid 
                @foreach($datagallery as $row2)
                @if($row->img == $row2->img)
                {{$row2->nama}}
                @endif
                @endforeach
                ">
					<div class="gallery-single fix">
                        
						<img src="{{ asset('storage/'.$row->img) }}" style="width:360px;height:316px;" class="img-responsive" alt="Image">
                        
						<div class="img-overlay">
							<a href="{{ asset('storage/'.$row->img) }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
						</div>
					</div>
				</div>
                @endif 
                
                @endforeach
				
				
			</div>
			</div>
		</div>
	</div>	   

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
    <script src="guest/js/all.js"></script>
	<!-- Camera Slider -->
	<script src="guest/js/jquery.mobile.customized.min.js"></script>
	<script src="guest/js/jquery.easing.1.3.js"></script> 
	<script src="guest/js/camera.min.js"></script>
	<script src="guest/js/scrollIt.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="guest/js/custom.js"></script>
    <script src="guest/js/jquery.vide.js"></script>
    <script src="guest/js/ridocostum.js"></script>

</body>
</html>