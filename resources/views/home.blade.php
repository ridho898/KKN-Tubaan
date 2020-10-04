@extends('template.master')
@section('breadcumbs')
    <h1>
        Dashboard
        <small>Control panel</small>        
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
    </ol>
@endsection
@section('content')
     <!-- Small boxes (Stat box) -->
     <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Selamat Datang  {{ Auth::user()->admin->nama ?? 'Guest' }}</h3>              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="row text-center text-middle">
                  <div class="col-md-6" style="padding-top:75px">
                    <h1>Sistem Informasi Kampung Tubaan</h1>
                    <blockquote>
                      <p>The more that you read, the more things you will know</p>
                      <small>Dr Seuss</small>
                    </blockquote>
                  </div>
                  <div class="col-md-6">
                    <img src="{{ asset('images/banner.jpeg') }}" width="400px" alt="">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      
         <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $jmladmin }}</h3>
    
                  <p>Admin</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.index') }}" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{ $jmlberita }}</h3>
    
                  <p>Berita</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-book"></i>
                </div>
                <a href="{{ route('berita.index') }}" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $jmlkegiatan }}</h3>
    
                  <p>Kegiatan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bookmark"></i>
                </div>
                <a href="{{ route('kegiatan.index') }}" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $jmlgallery }}</h3>
                  <p>Gallery</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-bookmarks"></i>
                </div>
                <a href="{{ route('gallery.index') }}" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
     
    <!-- /.row -->     
         
     
    <!-- /.row -->
        </section>
@endsection