@extends('admin.flatty')
@push('css')

@endpush

@section('content')
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
      <i class='fa fa-user'></i>
      <span>Kinerja Triwulan {{Str::limit($jabatan->nama, 40, '...')}}</span>
    </h1>
    <div class="pull-right">
      <div class="btn-group">
        <a class="btn btn-white" href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}"><i class="fa fa-arrow-left"></i>
          Kembali</a>
        <a class="btn btn-white" href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$kinerja_id}}/add"><i
            class="fa fa-plus"></i> Kinerja</a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-success alert-dismissable">
        <h4>
          <i class="fa fa-user"></i>
          {{$jabatan->nama}}
        </h4>
        <table>
          <tr>
            <th>TAHUN</th>
            <th>: {{$tahun->tahun}}</th>
          </tr>
          <tr>
            <th>TRIWULAN</th>
            <th>: {{$tahun->triwulan}}</th>
          </tr>
        </table>
      </div>
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        <div class="box-content box-no-padding">
          <div class="responsive-table">
            <div class="scrollable-area">
              <table class="table table-bordered table-hover" style="margin-bottom:0;">
                <thead>
                  <tr class="blue-background" style="color: white; font-family:Arial, Helvetica, sans-serif">
                    <th>No</th>
                    <th>Kinerja</th>
                    <th>Indikator & Capaian</th>
                  </tr>
                </thead>
                @php
                $no =1;
                @endphp
                <tbody>
                  @foreach ($kinerja as $item)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->isi}} <br />
                      <a href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$item->id}}/edit"><i
                          class="fa fa-edit"></i></a> | <a
                        href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$item->id}}/delete"
                        onclick="return confirm('Menghapus Kinerja, Akan menghapus indikator dan capaian terkait, YAKIN?');"><i
                          class="fa fa-trash"></i></a>
                    </td>
                    <td>
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr style="font-size: 11px; color:white" class="blue-background">
                            <th style=" padding: 6px;">Indikator</th>
                            <th style="padding: 6px;">Satuan</th>
                            <th style="padding: 6px;">Target</th>
                            <th style="padding: 6px;">TW.I</th>
                            <th style="padding: 6px;">TW.II</th>
                            <th style="padding: 6px;">TW.III</th>
                            <th style="padding: 6px;">TW.IV</th>
                            <th style="padding: 6px;">Realisasi</th>
                            <th style="padding: 6px;">Capaian %</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($item->indikator as $ind)
                          <tr>
                            <td>{{$ind->indikator}}</td>
                            <td>{{$ind->satuan}}</td>
                            <td>{{$ind->target}}</td>
                            <td>{{$ind->tw1}}</td>
                            <td>{{$ind->tw2}}</td>
                            <td>{{$ind->tw3}}</td>
                            <td>{{$ind->tw4}}</td>
                            <td>{{$ind->realisasi}}</td>
                            <td>{{$ind->capaian}}</td>
                            <td>
                              <a href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/indikator/{{$ind->id}}/edit"><i
                                  class="fa fa-edit"></i></a> | <a
                                href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/indikator/{{$ind->id}}/delete"
                                onclick="return confirm('Yakin ingin menghapus data ini?');"><i
                                  class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <a href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$item->id}}/indikator/add"
                        class="btn btn-xs btn-primary"><i class="fa fa-plus"></i>
                        Indikator</a>
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