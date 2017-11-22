<?php $__env->startSection('head'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin_assets/css/datatables/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa fa-newspaper-o"></i> LIST USERS
						</h3>
					</div>
					<div class="box-body">
						<div >
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-hover" id="users-table">
											<thead>
								              <tr>
								                <th class="text-center">#</th>
								                <th class="text-center">Username</th>
								                <th class="name">Name</th>
								                <th class="text-center">Ngày đăng ký</th>
								                <th class="text-center">Trạng thái</th>
								                
								                <th class="text-center">Hành động</th>
								              </tr>
								            </thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main row -->
	</section>
	<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/datatables/jquery.dataTables.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/datatables/dataTables.bootstrap.min.js')); ?>"></script>
	<script type="text/javascript">
	    $(function () {
	    	// $('#posts-table').css('width', '100%');
			$('#users-table').DataTable( {
				processing: true,
				serverSide: true,
				responsive:true,
				"ajax": {
					url : '<?php echo route('admin.users.json.listUser'); ?>',
				},
				"columns": [
					{ "data": "id"},
					{ "data": "username"},
					{ "data": "name"},
					{ "data": "created_at" },
					{"data": "status"},
					// {"data": "is_admin"},
					{ "data": "action", orderable: false, searchable: false}
				]
			} );
	    });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>