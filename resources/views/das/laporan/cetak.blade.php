<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cetak Laporan</title>
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
				height: 8%;
				margin-bottom: 0px;
				width: 100%;
			}

			.logo {
				float: left;
				background-color: white;
				text-align: right;
				height: 100%;
				width: 13%;
			}

			.instansi {
				background-color: white;
				height: 100%;
				font-size: 20px;
				text-align: center;
				width: 100%;
			}

			.garis {
				background-color: black;
				height: 0.2%;
				width: 100%;
			}

			/* Style the header */
			header {
				background-color: white;
				padding: 30px;
				margin-top: 0px;
				padding: 0px;
				text-align: center;
				font-size: 18px;
				font: arial;
				color: Black;
			}

			/* Create two columns/boxes that floats next to each other */
			nav {
				float: left;
				width: 60%;
				height: 200px;
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
				float: left;
				padding-top: 20px;
				width: 29%;
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
			footer {
				background-color: white;
				padding: 10px;
				text-align: center;
				color: black;
			}

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
				<img src="#" alt="Flowers in Chania" width="70" height="70">
			</div>
			<div class="instansi"> Sewa Lapangan Futsal <p>Scudetto - Banyuwangi</p>
			</div>
		</div>
		<div class="garis"></div>
		<header>
			<h2>Data Rekap Laporan</h2>
		</header>
		<section>
			<nav>
				<table>
					<tr>
						<td style="width:10%">Admin</td>
						<td style="width:2%">:</td>
						<td style="width:40%">{{auth()->user()->name}}</td>
					</tr>
				</table>
			</nav>
			<article>
				<img src="#" alt="Foto diri" width="150" height="150">
			</article>
		</section>
		<footer>
			<h3>Data Rekap Laporan</h3>
			<table id="customers">
				<tr>
                <th>date</th>
                    <th width="150px">No. Bukti</th>
                    <th>Pemesan</th>
                    <th>Lapangan</th>
                    <th>Durasi</th>
                    <th >Total Bayar</th>
                    @foreach ($laporan as $item)
                <tr>
                    <td>
                        {{date("d/m/Y",strtotime($item->jam_pesan_awal))}}
                    </td>
                    <td>
                        {{$item->kode}}
                    </td>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td>
                        {{$item->lapangan->name}}
                    </td>
                    <td>
                        {{$item->durasi_sewa}} Jam
                    </td>
                    <td>
                        Rp. {{$item->total_bayar}},-
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="5">Total</th>
                    <th>Rp. {{$total_bayar}},-</th>
                </tr>
			</table>
		</footer>
		<div class="section"></div>
	</body>
</html>
