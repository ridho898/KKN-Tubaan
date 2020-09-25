@extends('template.master')
@section('breadcumbs')
    <h1>
        banner
    </h1>
    <ol class="breadcrumb">
        <li class="active">banner</li>
    </ol>
@endsection
@section('content')  
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data banner</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> Tambah banner</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tabel-banner" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>toptext</th>
                    <th>lowertext</th>                    
                    <th>Link</th>
                    <th>Img</th>                    
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
      @include('banner._modal')
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
        $('#tabel-banner').DataTable({
            ajax:{
                url:'{{ route('banner.list') }}',
                dataSrc:''
            },
            columns:[
                {data:'id'},
                {data:'toptext'},
                {data:'lowertext'},                
                {data:'link'},
                {data:'img',orderable:false,searchable:false},                
                {data:'action',orderable:false,searchable:false}
            ]
        })

        const targetUrl = '{{ url("banner") }}';
        $('#btn-add').click(function () {
            $('#title').html('Tambah Data')
            $('#toptext').val('')
            $('#lowertext').val('')            
            $('#link').val('')
            $('#img').val('')            
            $('#preview-img').attr('src', '/images/banner.png');
            $('#form-add-banner').attr('action', targetUrl);
            $('input[name="_method"]').prop('disabled', true);
            $('#modal-form').modal()
        })

        $('#img').on('change', function() {
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

        $("#form-add-banner").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: new FormData($("#form-add-banner")[0]),
                dataType:'JSON',
                contentType:false,
                processData:false,
                success: function(res) {
                    //sembunyikan modal
                    $('#modal-form').modal('hide');
                    
                    // tampilkan pesan dari response message
                    swal("Sukses", res.message, "success");
                    $('#tabel-banner').DataTable().ajax.reload();
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
        const targetUrl = '{{ url("banner") }}';
        var id = $(this).attr('id')
        console.log(id);
        
        $('#title').html('Ubah Data')
        $('#toptext').val('')
        $('#lowertext').val('')
        $('#link').val('')    
        $('#img').val('')                        
        $('#form-add-banner').attr('action', targetUrl+'/'+id);
        $('input[name="_method"]').prop('disabled', false);
        $('#modal-form').modal('show')
        $.ajax({
            url:'/banner/'+id+'/edit',
            type:'GET',
            dataType:'JSON',
            success:function(data){
                $('#toptext').val(data.toptext)
                $('#lowertext').val(data.lowertext)                
                $('#link').val(data.link)                
                $('#preview-img').attr('src','/storage/'+ data.picture);        
            }
        });
    });
</script>
<script>
        $('body').on('click','.btn-delete',function(){
            var url = '{{ url("banner") }}'
            var id = $(this).attr('id')
            swal({
                title: "Apakah Kamu Yakin?",
                text: "data banner akan dihapus secara permanen",
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
                          $('#tabel-banner').DataTable().ajax.reload();
                            swal("Poof! Data banner Berhasil dihapus", {
                                icon: "success",
                            });

                        }
                    });
                }
            });
        })
    </script>
@endpush