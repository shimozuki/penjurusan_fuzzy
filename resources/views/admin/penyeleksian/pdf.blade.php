<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Hasil Rekomendasi BANSOS</title>
    <style>
        .text-center {
            text-align: center;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .mt-3 {
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h3 class="text-uppercase font-weight-bold">
            {{$penyelesian->judul_penilaian}} <br>
            <small class="text-uppercase">
                Tanggal : {{ CheckHelp::get_tanggal_show($penyelesian->tanggal_penilaian) }}
            </small>
        </h3>
        <hr style="border: 1.5px solid black;">
        <hr style="border: 1px solid black; margin-top: -7px;">
    </div>
    <div class="mt-3">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px;">
                <?php
                $hasilDetail = $hasil->hasilDetail()->get();
                ?>
                @foreach ($hasilDetail as $v_detail)
                <?php
                $warga = CheckHelp::get_warga($v_detail->warga_id);
                ?>
                <tr>
                    <td>{{$v_detail->rank_hasil}}</td>
                    <td>{{$warga->nama_warga}}</td>
                    <td>{{$warga->alamat_warga}}</td>
                    <td>{{$v_detail->status == '1' ? 'Diterima' : 'Ditolak'}}</td>
                </tr>   
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>