<!DOCTYPE html>
<html>
<head>
	<title>Struk Nota Apotek Pharmasix</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Struk Nota</h4>
		<h6>Apotek Pharmasix</h5>
	</center>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
            @php
                function idr($salary)
                {
                $result = 'Rp. ' . number_format($salary, 2, ',', '.');
                return $result;
            }
            @endphp
			@php $i=1 @endphp
			@foreach($barangkeluar as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->jumlah}}</td>
				<td>{{ idr($p->harga) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>