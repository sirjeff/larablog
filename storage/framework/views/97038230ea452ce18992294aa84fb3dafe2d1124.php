<?php $__env->startSection('title', "Register"); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Register</h1>
            <p class="lead">Please fill out the form below to register your account details for the Figured Blog.</p>
            <?php echo Form::open(); ?>


                <?php echo Form::label('name', 'Name:'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>


                <?php echo Form::label('email', 'Email:'); ?>

                <?php echo Form::email('email', null, ['class' => 'form-control']); ?>


                <?php echo Form::label('password', 'Password:'); ?>

                <?php echo Form::password('password', ['class' => 'form-control']); ?>


                <?php echo Form::label('password_confirmation', 'Confrim Password:'); ?>

                <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

                
                
                <?php echo Form::submit('Register', ['class' => 'btn btn-success btn-block btn-gap']); ?>

            <?php echo Form::close(); ?>

            

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>