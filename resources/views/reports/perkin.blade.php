<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'KK')
@section('content')
    <h3>Form Perjanjian Kinerja</h3>
    <div class="outer-wrapper">
        <div class="table-wrapper">
            <table id="kk">

                <!-- Button trigger modal -->
                <a href="{{ route('reports.perkin.cetak_pdf') }}" class="mb-2 btn btn-success text-white" type="button"
                    class="btn btn-light">
                    <i class="bx bx-printer"></i>
                </a>
                <thead>
                    <th>ID</th>
                    <th>Unit Kerja</th>
                    <th>Kode IK</th>
                    <th>PK Mentri</th>
                    <th>Satuan</th>
                    <th>TW 1</th>
                    <th>TW 2</th>
                    <th>TW 3</th>
                    <th>TW 4</th>
                    <th>Bobot</th>
                </thead>
                <tbody>
                    @foreach ($dataPerkin as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td></td>
                            <td>
                                {{ $data->kode_ik }}
                            </td>
                            <td contenteditable="false" style="width: 100px">{{ $data->pk_menteri }}</td>
                            <td style="width: 100pdata" contenteditable="true">{{ $data->satuan }}</td>
                            <td contenteditable="true">{{ $data->tw_1 }}</td>
                            <td contenteditable="true">{{ $data->tw_2 }}</td>
                            <td contenteditable="true">{{ $data->tw_3 }}</td>
                            <td contenteditable="true">{{ $data->tw_4 }}</td>
                            <td contenteditable="false">{{ $data->bobot }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
