<li class="header">QUẢN LÝ POSTS</li>

<li class="nav-item <?php echo e((Request::is('admin/posts*')) ? 'active open' : ''); ?>">
    <a href="<?php echo e(route('admin.posts.index')); ?>" class="nav-link ">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="title">Posts</span>
    </a>
</li>

<li class="nav-item <?php echo e(Request::is('admin/categories*') ? 'active open' : ''); ?> ">
    <a href="" class="nav-link ">
        <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="title">Categories</span>
    </a>
</li>

<li class="nav-item <?php echo e(Request::is('admin/tags*') ? 'active open' : ''); ?> ">
    <a href="" class="nav-link ">
        <i class="fa fa-tags" aria-hidden="true"></i> <span class="title">Tags</span>
    </a>
</li> 
