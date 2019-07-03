<?php $__env->startSection('title','Edit Post'); ?>

<?php $__env->startSection('css'); ?>
 <?php echo Html::style('/css/select2.min.css'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit Post</h1>
        <hr>
        <?php echo Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']); ?>

        <div class="col-md-8">
            <?php echo e(Form::label('title', 'Subject:')); ?>

            <?php echo e(Form::text('title', null, ["class" => 'form-control input-lg'])); ?>


            <?php echo e(Form::label('slug', 'URL Slug:')); ?>

            <?php echo e(Form::text('slug', null, ["class" => 'form-control'])); ?>

            
            <?php echo e(Form::label('category_id', 'Category:')); ?>

            <?php echo e(Form::select('category_id', $categories, null, ['class' => 'form-control', "placeholder" => "Please select a category..."])); ?>


            <?php echo e(Form::label('tags', 'Tags:')); ?>

            <?php echo e(Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple'])); ?>

            
            <?php echo e(Form::label('body', 'Post:')); ?>

            <?php echo e(Form::textarea('body', null, ["class" => 'form-control'])); ?>

        </div>
        <div class="col-md-4">
            <div class="well">
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
                        <?php echo Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')); ?>

                    </div>
                    <div class="col-sm-6">
                        <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-block'])); ?>

                    </div>
               </div>

               <div class="row">
                    <div class="col-sm-12">
                        <?php echo e(Html::linkRoute('posts.index', '<< Back to All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing btn-gap'])); ?>

                    </div>
               </div>
               
               
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
  <?php echo Html::script('/js/select2.min.js'); ?>

  <script>
      $(document).ready(function(){
          $(".select2-multi").select2();
      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>