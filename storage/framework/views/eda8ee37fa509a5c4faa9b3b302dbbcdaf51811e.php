<!doctype html>
<html lang="en">
 <head>
  <?php echo $__env->make('partials/head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </head>
 <body>

  <?php echo $__env->make('partials/nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->yieldContent('hero'); ?>
  <div class="container">
   <?php echo $__env->make('partials/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <?php echo $__env->yieldContent('content'); ?>
   <?php echo $__env->make('partials/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>

  <?php echo $__env->make('partials/javascript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->yieldContent('scripts'); ?>

 </body>
</html>