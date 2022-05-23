<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Perkin</title>

    <link href="{!! public_path('assets') !!}/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-borderless{
            border-color: transparent;
        }

        body{
            letter-spacing: 1px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center my-3">
                <img src="{{ public_path('assets/images/unsyiah.png') }}" height="200px" alt="logo">
            </div>
            <div class="col-12">
                <h2 class="text-center">Perjanjian Kinerja Antara Universitas Syiah Kuala <br> Dengan Pimpinan Unit
                    Kerja
                </h3>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-3">
                <table class="table table-borderless table-responsive" border="0">
                    <tr>
                        <td>Satuan Kerja</td>
                        <td>:</td>
                        <td>Universitas Syiah Kuala</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>:</td>
                        <td>Fakultas Teknik (contoh saja)</td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>2023</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered border-dark table-responsive align-middle" >
                    <thead>
                        <th class="text-center align-middle">Sasaran</th>
                        <th class="text-center align-middle">Kode IK</th>
                        <th class="text-center align-middle">Indikator Kinerja</th>
                        <th class="text-center align-middle">Satuan</th>
                        <th class="text-center align-middle">PK Mentri</th>
                        <th class="text-center align-middle">TW 1</th>
                        <th class="text-center align-middle">TW 2</th>
                        <th class="text-center align-middle">TW 3</th>
                        <th class="text-center align-middle">TW 4</th>
                        <th class="text-center align-middle">Bobot</th>
                    </thead>
                    <tbody>
                        @foreach ($dataPerkin as $key => $perkin)
                            @foreach ($perkin as $key => $item)
                                <tr>
                                    @if ($key == 0)
                                        <td rowspan="{{ count($perkin) }}">{{ $item->sasaran }}</td>
                                    @endif
                                    <td>{{ $item->kode_ik }}</td>
                                    <td>{{ $item->indikator_kinerja }}</td>
                                    <td class="text-center">{{ $item->satuan }}</td>
                                    <td class="text-center">{{ $item->pk_menteri }}</td>
                                    <td class="text-center">{{ $item->tw_1 }}</td>
                                    <td class="text-center">{{ $item->tw_2 }}</td>
                                    <td class="text-center">{{ $item->tw_3 }}</td>
                                    <td class="text-center">{{ $item->tw_4 }}</td>
                                    <td class="text-center">{{ $item->bobot }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
