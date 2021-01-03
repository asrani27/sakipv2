
{{-- Tambah Unit Kerja --}}
<div class="modal fade" id="modal-default-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <form method="POST" action="/admin_skpd/unit-kerja/delete">
            @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-8 col-form-label">Yakin ingin menghapus Unit Kerja ini ?</label>
            <div class="col-sm-1">
            <input type="hidden" class="form-control" name="unit_kerja_id" id="idunitkerja_delete" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>