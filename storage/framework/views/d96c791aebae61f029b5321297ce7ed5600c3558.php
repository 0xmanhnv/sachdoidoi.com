<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="<?php echo e(asset('blog_assets/favicon.png')); ?>" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('blog_assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('blog_assets/css/style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('blog_assets/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('blog_assets/css/customer.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('blog_assets/css/loader.css')); ?>">
        
        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div id="loader">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="lading"></div>
                </div>
            </div>
        </div>
        

        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1395641663878197';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <div class="wraper-body">
            <!-- HEADER -->
            <header>
                <div class="container-fluild">
                    <?php if(View::exists('blog.layouts.menu')): ?>
                        <?php echo $__env->make('blog.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                </div>
            </header>
            <!-- END HEADER -->
            <section class="content">
                <div class="container">
                    
                    <?php echo $__env->yieldContent('content'); ?>
                    
                </div>
            </section>

            <footer id="footer">
                <div class="container">
                    <div class="copyrights">
                        © Copyright 2017 | Designed by 
                        <a href="#" style="color:#f35045;">Nguyễn Mạnh</a>
                    </div>
                    <div class="social-ul">
                        
                    </div>
                </div>
            </footer>

            <!-- len dau trang -->
            <a href="#0" class="cd-top cd-is-visible cd-fade-out" title="Lên đầu trang"></a>
        </div>
    </body>
    <!-- jquery -->
    <script type="text/javascript" src="<?php echo e(asset('blog_assets/js/jquery-3.2.1.min.js')); ?>"></script>
    <!-- bootstrap -->
    <script type="text/javascript" src="<?php echo e(asset('blog_assets/js/bootstrap.min.js')); ?>"></script>
    <!-- css custom -->
    <script type="text/javascript" src="<?php echo e(asset('blog_assets/js/customer.js')); ?>"></script>
    <script type="text/javascript">
        $(function(){
            
            $("#loader").fadeOut(1000);
            $('.wraper-body').fadeIn( 2000);
        });
    </script>
    
    <?php echo $__env->yieldContent('script'); ?>
</html>