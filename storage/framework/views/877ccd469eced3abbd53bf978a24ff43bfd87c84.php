<?php $__env->startSection('title'); ?>
	<?php if(isset($post->title)): ?> <?php echo e($post->title); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>


<meta property="og:url"           content="<?php echo e(url()->current()); ?>" />
<meta property="og:type"          content="" />
<meta property="og:title"         content="<?php if($post): ?> <?php echo e($post->title); ?> <?php endif; ?>" />
<meta property="og:description"   content="<?php if($post): ?> <?php echo e($post->description); ?> <?php endif; ?>" />
<meta property="og:image"         content="http://android.coloawap.net/wp-content/uploads/2014/01/710.png" />


<?php $__env->startSection('content'); ?>
	<?php if(isset($post)): ?>
		<div class="col-xs-12 col-sm-8 col-md-8">
		    <div class="post-detail-box">
		    	<div class="detail-post-info">
			        <div class="block-postMeta postMeta-previewHeader">
			            <div class="u-floatLeft">
			                <div class="postMetaInline-avatar">
			                    <a class="link avatar u-color--link" href="#">
			                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="<?php echo e($post->author['avatar']); ?>">
			                    </a>
			                </div>
			                <div class="postMetaInline-feedSummary">
			                    <a class="link link--darken link--accent u-accentColor--textNormal u-accentColor--textDarken u-color--link user-link" href="<?php echo e(route('user.detail',$post->author['id'])); ?>">
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
			    <div class="detail-post-headding">
			    	<h1 class="title"><?php echo e($post->title); ?></h1>
			    	<div class="detail-post-description">
			    		<blockquote><p><i><?php echo e($post->description); ?></i></p></blockquote>
			    	</div>
			    </div>
			   
		    	<div class="content-post">
		    		<?php echo $post->content; ?>

		    	</div>
		    	<div class="share-post">
			    	<div class="share">
			    		<h3 class="sd-title">Chia sẻ</h3>
			    		<ul class="social-network social-circle">
			    			
			    			<li>
			    				<div class="fb-share-button" data-href="<?php echo e(url()->current()); ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2F&amp;src=sdkpreparse">Share</a></div>
			    			</li>
			    			
			    		</ul>
			    	</div>
			    	<div class="share">
			    		<h3 class="sd-title">
			    			Tags:
			    			<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    				<a href="<?php echo e(url('blog/tag/'.$tag->id.'/'.$tag->slug )); ?>" class="tag">
			    					<span><?php echo e($tag->name); ?></span>
			    				</a>
			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    		</h3>
			    	</div>
			    	<div class="share">
			    		<div class="author-info">
			    			<div class="author-avatar">
			    				<img src="<?php echo e($post->author['avatar']); ?>" class="avatar avatar-96 photo im-responsive" style="max-width: 100px;">
			    			</div>
			    			<div class="author-description">
			    				<h3 class="author-title">
			    					<a href="#" class="author-link"><?php echo e($post->author['name']); ?></a>
			    				</h3>
			    				<p><?php echo e($post->author['email']); ?></p>
			    				<div class="icon-social-follow">
									<div class="fb-follow" data-href="https://www.facebook.com/nguyenmanh1997" data-layout="button_count" data-size="small" data-show-faces="true"></div>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="clearfix"></div>
			    	<div class="share" id="comments">
			    		<div class="fb-comments" data-href="<?php echo e(url()->current()); ?>" data-width="100%" data-numposts="5"></div>
			    	</div>
			    </div>
		    </div>
		</div>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebarRight'); ?>
    <?php echo $__env->make('blog.layouts.sidebarRight', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blog.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>