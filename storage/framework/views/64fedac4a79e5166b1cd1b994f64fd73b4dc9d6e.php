<!doctype html>
<html lang="en">
 <head>
  <?php echo $__env->make('partials/head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </head>
 <body>

  <?php echo $__env->make('partials/nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->yieldContent('hero'); ?>
  <?php echo $__env->yieldContent('blog_header'); ?>
  <div class="container">
   <div class="stretch">
   <?php echo $__env->make('partials/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
  <?php echo $__env->make('partials/hero_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <?php echo $__env->make('partials/javascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->yieldContent('scripts'); ?>
  
 </body>
</html>