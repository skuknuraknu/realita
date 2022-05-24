<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Program')
@section('content')

<h3>Form Program</h3>
<div class="container-fluid">
    <div class="outer-wrapper">
        <div class="table-wrapper">
        <table>
            <thead>
                <th>ID</th>
                <th>Kode IKU</th>
                <th>Indikator Kinerja</th>
                <th>Kode Program</th>
                <th>Program</th>
                <th>Aksi</th>
            </thead>
            <tbody>
               @foreach($Program as $dataProgram)
                            <tr>
                                <td >{{ $dataProgram->id }}</td>
                                <td >
                                    <select name="kode_ik" type="text" id="kode_ik" class="kode_ik d-inline form-control w-auto required">
                                    @foreach($IK as $dataIK)
                                        @if($dataIK->kode_ik === $dataProgram->kode_ik)
                                            <option value="{{$dataIK->kode_ik}}" selected="true">{{$dataIK->kode_ik}}</option>
                                        @else
                                            <option value="{{$dataIK->kode_ik}}" >{{$dataIK->kode_ik}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </td>
                                <td class="indikator_kinerja" style="width: 400px">{{ $dataProgram->indikator_kinerja }}</td>
                                <td contenteditable="true" style="width:125px;"">{{ $dataProgram->kode_prog}}</td>
                                <td contenteditable="true" style="width:400px">{{ $dataProgram->program}}</td>
                                <td style="width: 140px;">
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
</div
@endsection

 @push('scripts')
    @include('program.script')
@endpush
