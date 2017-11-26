<?php $__env->startSection('title'); ?>
    <?php echo e("Search || " . $tuKhoa); ?>

<?php $__env->stopSection(); ?>

<?php 
    function doimau($str, $tuKhoa){
        
        return str_replace($tuKhoa, "<span style='color:red;'>$tuKhoa</span>", $str);
    }
?>

<?php $__env->startSection('content'); ?>
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row well text-center ">
            <?php if(isset($tuKhoa)): ?>
                <h3>Từ khóa: <strong><?php echo e($tuKhoa); ?></strong></h3>
            <?php else: ?>
                <h4>Không có dữ liệu!</h4>
            <?php endif; ?>
        </div>
        <?php if(isset($posts)): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="row article">
                    <div class="col-xs-12">
                        <div class="block-postMeta postMeta-previewHeader">
                            <div class="u-floatLeft">
                                <div class="postMetaInline-avatar">
                                    <a class="link avatar u-color--link" href="#">
                                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/23032754_1319030634909161_8414838974445845780_n.jpg?oh=ff67e0299b2a3e30c556bac49c904748&oe=5A69004F">
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
                                                <span class="fb-comments-count" data-href="<?php echo e(route('blog.post.detail', [$post->slug])); ?>">0</span>
                                            </a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="<?php echo e(route('blog.post.detail',[$post->slug])); ?>">
                            <h3 class="title"><?php echo doimau($post->title, $tuKhoa); ?></h3>
                        </a>
                        <span>
                            <?php echo doimau($post->description, $tuKhoa); ?>

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