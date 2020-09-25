@extends('template.master')
@section('breadcumbs')
    <h1>
        Buku
    </h1>
    <ol class="breadcrumb">
        <li class="active">Buku</li>
    </ol>
@endsection
@section('content')  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Buku</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tabel-buku" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>judul</th>
                    <th>penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Buku Tersedia</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
      
@include('buku._modal')
@endsection
@push('css')
     <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  
@endpush
@push('script')
  <script src="{{ asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script>
        $(function () {
           //Initialize Select2 Elements
          
          $('#tabel-buku').DataTable({
              ajax:{
                  url:'{{ route('buku.list') }}',
                  dataSrc:''
              },
              columns:[
                  {data:'id'},
                  {data:'judul'},
                  {data:'penulis'},
                  {data:'penerbit'},
                  {data:'tahun_terbit'},
                  {data:'jumlah_eksemplar'},
              ]
          })
        })
    </script>
@endpush