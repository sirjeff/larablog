<?php $__env->startSection('title','Homepage'); ?>

<?php $__env->startSection('hero'); ?>
  <div class="container-fluid hero-cover">
        <div class="jumbotron">
            <h1>Figured Blog</h1>
            <p class="lead">Stay up-to-date with the latest news and information from our internal soclial media teams, and join in the conversation.</p>
            <!--// p><a class="btn btn-primary btn-lg" href="#" role="button">Latest Post</a></p //-->
        </div>
  </div>
<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-md-8">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post">
            <h3><?php echo e($post->title); ?></h3>
            <p><?php echo e(substr($post->body, 0, 350)); ?><?php echo e(strlen($post->body) > 350 ? "..." : ""); ?></p>
            <a href="<?php echo e(url('blog/'.$post->slug)); ?>" class="btn btn-primary">more...</a>
        </div>
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
     </div>


    <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>