<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #customers {
				font-family: Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			#customers td,
			#customers th {
				border: 1px solid #ddd;
				padding: 8px;
			}

			#customers tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			#customers tr:hover {
				background-color: #ddd;
			}

			#customers th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color: grey;
				color: white;
			}

    </style>
    <title>Cetak Invoice</title>
    <link rel="stylesheet" href="#">
</head>
<body style="padding: 0 20;">
    <div>
      <section class="content">
        <div class="row">
            <div>
                <div class="span12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><h2><strong>Kode </strong>{{$riwayat->kode}} </h2></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Scudetto Banyuwangi</strong><br>
                Jl. Letjen Sutoyo No.1,<br>
                Penganjuran, Tukangkayu, Kec. Banyuwangi, <br>
                Kabupaten Banyuwangi, Jawa Timur<br>
                kodepos: 68416
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col" style="margin-top: 15px; margin-bottom: 15px;">
              To
              <address>
                <strong>{{$riwayat->user->name}}</strong><br>
                @if($riwayat->user->alamatLengkap)
                {{$riwayat->user->alamatLengkap->alamat}}<br>
                @endif
                Jawa Timur<br>
                @if($riwayat->user->alamatLengkap)
                Phone: {{$riwayat->user->alamatLengkap->no_hp}}<br>
                @endif
                Email: {{$riwayat->user->email}}
              </address>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table id="customers">
                <thead>
                <tr>
                <th>No</th>
                    <th>Lapangan</th>
                    <th>Jenis</th>
                    <th>Durasi Sewa</th>
                    <th>Tangal Sewa</th>
                    <th>Jam Mulai</th>
                    <th>Total Bayar</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1; @endphp <tr>
					<td>{{$no++}}</td>
                    <td>{{$riwayat->lapangan->name}}</td>
                    <td>{{$riwayat->lapangan->jenis}}</td>
                    <td>{{$riwayat->durasi_sewa}} Jam</td>
                    <td>{{date("d-m-Y", strtotime($riwayat->jam_pesan_awal))}}</td>
                    <td>{{date("H", strtotime($riwayat->jam_pesan_awal))}}:00:00</td>
                    <td>{{$riwayat->total_bayar}}</td>
                    </tr>
                    <tr>
                        <td colspan="6">Total Biaya</td>
                        <td><b>Rp.{{$riwayat->total_bayar}} ,-</b></td>
                    </tr>
                </tbody>
            </table>
          </div>
      </section>
    </div>
  </body>
   <script>
      window.print()
  </script>
</html>



