<?php $__env->startSection('title','Homepage'); ?>
<?php $__env->startSection('css'); ?>
  <style>
   nav.navbar{margin-bottom:0px}
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('hero'); ?>
  <div class="container-fluid hero-cover">
        <div class="jumbotron">
            <h1>Figured Blog</h1>
            <p class="lead">Stay up-to-date with the latest news and information from our internal soclial media teams, and join in the conversation.</p>
        </div>
  </div>
<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('content'); ?>
<div class="row top_post">
    <div class="col-md-12">
        <?php $__currentLoopData = $top_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url('blog/'.$post->slug)); ?>">
         
           
             
                 <div class="image_top">
                   <?php if($post->image): ?>
                   <img src="<?php echo e(asset('images/medium/' . $post->image)); ?>" alt="<?php echo e($post->image); ?>">
                   <?php else: ?>
                   <img src="https://omi.nz/bin/rnd/?img&<?php echo e($post->id); ?>" alt="Image not found">
                   <?php endif; ?>
                  </div>
                 <div class="post_body_top">
                     <h3><?php echo e($post->title); ?></h3>
                     <div class="deets">
                         <small class="pub">Published in <?php echo e($post->category->name); ?> @ <?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></small>
                         <?php if($post->comments()->count()>0): ?>
                         <small class="pub">Comments: <?php echo e($post->comments()->count()); ?></small>
                         <?php endif; ?>
                         <small class="pub">Tags: <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><span class="label label-default"><?php echo e($tag->name); ?></span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></small>
                     </div>
                     <article><?php echo $post->summary; ?></article>
                 </div>
                <b class="btn btn-default more">Full story ...</b>

        </a>
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="row">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <?php if(!$loop->first): ?>
      <div class="col-md-4 posts">
          <div class="post">
              <div class="image" style="
                  <?php if($post->image): ?>
                  background-image: url(<?php echo e(asset('images/medium/' . $post->image)); ?>)
                  <?php else: ?>
                  background-image: url(https://omi.nz/bin/rnd/?img&<?php echo e($post->id); ?>)
                  <?php endif; ?>
                  ">
              </div>
              <h3><?php echo e($post->title); ?></h3>
              <small class="pub">Published: <span class="glyphicon glyphicon-time"></span><?php echo e($post->created_at); ?></small>
              <br><small class="pub">Posted in: <?php echo e($post->category->name); ?></small>
              <p><?php echo e(substr(strip_tags($post->body), 0, 300)); ?><?php echo e(strlen(strip_tags($post->body)) > 300 ? "..." : ""); ?></p>
              <a href="<?php echo e(url('blog/'.$post->slug)); ?>" class="btm btn btn-default more">read more...</a>
          </div>
       </div>
     <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="text-center">
     <a href="/blog/archives" class="btn btn-primary archive-link">More blogs on the archive page...</a>
</div>
            
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>