<?php $__env->startSection('title', '| View Post'); ?>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-8">
			<h1><?php echo e($post->title); ?></h1>
			
			<p class="lead"><?php echo e($post->body); ?></p>

			<hr>
			
			<div class="tags">
				<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<span class="label label-default"><?php echo e($tag->name); ?></span>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small><?php echo e($post->comments()->count()); ?> total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($comment->name); ?></td>
							<td><?php echo e($comment->email); ?></td>
							<td><?php echo e($comment->comment); ?></td>
							<td>
								<a href="<?php echo e(route('comments.edit', $comment->id)); ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="<?php echo e(route('comments.delete', $comment->id)); ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
                <dl class="dl-horizontal">
                    <dt>URL Slug:</dt>
                    <dd><a href="<?php echo e(url('blog/'.$post->slug)); ?>"><?php echo e($post->slug); ?></a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd><p><?php echo e($post->category->name); ?></p></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd><?php echo e(date('M j, Y h:ia', strtotime($post->created_at))); ?></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd><?php echo e(date('M j, Y h:ia', strtotime($post->updated_at))); ?></dd>
                </dl>
				<hr>

               <div class="row">
                    <div class="col-sm-6">
                        <?php echo Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')); ?>

                    </div>
                    <div class="col-sm-6">
                        <?php echo Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-block']); ?>

                        <?php echo Form::close(); ?>

                    </div>
               </div>

               
				<div class="row">
				   <div class="col-sm-12">
                        <?php echo e(Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing btn-gap'])); ?>

                    </div>
				</div>

			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>