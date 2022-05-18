@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <p class="text-light" style="text-decoration:underline">Pihak Pertama</p> 
<table border="1">
    <tr>
                <td>Tempat Penandatanganan</td>
                <td style="width:300px"></td>
    </tr>
    <tr>
        <td>Tanggal Penandatanganan</td>
        <td style="width:300px"></td>
    </tr>
    <tr>
        <td>Nama Pimpinan (Rektor) </td>
        <td style="width:300px"></td>
    </tr>
    <tr>
        <td>Jabatan Pimpinan (Rektor)</td>   
        <td style="width:300px"></td>
    </tr>
    <tr>
        <td>NIP (Rektor)</td>
        <td style="width:300px"></td>
    </tr>
</table>
    </div>
    <div class="col-lg-6">
        <p class="text-light" style="text-decoration:underline">Pihak Kedua</p> 
<table border="1">

    <tr>
        <td>Nama Pimpinan (Unit Kerja) </td>
        <td style="width:300px"></td>
    </tr>
    <tr>
        <td>Jabatan Pimpinan (Unit Kerja)</td>   
        <td style="width:300px"></td>
    </tr>
    <tr>
        <td>NIP (Unit Kerja)</td>
        <td style="width:300px"></td>
    </tr>
</table>
<a href='/' class="mt-4 w-100 float-right btn btn-success text-light" style="font-weight:bold">Save & Continue</a>
    </div>
   
</div>
{{-- 
<label for="">Jabatan Pimpinan (Rektor)</label>
<input class="form-control" type="text"/>

<label for="">NIP Pimpinan (Rektor)</label>
<input class="form-control" type="text"/>

<p class="pt-2">Pihak Kedua</p>
<label for="">Nama Pimpinan (Unit Kerja)</label>
<input class="form-control" type="text"/>

<label for="">Jabatan Pimpinan (Unit Kerja)</label>
<input class="form-control" type="text"/>

<label for="">NIP Pimpinan (Unit Kerja)</label>
<input class="form-control" type="text"/>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div> --}}
@endsection