<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Akurasi Peramalan</h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row margin-top-10">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey-cascade">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th style="text-align: center;">
									Tahun
								</th>
								<th style="text-align: center;">
									Kota
								</th>
								<th style="text-align: center;">
									Jumlah Penderita
								</th>
								<th style="text-align: center;">
									Peramalan
								</th>
								<th style="text-align: center;">
									MSE
								</th>
								<th style="text-align: center;">
									MAPE
								</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$total_akurasi = [];
								$hasil_mape = [];
								$hasil_mse = [];
							?>
							<?php foreach ($record as $row): ?>
								<tr class="odd gradeX">
									<td>
										<?= $row->tahun ?>
									</td>
									<td>
										<?php 
											$kota = $this->kota_kabupaten_m->get_row(['id_kota_kabupaten' => $row->id_kota_kabupaten]);
											echo isset($kota) ? $kota->kota_kabupaten : '-';
										?>
									</td>
									<td>
										<?= $row->aktual ?>
									</td>
									<td>
										<?= $row->ramal ?>
									</td>
									<td>
										<?= $row->mse ?>
									</td>
									<td>
										<?= $row->mape . '%' ?>
									</td>
								</tr>
								<?php  
									$total_akurasi []= abs($row->aktual - $row->ramal);
									$hasil_mse []= $row->mse;
									$hasil_mape []= $row->mape;
								?>
							<?php endforeach; ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-md-3">
							<h3>Akurasi: <?= array_sum($total_akurasi) / count($total_akurasi) ?></h3> 
						</div>
						<div class="col-md-5">
							<h3>Hasil MAPE: <?= array_sum($hasil_mape) / count($hasil_mape) ?>%</h3> 
						</div>
						<div class="col-md-3">
							<h3>Hasil MSE: <?= array_sum($hasil_mse) / count($hasil_mse) ?></h3> 
						</div>
					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>