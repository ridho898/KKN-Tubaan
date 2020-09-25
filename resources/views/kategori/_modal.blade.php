<div class="modal fade" tabindex="-1" role="dialog" id="modal-form">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="{{ url('kategori') }}" method="post" id="form-add">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="title">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Kriteria <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kriteria..." required>
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