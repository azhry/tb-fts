<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Dashboard Peramalan Penderita TB</h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb hide">
				<li>
					<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Dashboard
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
	  <div class="row margin-top-10">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Konfigurasi Peramalan Fuzzy Time Series 
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?= form_open_multipart('admin/hasil_peramalan_fts', ['class' => 'form-horizontal']) ?>
						<div class="form-body">
							<!-- <div class="form-group">
								<label class="col-md-3 control-label">D1</label>
								<div class="col-md-4">
									<input type="number" required name="d1" class="form-control input-circle">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">D2</label>
								<div class="col-md-4">
									<input type="number" required name="d2" class="form-control input-circle">
								</div>
							</div> -->
							<div class="form-group">
								<label class="col-md-3 control-label">Kota / Kabupaten</label>
								<div class="col-md-4">
									<select required class="form-control input-circle" name="id_kota_kabupaten">
										<option value="">Pilih Kota / Kabupaten</option>
										<?php foreach ($kota as $row): ?>
											<option value="<?= $row->id_kota_kabupaten ?>"><?= $row->kota_kabupaten ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" name="submit" value="Submit" class="btn btn-danger">Mulai Peramalan Fuzzy Time Series </button>
								</div>
							</div>
						</div>
					<?= form_close() ?>
					<!-- END FORM-->
				</div>
			</div>
		</div>

	</div>
			<!-- END PAGE CONTENT INNER -->
</div>
