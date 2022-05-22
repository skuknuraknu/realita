<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'KK')
@section('content')
    <h3>Form Perjanjian Kinerja</h3>
    <div class="outer-wrapper">
        <div class="table-wrapper">
            <table id="kk">

                <!-- Button trigger modal -->
                <a href="{{ route('kk.show') }}" class="ml-5 mb-2 btn btn-danger text-white" type="button"
                    class="btn btn-light">
                    <i class="bx bx-message-rounded-edit"></i>
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
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($data as $dataKK)
                        <tr>
                            <td>{{ $dataKK->id }}</td>
                            <td></td>
                            <td>
                                {{ $dataKK->kode_ik }}
                            </td>
                            <td contenteditable="false" style="width: 100px">{{ $dataKK->pk_menteri }}</td>
                            <td style="width: 100pdataKK" contenteditable="true">{{ $dataKK->satuan }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_1 }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_2 }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_3 }}</td>
                            <td contenteditable="true">{{ $dataKK->tw_4 }}</td>
                            <td contenteditable="false">{{ $dataKK->bobot }}</td>

                            <td>
                                <span class="del_btn"><i role="button"
                                        class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button"
                                        class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @include('kk.script')
@endpush
