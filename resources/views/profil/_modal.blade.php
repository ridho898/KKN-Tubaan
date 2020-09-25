<div class="modal fade" tabindex="-1" role="dialog" id="modal-form">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ url('profil') }}" method="post" id="form-add-profil" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-md-6 col-md-offset-4">
                        <img id="preview-img" src="{{ asset('images/profil.png') }}" alt="foto" width="200px" height="200px">
                        <input type="file" class="form-control" id="img" name="img" style="margin-top:5px">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Judul<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul..." required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Link<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="link" id="link" cols="30" rows="10" required></textarea>
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Data
                </button>
            </div>
        </form>
      </div>
    </div>
</div>