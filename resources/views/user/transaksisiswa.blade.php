@extends('template.master')
@section('breadcumbs')
    <h1>
        Transakasi
    </h1>
    <ol class="breadcrumb">
        <li class="active">Transaksi Siswa</li>
    </ol>
@endsection
@section('content')  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Peminjam Buku</h3>
                <div class="box-tools pull-right">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tabel-transaksisiswa" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>judul</th>
                    <th>jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Batas Pengembalian</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($transaksisiswa as $transaksi)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->buku->judul }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->tgl_pinjam->isoFormat('dddd D MMM Y') }}</td>
                        <td>{{ $transaksi->tgl_kembali->isoFormat('dddd D MMM Y').' (' .$now->diffInDays($transaksi->tgl_kembali).' Hari)' }}</td>
                        </tr>
                      @endforeach
                  </tbody>
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
@endsection
@push('css')
     <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endpush
@push('script')
  <script src="{{ asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
   <script>
       $(function(){
           $('#tabel-transaksisiswa').DataTable()
       })
   </script>
@endpush