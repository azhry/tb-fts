<div class="page-content">
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<?= $this->session->flashdata('msg') ?>
		<div class="page-title">
			<h1><?= $nama_kota ?></h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- BEGIN PAGE HEAD -->
	 <div class="row margin-top-10">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Data Penderita TB
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label">Kota / Kabupaten</label>
								<div class="col-md-4">
									<select required id="id_kota" class="form-control input-circle" name="id_kota_kabupaten">
										<option value="">Pilih Kota / Kabupaten</option>
										<?php foreach ($kota as $row): ?>
											<option value="<?= $row->id_kota_kabupaten ?>"><?= $row->kota_kabupaten ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<button  id="do" name="submit" class="btn btn-success">Pilih Kota Penderita TB</button>
							</div>

						</div>
					<!-- END FORM-->
				</div>
			</div>
		</div>

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
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<?php 
									    $id = $id_kota;
									?>
									<a href="<?= base_url()?>admin/tambah_data_penderita/<?= $id ?>" id="sample_editable_1_new" class="btn green">
									Add New <i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th style="text-align: center;">
									Tahun
								</th>
								<th style="text-align: center;">
									Jumlah
								</th>
								<th width="200" style="text-align: center;">
									Aksi
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($penderita as $row): ?>
								<tr class="odd gradeX">
									<td>
										<center><?= $row->tahun ?></center>
									</td>
									<td>
										<center><?= $row->jumlah ?></center>
									</td>
									<td>
										<?= form_open('admin/daftar_penderita/' .$row->id_kota_kabupaten.'/'.$row->id) ?>
										<input type="submit" name="delete" class="btn red" value="Hapus">
										<?= form_close() ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>

<script type="text/javascript" src="<?= base_url('assets/metronic') ?>/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/metronic') ?>/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/metronic') ?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#sample_1').dataTable();
		$("#do").click(function(){
			var id = $("#id_kota").val();
			window.location = '<?= base_url()?>admin/daftar_penderita/'+id;
		});
	});
</script>