<?php $__env->startSection('title'); ?>
    <?php echo e("tag || " . $tag->name); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row well text-center "><h3>Tag: <strong><?php echo e($tag->name); ?></strong></h3></div>
        <?php if(isset($posts)): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="row article">
                    <div class="col-xs-12">
                        <div class="block-postMeta postMeta-previewHeader">
                            <div class="u-floatLeft">
                                <div class="postMetaInline-avatar">
                                    <a class="link avatar u-color--link" href="#">
                                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="<?php echo e($post->author['avatar']); ?>">
                                    </a>
                                </div>
                                <div class="postMetaInline-feedSummary">
                                    <a class="link link link--darken link--accent u-accentColor--textNormal u-accentColor--textDarken u-color--link" href="#">
                                        <?php echo e($post->author['name']); ?>

                                    </a>
                                    <span class="POSTMETAINLINE postMetaInline--supplemental">
                                        <?php echo e($post->created_at->diffForHumans()); ?>

                                        <div class="view_count">
                                            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo e($post->view_count); ?>

                                        </div>
                                        <div class="comment_count">
                                            <a href="<?php echo e(route('blog.post.detail', [$post->slug])); ?>#comments">
                                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                <span class="fb-comments-count" data-href="<?php echo e(url()->current()); ?>">0</span>
                                            </a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($post->thumbnail): ?>
                        <div class="col-xs-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img src="<?php echo e($post->thumbnail); ?>" style="min-width: 100%; max-width: 100%;" alt="<?php echo e($post->title); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xs-12">
                        <a href="<?php echo e(route('blog.post.detail',[$post->slug])); ?>">
                            <h3 class="title"><?php echo e($post->title); ?></h3>
                        </a>
                        <span>
                            <?php echo e(\Illuminate\Support\Str::words($post->description , 30, ' ...')); ?>

                            <a href="<?php echo e(route('blog.post.detail',[$post->slug])); ?>"> Xem thêm</a>
                        </span>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center">
                <?php echo e($posts->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebarRight'); ?>
    <?php echo $__env->make('blog.layouts.sidebarRight', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('blog.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>