<div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php if(isset($popularPosts)): ?>
        <div class="panel">
            <div class="panel-heading bg-4 sidebar-heading bg-color">
                <p class="panel-title title sdd-font">XEM NHIỀU NHẤT</p>
            </div>
            <div class="panel-body">
                <?php $__currentLoopData = $popularPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sdd_module_1 line-bottom">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <img style="max-width: 100%;min-height: 50px;max-height: 100%;cursor: pointer;" src="<?php echo e($post->thumbnail); ?>"  class="thumnail">
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <span class="meta-info">
                                    <span><?php echo e($post->created_at->diffForHumans()); ?> / </span>
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span> <?php echo e($post->view_count); ?></span>
                                </span>
                                <h5 class="title">
                                    <a href="<?php echo e(route('blog.post.detail', [$post->slug])); ?>">
                                        <?php echo e($post->title); ?>

                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    
    
     <?php if(isset($categories)): ?>
        <div class="panel panel-custome">
            <div class="panel-heading bg-success">
                <h3 class="panel-title text-center" style="line-height: 30px; font-weight: bold;">
                    DANH MỤC
                </h3>
            </div>
            <div class="panel-body panel-body-custome panel-body-facebook">
                <ul class="list list--withIcon list--withTitleSubtitle">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-item">
                            <button class="button button--circle u-disablePointerEvents">
                                <span class="list-index">
                                    <img src="<?php echo e($category->thumbnail); ?>" class="thumbnail-category">
                                </span>
                            </button>
                            <div class="list-itemInfo">
                                <h4 class="list-itemTitle">
                                    <a href="<?php echo e(route('blog.category.detail', [$category->id, $category->slug])); ?>" class="link  link-custome link--primary u-accentColor--textNormal"> 
                                        <?php echo e($category->name); ?>

                                    </a>
                                </h4>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    

    
    <?php if(isset($tags)): ?> 
        <div class="panel panel-custome">
            <div class="panel-heading bg-info">
                <h3 class="panel-title text-center" style="line-height: 30px; font-weight: bold;">
                    Tags
                </h3>
            </div>
            <div class="panel-body panel-body-custome panel-body-facebook">
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog.tag.show', [$tag->id,$tag->slug])); ?>" class="tag"><?php echo e($tag->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    
</div>