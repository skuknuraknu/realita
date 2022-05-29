<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Halaman KK')
@section('content')

    <div class="container">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-dark" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Unit Kerja</th>
                                <th>Kode IK</th>
                                <th>PK Mentri</th>
                                <th>TW 1</th>
                                <th>TW 2</th>
                                <th>TW 3</th>
                                <th>TW 4</th>
                                <th>Jumlah Target</th>
                                <th>Bobot</th>
                                <th>Tahun</th>
                                <th>Verifikasi Kegiatan</th>
                                <th>Verifikasi Pimpinan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                                <tr>
                                    <td>{{ $x->id }}</td>
                                    <td></td>
                                    <td>
                                        {{ $x->kode_ik }}
                                    </td>
                                    <td>{{ $x->pk_menteri }}</td>
                                    <td>{{ $x->tw_1 }}</td>
                                    <td>{{ $x->tw_2 }}</td>
                                    <td>{{ $x->tw_3 }}</td>
                                    <td>{{ $x->tw_4 }}</td>
                                    <td>{{ $x->tw_1 + $x->tw_2 + $x->tw_3 + $x->tw_4 }}</td>
                                    <td>{{ $x->bobot }}</td>
                                    <td>{{ $x->created_at->year }}</td>

                                    <td>
                                        <select name="verifikasi_kegiatan"
                                            class="verifikasi_kegiatan d-inline form-control w-auto required verifikasi">
                                            <option value="" disabled selected>--Setuju/Tolak--</option>
                                            @foreach ($options as $key => $value)
                                            <option value="{{ $key }}"
                                            @if ($key == $x->verifikasi_kegiatan))
                                                selected="selected"
                                            @endif
                                            >{{ $value }}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="verifikasi_pimpinan"
                                            class="verifikasi_pimpinan d-inline form-control w-auto required verifikasi">
                                            <option value="" disabled selected>--Setuju/Tolak--</option>
                                            @foreach ($options as $key => $value)
                                            <option value="{{ $key }}"
                                            @if ($key == $x->verifikasi_pimpinan))
                                                selected="selected"
                                            @endif
                                            >{{ $value }}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.verifikasi_kegiatan').change(function() {
            let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
            let id = setiapBaris[0]
            let verifikasi_kegiatan = $(this).closest('tr').find('select.verifikasi_kegiatan').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('verification.perkin_update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    verifikasi_kegiatan: verifikasi_kegiatan
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: 'DATA SUKSES TERSIMPAN',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    })
                }
            });
        });
        $('.verifikasi_pimpinan').change(function() {
            let setiapBaris =  $(this).closest('tr')[0].innerText.split("\t").slice(0, -1)
            let id = setiapBaris[0]
            let verifikasi_pimpinan = $(this).closest('tr').find('select.verifikasi_pimpinan').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('verification.perkin_update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    verifikasi_pimpinan: verifikasi_pimpinan
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: 'DATA SUKSES TERSIMPAN',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    })
                }
            });
        });
    </script>
@endpush
