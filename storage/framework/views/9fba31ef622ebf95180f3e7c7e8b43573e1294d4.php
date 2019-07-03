<?php $__env->startSection('title','All Tags'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <h1>All Tags</h1>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <hr>
     </div>


    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>count</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($tag->id); ?></td>
                            <td><a href="<?php echo e(route('tags.show', $tag->id)); ?>" class="btn btn-sm btn-default"><?php echo e($tag->name); ?></a></td>
                            <td><?php echo e($tag->posts->count()); ?></td>
                            <td><?php echo e(date('M j, Y',strtotime($tag->created_at))); ?></td>
                            <td><a href="<?php echo e(route('tags.show', $tag->id)); ?>" class="btn btn-sm btn-default">View</a> <a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-sm btn-default">Edit</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="text-center">
                <h5>Page <?php echo e($tags->currentPage()); ?> of <?php echo e($tags->lastPage()); ?></h5>
                <?php echo $tags->links();; ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h3 style="margin-top:0">New Tag</h3>
                <?php echo Form::open(['route' => 'tags.store', 'method' => 'POST']); ?>

                    <?php echo e(Form::text('name', null, ['class' => 'form-control' ,'placeholder' => 'Tag Name'])); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>