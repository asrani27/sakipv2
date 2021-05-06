@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Aktivitas</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        <div class="alert alert-success alert-dismissable">
          <h4>
              <i class="fa fa-user"></i>
              Biodata
          </h4>
          <table>
            <tr>
              <td>NIP</td>
              <td>: {{biodata()['nip']}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>: {{biodata()['nama']}}</td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>: {{biodata()['jabatan']}}</td>
            </tr>
            <tr>
              <td>SKPD</td>
              <td>: {{biodata()['skpd']}}</td>
            </tr>
          </table>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="title">
              <a href="/pegawai/aktivitas/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah</a> 
            </div>
          </div>
          <form method="get" action="/pegawai/aktivitas/tampilkan">
            
          <div class="col-sm-3">
              <select name="tahun_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach ($tahun as $item)
                    <option value="{{$item->id}}" {{old('tahun_id') == $item->id ? 'selected':''}}>Tahun: {{$item->tahun}}, Periode: {{$item->periode->mulai}}/{{$item->periode->sampai}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-sm-5">
            <button type="submit" name="button" value="1" class="btn btn-warning"><i class="fa fa-eye"></i> Tampilkan</button>
            <button type="submit" name="button" formtarget="_blank"  value="2" class="btn btn-success"><i class="fa fa-file"></i> Rencana Aksi</button>
          </div>
          
          </form>
          <div class="col-sm-3">
              <form method="GET" action="/pegawai/aktivitas/search">
                <input class="form-control" name="search" placeholder="Search" type="text">
              </form>
          </div>
        </div>
        <div class="box-content box-no-padding">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped responsive-table" style="margin-bottom:0;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          <th rowspan="2" class="text-center" style="vertical-align:middle">NO</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">PERIODE</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">TAHUN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KEGIATAN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">AKTIVITAS</th>
                          <th colspan="4" class="text-center" style="vertical-align:middle">TARGET KEUANGAN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle"></th>
                        </tr>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <th>TW.I</th>
                            <th>TW.II</th>
                            <th>TW.III</th>
                            <th>TW.IV</th>
                        </tr>
                        </thead>
                        @php
                          $no =1;
                        @endphp
                        <tbody>
                          
                          @foreach ($data as $item)        
                          <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                              <td>{{$no++}}</td>
                              <td>{{$item->tahun->periode->mulai}}/{{$item->tahun->periode->sampai}}</td>
                              <td>{{$item->tahun->tahun}}</td>
                              <td>{{$item->kegiatan->nama}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->tk1}}</td>
                              <td>{{$item->tk2}}</td>
                              <td>{{$item->tk3}}</td>
                              <td>{{$item->tk4}}</td>
                              <td>
                                <a href="/pegawai/aktivitas/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <a href="/pegawai/aktivitas/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i> Hapus</a>  
                                </td>                            
                              
                          </tr>
                          
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
        {{$data->links()}}
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
