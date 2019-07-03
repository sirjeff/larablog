<?php $__env->startSection('title',"$tag->name Tag"); ?>



<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <h1><?php echo e($tag->name); ?> <small>(<?php echo e($tag->posts->count()); ?> posts)</small></h1>
            <hr>
        </div>
        <div class="col-md-2">
            <a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-primary pull-right btn-block btn-gap">Edit</a>
        </div>
        <div class="col-md-2">
            <?php echo Form::open(['route'=>['tags.destroy',$tag->id], 'method'=>'DELETE']); ?>

                <?php echo Form::submit('Delete', ['class'=>'btn btn-danger pull-right btn-block btn-gap']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Used in the following :</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tag->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->id); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td>
                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-default"><?php echo e($tag->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-sm btn-default">View</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>