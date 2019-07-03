<?php $__env->startSection('title', 'DELETE COMMENT?'); ?>

<?php $__env->startSection('content'); ?>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>DELETE THIS COMMENT?</h1>
			<p>
				<strong>Name:</strong> <?php echo e($comment->name); ?><br>
				<strong>Email:</strong> <?php echo e($comment->email); ?><br>
				<strong>Comment:</strong> <?php echo e($comment->comment); ?>

			</p>

			<?php echo e(Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])); ?>

				<?php echo e(Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger'])); ?>

			<?php echo e(Form::close()); ?>

		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>