<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Dashboard</h1>
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
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<a href="<?= base_url('admin/daftar-pengguna') ?>">
							<div class="display">
								<div class="number">
									<h3 class="font-green-sharp"><?= count($pengguna) ?></h3>
									<small>Daftar Pengguna</small>
								</div>
								<div class="icon">
									<i class="icon-list"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<a href="<?= base_url('admin/daftar-kota') ?>">
							<div class="display">
								<div class="number">
									<h3 class="font-green-sharp"><?= count($kota) ?></h3>
									<small>Daftar Kota/Kabupaten</small>
								</div>
								<div class="icon">
									<i class="icon-list"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<a href="<?= base_url('admin/dashboard-fts') ?>">
							<div class="display">
								<div class="number">
									<h3 class="font-green-sharp">-</h3>
									<small>Dashboard FTS</small>
								</div>
								<div class="icon">
									<i class="icon-list"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<a href="<?= base_url('admin/daftar_penderita') ?>">
							<div class="display">
								<div class="number">
									<h3 class="font-green-sharp"><?= count($kota) ?></h3>
									<small>Data penderita TB</small>
								</div>
								<div class="icon">
									<i class="icon-list"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>