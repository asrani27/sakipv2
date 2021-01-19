@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-sitemap'></i>
        <span>RKPD</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-lg-2">
      <div class="box">
        <div class="box-content">
          <form method="POST" action="/sipd/rkpd/get">
              @csrf
              <div class="form-group">
                  <select name="tahun" class="form-control">
                    @foreach (tahun() as $item)
                      <option value="{{$item->tahun}}" {{ old('tahun') == $item->tahun ? "selected" : "" }}>{{$item->tahun}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-block btn-success">TARIK DATA</button>
              </div>
          </form>
        </div>
      </div>
    </div>  
    <div class="col-lg-10">
      <div class="box">
          <div class="box-content">
            <code>
                @if (count($resp) == 0)
                    
                @else
                <h4>Data Ditemukan,</h4>
                @foreach ($resp as $item)
                <a href="/sipd/rkpd/tampilkan/{{$tahun}}/{{$item->kode_skpd}}" target="_blank" class="btn btn-sm btn-block btn-warning"><b>Lihat Data {{$item->nama}}</b></a>
                @endforeach
              
                <a href="/sipd/rkpd/simpan/{{$tahun}}" class="btn btn-sm btn-block btn-primary">SIMPAN KE DB</a>
                @endif
            </code>
          </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  Data RKPD FINAL Hasil Dari Tarikan SIPD.go.id
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="box-content box-no-padding">
                <div class="responsive-table">
                    <div class="scrollable-area">
                        <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;">
                            <thead>
                            <tr class="blue-background" style="color: white">
                              <th>No</th>
                              <th>Tahun</th>
                              <th>Unit Kerja</th>
                              <th>ISI</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            @php
                              $no =1;
                            @endphp
                            <tbody>
                              @foreach ($data as $item)        
                              <tr>
                                  <td>{{$no++}}</td>
                                  <td>{{$item->tahun}}</td>
                                  <td>{{$item->skpd->nama}}</td>
                                  <td>
                                      <a href="/sipd/rkpd-db/tampilkan/{{$item->tahun}}/{{$item->kode_skpd}}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Lihat Data</a></td>
                                  <td>
                                      
                                      <a href="/sipd/rkpd/tampilkan/{{$item->tahun}}" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Tarik Ulang</a>
                                      
                                      <a href="/sipd/rkpd/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
</div>

@endsection

@push('js')

@endpush
