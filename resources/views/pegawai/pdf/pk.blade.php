<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	font-size: small;
}
.auto-style3 {
	font-size: xx-small;
	border: 1px solid #000000;
}
.auto-style5 {
	text-align: center;
	font-size: xx-small;
	border: 1px solid #000000;
}
.auto-style4 {
	border: 1px solid #000000;
}
.auto-style6 {
	font-size: xx-small;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style7 {
	font-size: x-small;
}
</style>
</head>

<body>

<p class="auto-style1"><strong>PERJANJIAN KINERJA TAHUN {{$tahun->tahun}}<br />
<span class="auto-style2">{{strtoupper($jabatan->nama)}}</span></strong></p>
<table cellpadding="2" cellspacing="0" class="auto-style4" style="width: 100%">
	<tr>
		<td class="auto-style5"><strong>NO</strong></td>
		<td class="auto-style5"><strong>KINERJA UTAMA</strong></td>
		<td class="auto-style5"><strong>INDIKATOR KINERJA UTAMA</strong></td>
		<td class="auto-style5"><strong>TARGET</strong></td>
	</tr>
	<tr>
		<td class="auto-style5"><strong>1</strong></td>
		<td class="auto-style5"><strong>2</strong></td>
		<td class="auto-style5"><strong>3</strong></td>
		<td class="auto-style5"><strong>4</strong></td>
	</tr>
	@php
		$no=1;
	@endphp
    @foreach ($pk as $key => $item)
        @php
        $rowspanIndikator = true;
        @endphp          
		@foreach ($item->indikator2 as $item2)     
        <tr>
            
			@if($rowspanIndikator)
			<td class="auto-style3" rowspan="{{count($item->indikator2)}}" align=center valign="top">{{$key+1}}</td>
            <td class="auto-style3" rowspan="{{count($item->indikator2)}}" valign="top">{{$item->kinerja_utama}}</td>

            @php
				$rowspanIndikator = false;
			@endphp
			@endif
            <td class="auto-style3">{{$key+1}}.{{$no++}} &nbsp;&nbsp;{{$item2->indikator}}</td>
            <td class="auto-style5">{{$item2->target}}</td>
        </tr>
        @endforeach
    @endforeach
</table>

<p>&nbsp;</p>
<table style="width: 100%">
	<tr>
		<td class="auto-style6"><strong>PROGRAM</strong></td>
		<td class="auto-style6"><strong>ANGGARAN</strong></td>
		<td class="auto-style6"><strong>KETERANGAN</strong></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

<p>&nbsp;</p>
<table style="width: 100%">
	<tr>
		<td class="auto-style1"><span class="auto-style7">Walikota Banjarmasin</span><br class="auto-style7" />
		<br class="auto-style7" />
		<br class="auto-style7" />
		<br class="auto-style7" />
		<span class="auto-style7">H. Ibnu Sina</span></td>
		<td class="auto-style1"><span class="auto-style7">Banjarmasin, {{\Carbon\Carbon::today()->isoFormat('D MMM Y')}}</span><br class="auto-style7" />
		<span class="auto-style7">Kepala {{$jabatan->nama}}</span><br class="auto-style7" />
		<br class="auto-style7" />
		<br class="auto-style7" />
		<span class="auto-style7">{{Auth::user()->pegawai->nama}}</span><br class="auto-style7" />
		<span class="auto-style7">NIP. {{Auth::user()->pegawai->nip}}</span></td>
	</tr>
</table>

</body>

</html>
