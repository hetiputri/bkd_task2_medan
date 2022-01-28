<?php

function jk($a){
	if($a=="L"){
		return "Laki-laki";
	}else{
		return "Perempuan";
	}
}
$html ='';
$html .='<div class="panel">
			<a href="tambah.php"><button>TAMBAH</button></a>
		</div>';
$html .='<table width="100%" border="1">
			<thead>
			<tr>
				<td>No.</td>
				<td>Nama</td>
				<td>Usia</td>
				<td>L/P</td>
				<td>Pangkat/Golongan</td>
				<td></td>
			</tr>
			</thead>
			<tbody>';

$sql = mysqli_query($link,"SELECT a.*,b.* FROM tbl_pegawai a LEFT JOIN ref_pangkat b ON b.id_pangkat = a.id_pangkat ORDER BY a.id_pangkat DESC,a.Usia ASC");
$i=1;
While($data=mysqli_fetch_array($sql)){
	$html.='<tr>
				<td>'.$i.'</td>
				<td>'.$data["Nama"].'</td>
				<td>'.$data["Usia"].'</td>
				<td>'.$data["jenis_kelamin"].'</td>
				<td>'.$data["pangkat"].' /'.$data["gol_ruang"].'</td>
				<td><a href="hapus.php?id='.$data["id_pegawai"].'"><button>HAPUS</button></a></td>
			</tr>';
			$i++;
}
$html .='</tbody>
		</table>';	

$html .='<h3>Rekap berdasarkan Pangkat</h3>
			<table width="100%" border="1">
			<thead>
			<tr>
				<td>No.</td>
				<td>Pangkat</td>
				<td>Jumlah Pegawai</td>
			</tr>
			</thead>
			<tbody>';

$need = "SELECT count(a.id_pegawai) as jumlah,b.pangkat,b.gol_ruang
			FROM tbl_pegawai a
			LEFT JOIN ref_pangkat b ON b.id_pangkat = a.id_pangkat
			GROUP BY a.id_pangkat";
			$sql = mysqli_query($link,$need);
$n=1;
While($data2=mysqli_fetch_array($sql)){
	$html.='<tr>
				<td>'.$n.'</td>
				<td>'.$data2["pangkat"].' /'.$data2["gol_ruang"].'</td>
				<td>'.$data2["jumlah"].'</td>
			</tr>';
			$n++;
}
$html .='</tbody>
		</table>';	

$html .='<h3>Rekap berdasarkan Usia</h3>
			<table width="100%" border="1">
			<thead>
			<tr>
				<td>No.</td>
				<td>Jumlah Pegawai</td>
				<td><31</td>
				<td>31-40</td>
				<td>41-50</td>
				<td>>50</td>
			</tr>
			</thead>
			<tbody>';

$need = "SELECT count(id_pegawai) as jumlah,
			sum(case when Usia<31 then 1 else 0 end) as usia_30,
			sum(case when Usia>=31 AND Usia<=40 then 1 else 0 end) as usia_40,
			sum(case when Usia>=41 AND Usia<=50 then 1 else 0 end) as usia_50,
			sum(case when Usia>=51 then 1 else 0 end) as usia_60
			FROM tbl_pegawai a
			";
			$sql = mysqli_query($link,$need);
$n=1;
While($data2=mysqli_fetch_array($sql)){
	$html.='<tr>
				<td>'.$n.'</td>
				<td>'.$data2["jumlah"].'</td>
				<td>'.$data2["usia_30"].'</td>
				<td>'.$data2["usia_40"].'</td>
				<td>'.$data2["usia_50"].'</td>
				<td>'.$data2["usia_60"].'</td>
			</tr>';
			$n++;
}
$html .='</tbody>
		</table>';

$html .='<h3>Rekap berdasarkan Jenis Kelamin</h3>
			<table width="100%" border="1">
			<thead>
			<tr>
				<td>No.</td>
				<td>Jenis Kelamin</td>
				<td>Jumlah Pegawai</td>
			</tr>
			</thead>
			<tbody>';

$need = "SELECT count(id_pegawai) as jumlah,jenis_kelamin
			FROM tbl_pegawai 
			GROUP BY jenis_kelamin
			";
			$sql = mysqli_query($link,$need);
$n=1;
While($data3=mysqli_fetch_array($sql)){
	$html.='<tr>
				<td>'.$n.'</td>
				<td>'.jk($data3["jenis_kelamin"]).'</td>
				<td>'.$data3["jumlah"].'</td>				
			</tr>';
			$n++;
}
$html .='</tbody>
		</table>';		
		
echo $html;

?>
