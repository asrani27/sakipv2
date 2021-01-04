@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Kinerja Triwulan</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        
        <div class="box-header">
          <div class="title">
            @if (Auth::user()->pegawai->unitkerja->atasan == null)
            <a href="/pegawai/rencana-aksi/add" class="btn btn-primary btn-sm"> 
              <i class='fa fa-plus'></i>Tambah Rencana Aksi</a> 
            @endif
          </div>
        </div>
        <div class="box-content">
          <form method="get" action="#">
              @csrf
              <div class="form-group">
                  <select name="tahun_id" class="form-control">
                      <option value="">-TAHUN-</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                  </select>
              </div>
              <div class="form-group">
                  <select name="tahun_id" class="form-control">
                      <option value="">-TRIWULAN-</option>
                      <option value="tw1">TRIWULAN 1</option>
                      <option value="tw1">TRIWULAN 2</option>
                      <option value="tw1">TRIWULAN 3</option>
                      <option value="tw1">TRIWULAN 4</option>
                  </select>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-block btn-success">PRINT</button>
              </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
              {{-- {{$data->links()}} --}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush
