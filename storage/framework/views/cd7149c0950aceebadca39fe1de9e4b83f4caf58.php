<?php $__env->startSection('title','Create New Post'); ?>

<?php $__env->startSection('css'); ?>

  <?php echo Html::style('/css/parsley.css'); ?>

  <?php echo Html::style('/css/select2.min.css'); ?>

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea.tm',
			plugins: 'link code',
			menubar: false
		});
	</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
       <h1>Create New Post</h1>
       <hr>
       
       <?php echo Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true, 'class' => 'form-gap']); ?>

           <?php echo e(Form::label('title','Subject:')); ?>

           <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])); ?>

  
           <?php echo e(Form::label('slug','URL Slug:')); ?>

           <?php echo e(Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minLength' => '5', 'maxlength' => '255'])); ?>

  
           <?php echo e(Form::label('category_id','Category:')); ?>

           <select class="form-control" name="category_id">
               <option value="">Please select a category...</option>
               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value='<?php echo e($category->id); ?>'><?php echo e($category->name); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>

           <?php echo e(Form::label('tags','Tags:')); ?>

           <select class="form-control select2-multi" name="tags[]" multiple="multiple">
               <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value='<?php echo e($tag->id); ?>'><?php echo e($tag->name); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
          
          
           <?php echo e(Form::label('featured_image','Upload Featured Image:')); ?>

           <?php echo e(Form::file('featured_image')); ?>

           
           
           <?php echo e(Form::label('body','Post:')); ?>

           <?php echo e(Form::textarea('body', null, ['class' => 'form-control tm'])); ?>


           <?php echo e(Form::label('summary','Summary:')); ?>

           <?php echo e(Form::textarea('summary', null, ['class' => 'form-control'])); ?>


           <?php echo e(Form::submit('Publish Post', ['class' => 'btn btn-success btn-lg btn-block btn-gap'])); ?>

       <?php echo Form::close(); ?>

    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

  <?php echo Html::script('/js/parsley.min.js'); ?>

  <?php echo Html::script('/js/select2.min.js'); ?>

  
  <script>
      $(document).ready(function(){
          $(".select2-multi").select2();
          $("#title").on('input', function(e) {
              $("#slug").val($(this).val().replace(/-{2,}|_{2,}|[^\w]+/gi, '-').replace(/^-/, '').replace(/-$/, ''));
          });
          $("#title").keypress(function(e){
              $("#slug").val(this.value+String.fromCharCode(e.which).replace(/-{2,}|_{2,}|[^\w]+/gi, '-').replace(/^-/, '').replace(/-$/, ''));
          });
      });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>