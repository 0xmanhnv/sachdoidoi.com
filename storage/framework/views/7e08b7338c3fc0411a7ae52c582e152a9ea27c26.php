<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12 connectedSortable">
				<div class="box box-default">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa fa-newspaper-o"></i> CREATE A POST
						</h3>
					</div>
					<div class="box-body">
						<form action="<?php echo e(route('admin.posts.store')); ?>" method="post">
							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
									  <label for="title-post">Title(<span style="color: red;">*</span>)</label>
									  	<?php if($errors->has('title')): ?>
		                                    <span class="help-block" style="color: red;">
		                                        <strong><?php echo e($errors->first('title')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
									  <input type="text" class="form-control" id="title-post" placeholder="Title .. " name="title" value="<?php echo e(old('title')); ?>">
									</div>
									<div class="form-group">
									  <label for="description-post">Description(<span style="color: red;">*</span>)</label>
									  	<?php if($errors->has('description')): ?>
		                                    <span class="help-block" style="color: red;">
		                                        <strong><?php echo e($errors->first('description')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
									  <textarea class="form-control" rows="5" id="description-post" placeholder="Description ... " name="description"><?php echo e(old('description')); ?></textarea>
									</div>
									<div class="form-group">
										<label for="content-post">Content(<span style="color: red;">*</span>)</label>
										<?php if($errors->has('content')): ?>
		                                    <span class="help-block" style="color: red;">
		                                        <strong><?php echo e($errors->first('content')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
										<textarea class="form-control" cols="50" rows="10" id="content-post" placeholder="Content..." name="content"><?php echo old('content'); ?></textarea>
									</div>
								</div>
								<div class="col-lg-4">
									<!-- STATUS POST-->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-bookmark" aria-hidden="true"></i> STATUS
											</h3>
										</div>
										<div class="box-body">
											<div class="form-group">
												<select class="form-control" id="sel1" name="status">
													<option value="1" <?php if(old('status') != null ): ?> <?php echo e(old('status') == 1 ? 'selected' : ''); ?> <?php endif; ?>>Publish</option>
													<option value="0" <?php if(old('status') != null ): ?> <?php echo e(old('status') == 0 ? 'selected' : ''); ?> <?php endif; ?>>Draft</option>
												</select>
											</div> 
											<div class="form-group">
												<label class="checkbox-inline">
													<input name="is_featured" type="checkbox" value="1" <?php echo e(old('is_featured') == 1 ? 'checked' : ''); ?>> Featured
												</label>
												<div class="pull-right">
													<button type="submit" class="btn btn-primary">PUBLISH</button>
												</div>
											</div>
										</div>
									</div>
									<!-- END STATUS POST -->
									<!-- CATEGORIES -->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-list" aria-hidden="true"></i> CATEGORIES
											</h3>
										</div>
										<div class="box-body">
											<div class="form-group">
												<select class="form-control" id="sel1" name="category_id">
													<?php if(isset($categories)): ?>
														<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($category->id); ?>" <?php echo e($category->id == old('category_id') ? 'selected' : ''); ?>>
																<?php echo e($category->name); ?>

															</option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</select>
											</div> 
										</div>
									</div>
									<!-- END CATEGORIES -->
									<!-- THUMBNAIL -->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-picture-o" aria-hidden="true"></i> THUMBNAIL
											</h3>
										</div>
										<div class="box-body">
											<div class="thumbnail">
												<img src="<?php echo e(old('thumbnail')); ?>" alt="No Image" style="width: 250px; height: 200px;" id="holder">
												<input id="thumbnail" class="form-control" type="hidden" name="thumbnail" style="width: 250px; height: 200px;" value="<?php echo e(old('thumbnail')); ?>">
											</div>
											<button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i>CHOOSE</button>
										</div>
									</div>
									<!-- END THUMBNAIL -->
									<!-- TAGS -->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-tags" aria-hidden="true"></i> TAG
											</h3>
										</div>
										<div class="box-body">
											<div class="form-group">
												<input type="text" class="form-control" name="tags">
											</div>
										</div>
									</div>
									<!-- END TAGS -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Main row -->
	</section>
	<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
	<script>
		Editor('content-post');
		$('#lfm').filemanager('image',  {prefix: "/files"});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>