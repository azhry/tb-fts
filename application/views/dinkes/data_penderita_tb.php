<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Data Penderita TB</h1>
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
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<a href="<?= base_url('dinkes/tambah-data-penderita') ?>" id="sample_editable_1_new" class="btn green">
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
									Kota / Kabupaten
								</th>
								<th style="text-align: center;">
									Jumlah
								</th>
								<th style="text-align: center;">
									Tahun
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
										<?= $row->kota_kabupaten ?>
									</td>
									<td>
										<?= $row->jumlah ?>
									</td>
									<td>
										<?= $row->tahun ?>
									</td>
									<td>
										<?= form_open('dinkes/data-penderita-tb/' . $row->id) ?>
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
	});
</script>