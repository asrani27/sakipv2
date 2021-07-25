
@foreach ($data->sortBy('tahun_id') as $key => $item)  
@foreach ($item->indikator4 as $item2)    
<tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
    <td>{{$item2->tahun->tahun}}</td>
    <td>{{$item2->iku4->kinerja_utama}}</td>
    <td>{{$item2->indikator}}</td>
    <td>
        @if ($item2->target == null)
        <a href="/admin_skpd/pegawai/pk/{{$pegawai->id}}/target/{{$item2->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Isi Target</a>
            
        @else
        {{$item2->target}}
        <a href="/admin_skpd/pegawai/pk/{{$pegawai->id}}/target/edit/{{$item2->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target" ><i class="fa fa-edit"></i></a>           
        @endif
    </td>
</tr> 
@endforeach
@endforeach