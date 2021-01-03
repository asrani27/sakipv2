@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-sitemap'></i>
        <span>RPJMD</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-lg-2">
      <div class="box">
        <div class="box-content">
          <form method="POST" action="/sipd/rpjmd/get">
              @csrf
              <div class="form-group">
                  <select name="periode_id" class="form-control">
                      <option value="20162021">2016-2021</option>
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
                  <a href="/sipd/rpjmd/tampilkan/{{$periode}}" target="_blank" class="btn btn-sm btn-block btn-warning"><b>Tampilkan</b></a>
                
                  
                  <a href="/sipd/rpjmd/simpan/{{$periode}}" class="btn btn-sm btn-block btn-primary">SIMPAN KE DB</a>
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
                  Data RPJMD Hasil Dari Tarikan SIPD.go.id
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
                              <th>Periode</th>
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
                                  <td>{{$item->periode}}</td>
                                  <td>
                                      <a href="/sipd/rpjmd-db/tampilkan/{{$item->periode}}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Lihat Data</a></td>
                                  <td>
                                      
                                      <a href="/sipd/rpjmd/tampilkan/{{$item->periode}}" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Tarik Ulang</a>
                                      
                                      <a href="/sipd/rpjmd/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
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