<?php $__env->startSection('title', 'Edit Comment'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>
			
			<?php echo e(Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])); ?>

			
				<?php echo e(Form::label('name', 'Name:')); ?>

				<?php echo e(Form::text('name', null, ['class' => 'form-control', 'disabled' => ''])); ?>

			
				<?php echo e(Form::label('email', 'Email:')); ?>

				<?php echo e(Form::text('email', null, ['class' => 'form-control', 'disabled' => ''])); ?>

			
				<?php echo e(Form::label('comment', 'Comment:')); ?>

				<?php echo e(Form::textarea('comment', null, ['class' => 'form-control'])); ?>

			
				<?php echo e(Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;'])); ?>

			
			<?php echo e(Form::close()); ?>

		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>