<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>INDIKATOR KINERJA UTAMA JABATAN</title>
<style type="text/css">
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	font-size: xx-small;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}

.auto-style10 {
	font-size: xx-small;
	border-style: none;
	border-width: medium;
	border: 1px solid #000000;
}
.auto-style12 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	font-size: xx-small;
	text-align: center;
	border-style: none;
	border-width: medium;
	border: 1px solid #000000;

}
</style>
</head>

<body>

<p class="auto-style2"><strong><span class="auto-style3">INDIKATOR KINERJA UTAMA</span><br class="auto-style3" />
<span class="auto-style3">{{strtoupper($jabatan->nama)}}</span></strong></p>
<table style="width: 100%">
	<tr>
		<td class="auto-style3" style="width: 99px"><strong>Instansi</strong></td>
		<td class="auto-style3">: {{strtoupper($jabatan->skpd->nama)}}</td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 99px"><strong>Tugas</strong></td>
		<td class="auto-style3">:
			@foreach ($tugas as $item)
			{{$item->no}}. {{$item->isi}} <br/>
			@endforeach
		</td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 99px"><strong>Fungsi</strong></td>
		<td class="auto-style3">	
			@foreach ($fungsi as $item)
			: {{$item->no}}. {{$item->isi}} <br/>
			@endforeach
		</td>
	</tr>
</table>

<table border=1 cellspacing="0" cellpadding="2" style="width: 100%">
	<tr>
		<td class="auto-style12"><strong>NO&nbsp;</strong></td>
		<td class="auto-style12"><strong>KINERJA UTAMA</strong></td>
		<td class="auto-style12"><strong>INDIKATOR KINERJA UTAMA</strong></td>
		<td class="auto-style12"><strong>PENJELASAN</strong></td>
		<td class="auto-style12"><strong>SUMBER DATA</strong></td>
		<td class="auto-style12"><strong>PENANGGUNG JAWAB</strong></td>
	</tr>
	<tr>
		<td class="auto-style12"><strong>1</strong></td>
		<td class="auto-style12"><strong>2</strong></td>
		<td class="auto-style12"><strong>3</strong></td>
		<td class="auto-style12"><strong>4</strong></td>
		<td class="auto-style12"><strong>5</strong></td>
		<td class="auto-style12"><strong>6</strong></td>
	</tr>
	@php
		$no=1;
	@endphp
	@foreach ($iku as $key =>$item)
		@php
		$rowspanIndikator = true;
		@endphp          
		@foreach ($item->indikator2 as $item2)     
		<tr>
			
			@if($rowspanIndikator)
			<td rowspan="{{count($item->indikator2)}}" class="auto-style10" align=center valign="top">{{$key + 1}}</td>
			<td rowspan="{{count($item->indikator2)}}" class="auto-style10" valign="top">{{$item->kinerja_utama}}</td>
			@php
				$rowspanIndikator = false;
			@endphp
			@endif

			<td class="auto-style10">{{$key+1}}.{{$no++}} {{$item2->indikator}}</td>
			<td class="auto-style10">{{$item2->penjelasan}}</td>
			<td class="auto-style10">{{$item2->sumber_data}}</td>
			<td class="auto-style10">{{$item2->penanggung_jawab}}</td>
		</tr>
		@endforeach
	@endforeach
</table>

</body>

</html>
