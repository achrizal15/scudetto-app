<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Invoice</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {
				box-sizing: border-box;
			}

			body {
				font-family: Arial, Helvetica, sans-serif;
			}

			.kop {
				background-color: white;
				height: 10%;
				margin-bottom: 40px;
				width: 100%;
			}

			.logo {
				float: left;
				background-color: white;
				text-align: right;
				height: 100%;
				width: 15%;
			}

			.instansi {
				float: right;
				background-color: white;
				height: 100%;
				font-size: 15px;
				text-align: center;
				width: 30%;
			}

			.garis {
				background-color: white;
				height: 0.2%;
				width: 100%;
			}

			.garis1 {
				background-color: grey;
				height: 1%;
				width: 80%;
			}

			/* Style the header */
			Hseader {
				background-color: blue;
				padding: 30px;
				margin-top: 0px;
				height: 1%;
				width: 80%;
				padding: 0px;
				text-align: center;
				font-size: 18px;
				font: arial;
				color: Black;
			}

			/* Create two columns/boxes that floats next to each other */
			nav {
				float: left;
				width: 50%;
				height: 180px;
				/* only for demonstration, should be removed */
				background: white;
				padding: 20px;
			}

			/* Style the list inside the menu */
			nav ul {
				list-style-type: none;
				padding: 0;
			}

			article {
				float: right;
				padding-top: 20px;
				width: 50%;
				background-color: white;
				height: 200px;
				/* only for demonstration, should be removed */
			}

			/* Clear floats after the columns */
			section::after {
				content: "";
				display: table;
				clear: both;
			}

			/* Style the footer */
			Header {
				margin-top: 20px;
				background-color: white;
				padding: 10px;
				text-align: center;
				color: black;
			}

			footer {
				background-color: white;
				padding: 10px;
				text-align: center;
				color: black;
			}

			.total {
				float: right;
				background-color: white;
				height: 30%;
				font-size: 15px;
				text-align: left;
				width: 28%;
			}

			#customers {
				font-family: Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			.biasa {
				color: grey;
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

			footer {
				background-color: white;
				padding: 10px;
				text-align: center;
				color: black;
			}

			/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
			@media (max-width: 600px) {

				nav,
				article {
					width: 100%;
					height: auto;
				}
			}
		</style>
	</head>
	<body>


		<div class="kop">
			<div class="logo">
            <box-icon type='solid' name='universal-access'></box-icon>
			</div>
			<div class="instansi">
				<h3>INVOICE</h3>
				<table class="biasa">
					<tr>
						<td style="width:10%">Kode</td>
						<td style="width:2%">:</td>
						<td style="width:40%">{{$riwayat->kode}}</td>
					</tr>
					<tr>
						<td style="width:10%">Tanggal</td>
						<td style="width:2%">:</td>
						<td style="width:40%"> {{\Carbon\Carbon::parse($riwayat->created_at)->isoFormat('L')}}</td>
					</tr>
				</table>
			</div>
		</div>


		<div class="garis"></div>
		<section>
			<nav> Info Perusahaan <br>
				<div class="garis1"></div>
				<br>
				<b>Scudetto Banyuwangi</b>
			</nav>
			<article> Invoice Untuk <br>
				<div class="garis1"></div>
				<br>
				<b>{{$riwayat->user->name}}</b>
				<table class="biasa">
					<br>
					<tr>
						<td style="width:10%">Telp</td>
						<td style="width:2%">:</td>
						<td style="width:40%">0097097786</td>
					</tr>
					<tr>
						<td style="width:10%">Email</td>
						<td style="width:2%">:</td>
						<td style="width:40%">@gmail.com</td>
					</tr>
					<tr>
						<td style="width:10%">Alamat</td>
						<td style="width:2%">:</td>
						<td style="width:40%">alamattttt</td>
					</tr>
				</table>
			</article>
		</section>


		<Header>
			<table id="customers">
				<tr>
					<th>No</th>
                    <th>Lapangan</th>
                    <th>Jenis</th>
                    <th>Durasi Sewa</th>
                    <th>Tangal Sewa</th>
                    <th>Jam Mulai</th>
                    <th>Total Bayar</th>
				</tr> @php $no=1; @endphp <tr>
					<td>{{$no++}}</td>
                    <td>{{$riwayat->lapangan->name}}</td>
                    <td>{{$riwayat->lapangan->jenis}}</td>
                    <td>{{$riwayat->durasi_sewa}} Jam</td>
                    <td>{{date("d-m-Y", strtotime($riwayat->jam_pesan_awal))}}</td>
                    <td>{{date("H", strtotime($riwayat->jam_pesan_awal))}}:00:00</td>
                    <td>{{$riwayat->total_bayar}}</td>
				</tr>
			</table>
		</Header>


		<footer>
			<div class="total">
				<table>
					<tr>
						<td style="width:10%">
							<b>SubTotal</b>
						</td>
						<td style="width:2%">:</td>
						<td style="width:40%">
							<b>Rp.{{$riwayat->total_bayar}} ,-</b>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br> Pemesan Terkait, <br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div class="garis1"></div>
			</div>
		</footer>


		<div class="section"></div>
	</body>
</html>
