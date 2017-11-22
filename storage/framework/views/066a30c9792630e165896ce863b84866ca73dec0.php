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
							<i class="fa fa fa-newspaper-o"></i> LIST POST
						</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-left bottom">
									<a href="<?php echo e(route('admin.posts.create')); ?>" class="btn btn-primary btn-circle">
										<i class="fa fa-plus"></i>Thêm mới
									</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div >
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-hover" id="posts-table">
											<thead>
								              <tr>
								                <th class="text-center">#</th>
								                <th class="text-center">title</th>
								                <th class="text-center">Ngày tạo</th>
								                <th class="text-center">Featured</th>
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
			var table = $('#posts-table').DataTable( {
				processing: true,
				serverSide: true,
				responsive:true,
				"ajax": '<?php echo route('admin.posts.json.listPost'); ?>',
				"columns": [
					{ "data": "id"},
					{ "data": "title"},
					{ "data": "created_at" },
					{"data" : "featured_post" },
					{"data": "status"},
					{ "data": "action", orderable: false, searchable: false}
				]
			} );

			$('#posts-table').on('click', '.delete-post',function(){
				swal({
				  title: "Are you sure?",
				  text: "Nếu bấm chọn xóa, bài viết sẽ bị xóa!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
					    $.ajax({
			    			method: "POST",
			    			url: '<?php echo route('admin.posts.destroyPost' ); ?>',
			    			data: { 
			    				id: $(this).siblings('input[name="id"]').val(), 
			    				_token : $('meta[name="csrf-token"]').attr('content'),
			    				_method : "DELETE"
			    			}
							,
			    			success: function(result){
			    				table.ajax.reload();
			    				swal("Sucess! Bạn đã xóa thành công!", {
							      icon: "success",
							    });
							    $.notify("Bạn đã xóa thành công!","success", {autoHideDelay: 5000 });
					        },
					        error: function(){
					        	aswal("warning! Xóa thất bại!", {
							      icon: "warning",
							    });
					        }
			    		});
					}else{
						$.notify("Hủy thao tác!", {autoHideDelay: 5000 });
					}
				});
		    });
	    });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>