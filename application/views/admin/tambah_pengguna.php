<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Tambah Pengguna</h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row margin-top-10">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Form Penambahan Pengguna Baru
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?= form_open_multipart('admin/tambah-pengguna', ['class' => 'form-horizontal']) ?>
						<div class="form-body">
							<?= $this->session->flashdata('msg') ?>
							<div class="form-group">
								<label class="col-md-3 control-label">Nama</label>
								<div class="col-md-4">
									<input type="text" required name="nama" class="form-control input-circle">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Kontak</label>
								<div class="col-md-4">
									<input type="text" required name="kontak" class="form-control input-circle">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
								<div class="col-md-4">
									<input type="text" required name="email" class="form-control input-circle">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Password</label>
								<div class="col-md-4">
									<input type="password" required name="password" class="form-control input-circle">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Password Lagi</label>
								<div class="col-md-4">
									<input type="password" required name="rpassword" class="form-control input-circle">
								</div>
							</div>
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
									<button type="submit" name="submit" value="Submit" class="btn btn-circle blue">Submit</button>
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