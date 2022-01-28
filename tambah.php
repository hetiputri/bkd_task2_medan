<form name="frm" id="frm" action="tambah_data.php" method="post">
  <h3 style="text-align: left;">TAMBAH DATA PEGAWAI</h3>
       <table border="0px" cellspacing='0' cellpadding='0' width='100%'>
            <tr>
                <td width='25%'><label>Nama</label></td>
                <td width='75%'><input type="text" name="nama" id="nama" class="form-control" /></td>
			</tr>
			<tr>
				<td width='25%'><label>Usia</label></td>
                <td width='75%'><input type="text" name="usia" id="usia" class="form-control" /></td>	
			</tr>
			<tr>
                <td width='25%'><label>Jenis Kelamin</label></td>
                <td width='75%'>
					<select name="jk" id="jk" class="form-control">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width='25%'><label>Pangkat/Golongan Ruang</label></td>
                <td width='75%'>
					<select name="id_pangkat" id="id_pangkat" class="form-control">
						<?php
						include("koneksi.php");
						$sql = mysqli_query($link,"SELECT * FROM ref_pangkat ORDER BY id_pangkat ASC");
						While($dat = mysqli_fetch_array($sql)){
							echo("<option value='".$dat["id_pangkat"]."'>".$dat["pangkat"]."</option>");
						}
						?>
					</select>
				</td>
			</tr>
            <tr>
				<td>
					<button type="submit">Simpan</button>
					
				</td>
			</tr>
        </table>
</form>


