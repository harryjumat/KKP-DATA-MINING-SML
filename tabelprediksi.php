<!DOCTYPE html>
<?php
include "header.php";
include "conn.php";
?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<!--<h6 class="m-0 font-weight-bold text-dark">DataTables Template</h6> -->
	</div>
	<div class="card-body">
		<div>
			<h1 class="h3 mb-2 text-dark">Tabel Prediksi</h1>
			<form method="POST" action="">
				<select name="posisi">
					<option value="" disabled selected hidden>Pilih Posisi</option>
					<?php
					$sql = "SELECT posisi FROM prediksi ORDER BY posisi ASC";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					$result = $stmt->fetchAll();
					$v_posisi = "";
					$v_underscore = "";
					foreach ($result as $k => $v) {
						if ($v['posisi'] != $v_posisi) {
							$v_nospace = explode(" ", $v['posisi']);
							$v_underscore = implode("_", $v_nospace);
							echo "<option value=" . $v_underscore . ">" . $v['posisi'] . "</option>";
							$v_posisi = $v['posisi'];
						}
					}
					?>
				</select>
				<input type="submit" value="Lihat Prediksi" name="submit" class="btn btn-primary" style="margin-bottom: 10px;">	
			</form>
			<a href="olahdansimpan.php"><button class="btn btn-success" style="margin-bottom: 10px;">Olah dan Simpan Prediksi</button></a>
			<?php if(isset($_GET['mess'])): ?>
				<p class="alert alert-success"><?= $_GET['mess'] ?></p>
			<?php endif; ?>
		</div>
		<div>
			<?php
			if (isset($_POST['submit'])) {
				if (isset($_POST['posisi'])) {
			?>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<!--<h6 class="m-0 font-weight-bold text-dark">DataTables Template</h6> -->
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<div id="cetak" style="pointer-events:none;">
									<!-- FORM UNTUK CETAK PDF -->
									<form class="form" style="max-width: none; width: 1005px;">
									<h2 style="color: #0094ff; text-align:center; margin-bottom: 30px;">Hasil Prediksi</h2>
										<h2 style="color: #0094ff; text-align:center; margin-bottom: 30px;"><?php echo $_POST['posisi']; ?></h2>
										<div style="float: right; margin-right:20px; margin-bottom:10px;">
											<?php
											echo gmdate('H:i:s', time() + 68.6 * 60 * 7);
											echo '<br/>';
											echo date('l, d-m-Y');

											?>
										</div>
										<table class="table table-striped" width="100%" cellspacing="0">
											<thead>

												<tr>
													<th>Id</th>
													<th>Nama</th>
													<th>Usia</th>
													<th>Posisi</th>
													<th>Pengalaman</th>
													<th>Lama</th>
													<th>Pendidikan</th>
													<th>Sertifikat</th>
													<th>Prediksi</th>
											</thead>
											<tbody>
												<?php
												$posisi = explode("_", $_POST['posisi']);
												$posisi = implode(" ", $posisi);
												// echo $posisi;
												// echo "</br></br>";
												$sql1 = "SELECT id, nama, usia,  posisi, pengalaman, lama, pendidikan , sertifikat, prediksi FROM prediksi WHERE posisi='$posisi' ORDER BY id ASC";
												$stmt1 = $conn->prepare($sql1);
												$stmt1->execute();
												 //var_dump($stmt1);
												$result1 = $stmt1->fetchAll();
												
												// var_dump($result1);
												if (!empty($result1)) {
												?>
													<?php foreach ($result1 as $v1) :  ?>
														<tr>
														  <td><?= $v1['id']; ?></td>
														  <td><?= $v1['nama']; ?></td>
														  <td><?= $v1['usia']; ?></td>
														  <td><?= $v1['posisi']; ?></td>
														  <td><?= $v1['pengalaman']; ?></td>
														  <td><?= $v1['lama']; ?></td>
														  <td><?= $v1['pendidikan']; ?></td>
														  <td><?= $v1['sertifikat']; ?></td>
														  <td><?= $v1['prediksi']; ?></td>
														</tr>
													  <?php endforeach; ?>
											</tbody>
										</table>
									</form>
								</div>
								<!-- CETAK PDF -->
								<div style="float: right; margin-right:100px; margin-top:40px; margin-bottom:40px;">
									<button style="font-size:16px" id="cetak" class="btn btn-danger" >Cetak PDF <i class="fa fa-file-pdf-o"></i></button>
								</div>
								<script src="vendor/jquery/jquery.min.js"></script>
								<script src="vendor/jquery/pdfmake.min.js"></script>
								<script src="vendor/jquery/html2canvas.min.js"></script>
								<script type="text/javascript">
									$("body").on("click", "#cetak", function() {
										html2canvas($('#cetak')[0], {
											onrendered: function(canvas) {
												var data = canvas.toDataURL();
												var docDefinition = {
													content: [{
														image: data,
														width: 500
													}]
												};
												pdfMake.createPdf(docDefinition).download("Tabel Prediksi.pdf");
											}
										});
									});
								</script>
								<!-- TUTUP CETAK PDF -->
							</div>
						</div>
					</div>
				<?php
												} else {
													echo "<h3>Data kosong atau terhapus!</h3>";
												}
											} else {
				?>
				</br>
				<div class="alert alert-danger">
					<strong>Oops!</strong> Pilih Posisi yang Tersedia.
				</div>


		<?php
											}
										}
		?>
		</div>
	</div>
	<?php
	include "footer.php";
	?>