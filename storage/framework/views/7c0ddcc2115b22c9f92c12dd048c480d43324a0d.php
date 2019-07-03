<?php $__env->startSection('title', "Sign-in"); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Sign-in</h1>
            <p class="lead">
            Sign-in to access the admin features of the Figured Blog.
            <br>If you do not have an account, please <a href="/auth/register">register here</a> first.
            </p>
            <?php echo Form::open(); ?>

                <?php echo Form::label('email', 'Email:'); ?>

                <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

                <?php echo Form::label('password', 'Password:'); ?>

                <?php echo Form::password('password', ['class' => 'form-control']); ?>

                
                <?php echo Form::checkbox('remember'); ?><?php echo Form::label('remember', 'Remember Me:'); ?>

                
                <?php echo Form::submit('Sign-in', ['class' => 'btn btn-success btn-block btn-gap']); ?>

                <p><a href="<?php echo e(url('password/reset')); ?>">forgot password?</a></p>
            <?php echo Form::close(); ?>

            

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>