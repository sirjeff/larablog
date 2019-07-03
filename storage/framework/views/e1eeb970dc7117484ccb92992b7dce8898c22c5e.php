<?php $__env->startSection('title','All Categories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <h1>All Categories</h1>
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
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($category->id); ?></td>
                            <td><?php echo e($category->name); ?></td>
                            <td><?php echo e(date('M j, Y',strtotime($category->created_at))); ?></td>
                            <td><a href="<?php echo e(route('categories.show', $category->id)); ?>" class="btn btn-sm btn-default">View</a> <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-sm btn-default">Edit</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="text-center">
                <h5>Page <?php echo e($categories->currentPage()); ?> of <?php echo e($categories->lastPage()); ?></h5>
                <?php echo $categories->links();; ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h3 style="margin-top:0">New Category</h3>
                <?php echo Form::open(['route' => 'categories.store', 'method' => 'POST']); ?>

                    <?php echo e(Form::text('name', null, ['class' => 'form-control' ,'placeholder' => 'Category Name'])); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>