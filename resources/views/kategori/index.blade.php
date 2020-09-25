@extends('template.master')
@section('breadcumbs')
    <h1>
        Kategori
    </h1>
    <ol class="breadcrumb">
        <li class="active">Kategori</li>
    </ol>
@endsection
@section('content')  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Kriteria</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Kriteria</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="datatable-kategori" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
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
      @include('kategori._modal')
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
          $('#datatable-kategori').DataTable({
              ajax:{
                  url:'{{ route('kategori.list') }}',
                  dataSrc:''
              },
              columns:[
                  {data:'number'},
                  {data:'nama'},
                  {data:'action',orderable:false,searchable:false}
              ]
          })
        })
    </script>
    <script>
        $(document).ready(function () {
            const targetUrl = '{{ url("kategori") }}';
            $("form").on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(res) {
                        // sembunyikan modal
                        $('#modal-form').modal('hide');

                        // tampilkan pesan dari response message
                        swal("Sukses", res.message, "success");
                        $('#datatable-kategori').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        let errorText = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorText += value + '||';
                        }); 
                        swal("Gagal!", errorText, "warning");
                    }
                });
            }); 
            $('#btn-add').click(function () {
                $('#title').html('Tambah Data')
                $('#nama').val('')                
                $('#form-add').attr('action', targetUrl);
                $('input[name="_method"]').prop('disabled', true);
                $('#modal-form').modal()
            })
        })
    </script>
    <script>
        $('body').on('click','.btn-edit',function(){
            const targetUrl = '{{ url("kategori") }}';
            var id = $(this).attr('id')
            $('#title').html('Ubah Data')
            $('#nama').val(' ')            
            $('#form-add').attr('action', targetUrl+'/'+id);
            $('input[name="_method"]').prop('disabled', false);
            $('#modal-form').modal('show')
            $.ajax({
                url:'/kategori/'+id+'/edit',
                type:'GET',
                dataType:'JSON',
                success:function(data){
                    $('#nama').val(data.nama)                    
                }
            });
        });
    </script>
    <script>
        $('body').on('click','.btn-delete',function(){
            var url = '{{ url("kategori") }}'
            var id = $(this).attr('id')
            swal({
                title: "Apakah Kamu Yakin?",
                text: "data Kriteria akan dihapus secara permanen",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url:url+'/'+id,
                        type:'DELETE',
                        dataType:'JSON',
                        data:{_token:'{{ csrf_token() }}'},
                        success:function(data){
                            $('#datatable-kategori').DataTable().ajax.reload();
                            swal("Poof! Data Kategori Berhasil dihapus", {
                                icon: "success",
                            });

                        }
                    });


                    
                }
            });
        })
    </script>
@endpush