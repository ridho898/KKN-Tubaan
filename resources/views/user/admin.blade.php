@extends('template.master')
@section('breadcumbs')
    <h1>
        Admin
    </h1>
    <ol class="breadcrumb">
        <li class="active">Admin</li>
    </ol>
@endsection
@section('content')  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Admin</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tabel-admin" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Avatar</th>
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
      @include('user._adminmodal')
@endsection
@push('css')
     <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endpush
@push('script')
  <script src="{{ asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!-- Select2 -->
<script src="{{ asset('template/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('#tabel-admin').DataTable({
            ajax:{
                url:'{{ route('admin.list') }}',
                dataSrc:''
            },
            columns:[
                {data:'id'},
                {data:'nip'},
                {data:'nama'},
                {data:'avatar',orderable:false,searchable:false},
                {data:'action',orderable:false,searchable:false}
            ]
        })

        const targetUrl = '{{ url("admin") }}';
        $('#btn-add').click(function () {
            $('#title').html('Tambah Data')
            $('#nama').val('')
            $('#nip').val('')
            $('#notelp').val('')
            $('#email').val('')
            $('#password').val('')
            $('#alamat').val('')
            $('#avatar').val('')
            $('#preview-img').attr('src', '/images/ava.png');
            $('#form-add-admin').attr('action', targetUrl);
            $('input[name="_method"]').prop('disabled', true);
            $('#modal-form').modal()
        })

        $('#avatar').on('change', function() {
            readURL(this);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#form-add-admin").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: new FormData($("#form-add-admin")[0]),
                dataType:'JSON',
                contentType:false,
                processData:false,
                success: function(res) {
                    //sembunyikan modal
                    $('#modal-form').modal('hide');
                    
                    // tampilkan pesan dari response message
                    swal("Sukses", res.message, "success");
                    $('#tabel-admin').DataTable().ajax.reload();
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
    })
</script>
<script>
    $('body').on('click','.btn-edit',function(){
        const targetUrl = '{{ url("admin") }}';
        var id = $(this).attr('id')
        $('#title').html('Ubah Data')
        $('#nama').val('')
        $('#nip').val('')
        $('#notelp').val('')
        $('#email').val('')
        $('#password').val('')
        $('#alamat').val('')
        $('#avatar').val('')          
        $('#form-add-admin').attr('action', targetUrl+'/'+id);
        $('input[name="_method"]').prop('disabled', false);
        $('#modal-form').modal('show')
        $.ajax({
            url:'/admin/'+id+'/edit',
            type:'GET',
            dataType:'JSON',
            success:function(data){
                $('#nama').val(data.nama)
                $('#nip').val(data.nip)
                $('#notelp').val(data.notelp)
                $('#email').val(data.email)
                $('#alamat').val(data.alamat)  
                $('#preview-img').attr('src','/storage/'+ data.picture);        
            }
        });
    });
</script>
<script>
        $('body').on('click','.btn-delete',function(){
            var url = '{{ url("admin") }}'
            var id = $(this).attr('id')
            swal({
                title: "Apakah Kamu Yakin?",
                text: "data Admin akan dihapus secara permanen",
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
                          $('#tabel-admin').DataTable().ajax.reload();
                            swal("Poof! Data Admin Berhasil dihapus", {
                                icon: "success",
                            });

                        }
                    });
                }
            });
        })
    </script>
@endpush