<?php $titleTag = htmlspecialchars($post->title); ?>
<?php $__env->startSection('title', "$titleTag"); ?>

<?php $__env->startSection('content'); ?>
 
<div class="row">
    <div class="col-md-6">
        <div class="post_image">
          <?php if($post->image): ?>
          <img src="<?php echo e(asset('images/full/' . $post->image)); ?>" alt="<?php echo e($post->image); ?>" width="100%">
          <?php else: ?>
          <img src="https://omi.nz/bin/rnd/?img&<?php echo e($post->id); ?>" alt="Image not found">
          <?php endif; ?>
         </div>
    </div>

    <div class="col-md-6 post_deets">
        <h1><?php echo e($post->title); ?></h1>
        <hr>
        <dl class="dl-horizontal">
            <dt>Author:</dt>
            <dd><?php echo e($post->user->name); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Published in:</dt>
            <dd><?php echo e($post->category->name); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Published date:</dt>
            <dd><?php echo e(date('M j, Y h:ia', strtotime($post->created_at))); ?></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Tags:</dt>
            <dd><?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><span class="label label-default"><?php echo e($tag->name); ?></span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></dd>
        </dl>
    </div>
</div>

<div class="row post_body">
    <div class="col-md-12">
        <p><?php echo $post->body; ?></p>
    </div>
</div>

  <?php if($post->comments()->count()>0): ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  <?php echo e($post->comments()->count()); ?> Comments</h3>
			<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="comment">
					<div class="author-info">

						<img src="<?php echo e("https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid"); ?>" class="author-image" alt="gravatar image">
						<div class="author-name">
							<h4><?php echo e($comment->name); ?></h4>
							<p class="author-time"><?php echo e(date('F nS, Y - g:iA' ,strtotime($comment->created_at))); ?></p>
						</div>
						
					</div>

					<div class="comment-content">
						<?php echo e($comment->comment); ?>

					</div>
					
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
  <?php endif; ?>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
     <hr>
     <h4>Have your say ...</h4>
			<?php echo e(Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])); ?>

				
				<div class="row">
					<div class="col-md-6">
						<?php echo e(Form::label('name', "Name:")); ?>

						<?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

					</div>

					<div class="col-md-6">
						<?php echo e(Form::label('email', 'Email:')); ?>

						<?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

					</div>

					<div class="col-md-12">
						<?php echo e(Form::label('comment', "Comment:")); ?>

						<?php echo e(Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])); ?>


						<?php echo e(Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;'])); ?>

					</div>
				</div>

			<?php echo e(Form::close()); ?>

		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>