
<td>
@php
    $no = 1;
@endphp
@foreach ($item->indikator3 as $ind)
    {{$no++}}. {{$ind->indikator}} <a href="/pegawai/iku/edit_indikator/{{$ind->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Indikator"><i class="fa fa-edit"></i></a> |  <a href="/pegawai/iku/hapus_indikator/{{$ind->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Hapus Indikator"  onclick="return confirm('Yakin Ingin Menghapus Indikator ini?');"><i class="fa fa-trash"></i></a> <br/>
@endforeach
</td>
<td>                                
@php
    $no = 1;
@endphp
@foreach ($item->indikator3 as $penjelasan)
    {{$no++}}. {{$penjelasan->penjelasan}}<br/>
@endforeach
</td>
<td>                                
@php
    $no = 1;
@endphp
@foreach ($item->indikator3 as $sumber_data)
    {{$no++}}. {{$sumber_data->sumber_data}}<br/>
@endforeach
</td>
<td>                                
@php
    $no = 1;
@endphp
@foreach ($item->indikator3 as $penanggung_jawab)
    {{$no++}}. {{$penanggung_jawab->penanggung_jawab}}<br/>
@endforeach
</td>