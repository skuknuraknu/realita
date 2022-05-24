<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman RPK')
@section('content')
<h3>Form Rencana Program Kegiatan</h3>
<div class="outer-wrapper">
<div class="table-wrapper">
    <table id="rpk">
        <button id="tes" class="mb-2 bg-warning btn text-white" type="button">
            <i class="bx bx-message-rounded-add"></i>
        </button>
        <thead>
            <th>ID</th>
            <th>Unit Kerja</th>
            <th>Kode IK</th>
            <th style="width:400px;">Indikator Kinerja</th>
            <th>Kode Program</th>
            <th>Program</th>
            <th>Rincian Program</th>
            <th>Nama Kegiatan</th>
            <th>TOR/KAK/ProposalProject</th>
            <th>Kebutuhan Kegiatan</th>
            <th>Rencana Jadwal Pelaksanaan</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </thead>
        <tbody>
             @foreach($RPK as $dataRPK)
                        <tr id="attachment" class="item">
                            <td >{{ $dataRPK->id }}</td>
                            <td></td>
                            <td id="ik">
                                <p style="font-size:10px;" class="text-center">{{ $dataRPK->kode_ik}}</p>
                                <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                <option value="SILAHKAN PILIH" selected="true">SILAHKAN PILIH</option>
                                @foreach($KK as $dataKK)
                                    <option  value="{{$dataKK->kode_ik}}" >{{$dataKK->kode_ik}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td class="indikator_kinerja" style="width: 300px;">{{ $dataRPK->indikator_kinerja}}</td>
                            <td>
                                <p style="font-size:10px;" class="text-center">{{ $dataRPK->kode_program}}</p>
                                <select name="kode_prog" class="kode_prog form-control d-inline w-auto required" id=""></select>
                            </td>
                            <td class="program" style="width: 300px;">{{ $dataRPK->program}}</td>
                            <td>
                               <div class="row">
                                   <div class="col-sm-8"  style="width:250px;">
                                        <span class="rip" style=" margin-right:5px">{{$dataRPK->rincian_program}}</span>
                                   </div>
                                   <div class="col-sm-4">
                                    <div class="text-right user-box dropdown">
                                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" style="overflow-y: scroll; height:200px;">
                                             @foreach($RINCIANPROGRAM as $dataMAK)
                                            <div><li class="rip-data"><p class="dropdown-item" ><span style="font-size: 12px;">{{$dataMAK->Rip}}</span></a>
                                            </li></div>
                                            @endforeach
                                        </ul>
                                    </div>
                                   </div>
                               </div>
                              
                            </td>
                            <td contenteditable="true">{{ $dataRPK->nama_kegiatan}}</td>
                            <td style="width: 90px;">
                                <div id="uploadStatus"></div>
                               <form id="uploadForm" enctype="multipart/form-data">
                                  <input type="file" class="fu" name="file" id="fileInput">
                                </form>
                            </td>
                            <td contenteditable="true">{{ $dataRPK->Kebutuhan_Kegiatan}}</td>
                            <td>
                                <select style="font-size: 10px; font-weight: bold;"  name="Rencana_Jadwal_Pelaksanaan" class="Rencana_Jadwal_Pelaksanaan d-inline form-control w-auto required">
                                    <option value="TRIWULAN 1">TRIWULAN 1</option>
                                    <option value="TRIWULAN 2">TRIWULAN 2</option>
                                    <option value="TRIWULAN 3">TRIWULAN 3</option>
                                    <option value="TRIWULAN 4">TRIWULAN 4</option>
                                </select>
                            </td>
                            <td>
                                <select style="font-size: 10px; font-weight: bold;"  name="tahun" class="tahun d-inline form-control w-auto required">
                                    <option value="PILIH TAHUN">PILIH TAHUN</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2025">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </td>
                            <td>
                                 <span class="del_btn"><i role="button" class="rounded bg-danger py-3 px-2 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button" class="rounded bg-info py-3 px-2 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button" class="rounded bg-success py-3 px-2 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
 @push('scripts')
    @include('rpk.script')
@endpush
