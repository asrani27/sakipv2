
{{-- Tambah Unit Kerja --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Unit Kerja</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/data/unit-kerja/add">
            @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Pilih SKPD</label>
            <div class="col-sm-7">
              <select name="skpd_id" class="form-control">
                <option value=''>-Pilih-</option>
                @foreach ($skpd as $item)
                  <option value='{{$item->id}}'>{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Unit Kerja</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="nama" placeholder="Dinas" required>
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

{{-- Tambah Sub Jabatan --}}
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Sub Unit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/data/unit-kerja/add/sub">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Sub Unit</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="nama" placeholder="Sekretaris" required>
                <input type="hidden" class="form-control" name="unit_kerja_id" id="idunitkerja" readonly>
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