<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 2</title>
<style type="text/css">
.auto-style1 {
	font-size: small;
}
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	border: 1px solid #000000;
	font-size: xx-small;
	text-align: center;
}
.auto-style5 {
	border: 1px solid #000000;
	font-size: xx-small;
	
}
.auto-style4 {
	font-size: x-small;
}
</style>
</head>

<body>

<p class="auto-style2"><strong><span class="auto-style1">RENCANA AKSI TAHUN {{$tahun->tahun}}
</span><br class="auto-style1" />
<span class="auto-style1">{{strtoupper(Auth::user()->pegawai->skpd->nama)}}</span><br class="auto-style1" />
<span class="auto-style1">PEMERINTAH KOTA BANJARMASIN</span></strong></p>
<table style="width: 100%" cellpadding="2" cellspacing="0" >
	<tr>
		<td class="auto-style3" rowspan="2"><strong>NO</strong></td>
		<td class="auto-style3" rowspan="2"><strong>KINERJA UTAMA</strong></td>
		<td class="auto-style3" rowspan="2"><strong>INDIKATOR KINERJA UTAMA</strong></td>
		<td class="auto-style3" colspan="4" style="height: 26px"><strong>TARGET 
		KINERJA</strong></td>
		<td class="auto-style3" rowspan="2"><strong>KINERJA Es. III</strong></td>
		<td class="auto-style3" rowspan="2"><strong>INDIKATOR KINERJA Es. III</strong></td>
		<td class="auto-style3" rowspan="2"><strong>PROGRAM</strong></td>
		<td class="auto-style3" colspan="4" style="height: 26px"><strong>TARGET 
		KINERJA</strong></td>
		<td class="auto-style3" rowspan="2"><strong>KINERJA Es. IV</strong></td>
		<td class="auto-style3" rowspan="2"><strong>INDIKATOR KINERJA Es. IV</strong></td>
		<td class="auto-style3" rowspan="2"><strong>KEGIATAN</strong></td>
		<td class="auto-style3" rowspan="2"><strong>AKTIVITAS</strong></td>
		<td class="auto-style3" colspan="4" style="height: 26px"><strong>TARGET 
		KEUANGAN</strong></td>
	</tr>
	<tr>
		<td class="auto-style3"><strong>TW.I</strong></td>
		<td class="auto-style3"><strong>TW.II</strong></td>
		<td class="auto-style3"><strong>TW.III</strong></td>
		<td class="auto-style3"><strong>TW.IV</strong></td>
		<td class="auto-style3"><strong>TW.I</strong></td>
		<td class="auto-style3"><strong>TW.II</strong></td>
		<td class="auto-style3"><strong>TW.III</strong></td>
		<td class="auto-style3"><strong>TW.IV</strong></td>
		<td class="auto-style3"><strong>TW.I</strong></td>
		<td class="auto-style3"><strong>TW.II</strong></td>
		<td class="auto-style3"><strong>TW.III</strong></td>
		<td class="auto-style3"><strong>TW.IV</strong></td>
	</tr>
    @php
        $no =1;
    @endphp
    @foreach ($ra as $key => $item)
	@php
	$merge_no = true;
	@endphp      
	@php
	$merge_kegiatan = true;
	@endphp      
		@foreach ($item['indikator2'] as $item2)
			@foreach ($item2['iku3'] as $item3)
				@foreach ($item3['indikator3'] as $item4)
					@foreach ($item4['program'] as $item5)
						@foreach ($item5['iku4'] as $item6)
							@foreach ($item6['indikator4'] as $item7)
								@foreach ($item7['kegiatan'] as $item8)
									@foreach ($item8['aktivitas'] as $item9)
									<tr>
									
										{{-- @if($merge_no)
										<td class="auto-style3" rowspan="{{count($item8['aktivitas'])}}" align=center valign="top">{{$key+1}}</td> --}}
										{{-- <td class="auto-style3" rowspan="{{count($item->indikator2)}}" valign="top">{{$item2->iku2->kinerja_utama}}</td> --}}

										{{-- @php
											$merge_no = false;
										@endphp
										@endif --}}
										
										<td class="auto-style5">{{$no++}}</td>
										<td class="auto-style5">{{$item['kinerja_utama']}}</td>
										<td class="auto-style5">{{$item2 == null ? '-':$item2['indikator']}}</td>
										<td class="auto-style3">{{$item2 == null ? '':$item2['tw1']}}</td>
										<td class="auto-style3">{{$item2 == null ? '':$item2['tw2']}}</td>
										<td class="auto-style3">{{$item2 == null ? '':$item2['tw3']}}</td>                
										<td class="auto-style3">{{$item2 == null ? '':$item2['tw4']}}</td>
										<td class="auto-style5">{{$item3['kinerja_utama']}}</td>
										<td class="auto-style5">{{$item4['indikator']}}</td>
										<td class="auto-style5">{{$item5['nama']}}</td>
										<td class="auto-style3">{{$item5['tw1']}}</td>
										<td class="auto-style3">{{$item5['tw2']}}</td>
										<td class="auto-style3">{{$item5['tw3']}}</td>
										<td class="auto-style3">{{$item5['tw4']}}</td>
										<td class="auto-style3">{{$item6['kinerja_utama']}}</td>
										<td class="auto-style3">{{$item7['indikator']}}</td>
										
										<td class="auto-style3">{{$item8['nama']}}</td>
										<td class="auto-style3">{{$item9['nama']}}</td>
										<td class="auto-style3">{{$item9['tk1']}}</td>
										<td class="auto-style3">{{$item9['tk2']}}</td>
										<td class="auto-style3">{{$item9['tk3']}}</td>
										<td class="auto-style3">{{$item9['tk4']}}</td>
									</tr>
									@endforeach
        						@endforeach
        					@endforeach  
        				@endforeach  
        			@endforeach  
        		@endforeach  
        	@endforeach  
        @endforeach  
    @endforeach
</table>
<br/>
<table style="width: 100%">
	<tr>
		<td>&nbsp;</td>
		<td style="width: 728px">&nbsp;</td>
		<td class="auto-style2"><span class="auto-style4">Banjarmasin, {{\Carbon\Carbon::today()->isoFormat('D MMMM Y')}}</span><br class="auto-style4" />
		<span class="auto-style4">{{$jabatan->nama}}</span><br class="auto-style4" />
		<br class="auto-style4" />
		<br class="auto-style4" />
		<span class="auto-style4">{{Auth::user()->pegawai->nama}}</span><br class="auto-style4" />
		<span class="auto-style4">NIP. {{Auth::user()->pegawai->nip == null ? '':Auth::user()->pegawai->nip}}</span></td>
	</tr>
</table>

</body>

</html>
