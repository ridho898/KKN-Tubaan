<div class="modal fade" tabindex="-1" role="dialog" id="modal-form">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="{{ url('siswa') }}" method="post" id="form-add-siswa" enctype="multipart/form-data">
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
                            <img id="preview-img" src="{{ asset('images/ava.png') }}" alt="foto" width="200px" height="200px">
                            <input type="file" class="form-control" id="avatar" name="avatar" style="margin-top:5px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nis" id="nis" placeholder="NIS.." required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama.." required>
                    </div>
                    <div class="form-group">
                        <label for="notelp">Nomor Telepon<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Nomor Telepone..." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password..." >
                        </div>
                    <div class="form-group">
                        <label for="kelas">Kelas<span class="text-danger">*</span></label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat..."></textarea>                    
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