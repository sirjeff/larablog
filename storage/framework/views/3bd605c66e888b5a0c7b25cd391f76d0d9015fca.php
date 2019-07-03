<?php $__env->startSection('title', 'Forgot my Password'); ?>
<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="card-header">Reset Password</div>

				<div class="card-body">
				<?php if(session('status')): ?>
					<div class="alert alert-success">
						<?php echo e(session('status')); ?>

					</div>
				<?php endif; ?>
					
					<?php echo Form::open(['url' => 'password/email', 'method' => "POST"]); ?>


					<?php echo e(Form::label('email', 'Email Address:')); ?>

					<?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>


					<?php echo e(Form::submit('Reset Password', ['class' => 'btn btn-primary btn-gap'])); ?>


					<?php echo e(Form::close()); ?>


				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>