

<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Unit Kerja</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/data/unit-kerja/edit">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Unit Kerja</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="nama" id="edit_nama_jabatan" required>
                <input type="hidden" class="form-control" name="unit_kerja_id" id="idunitkerjaedit" readonly>
                </div>
              </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
