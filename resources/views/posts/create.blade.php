@extends('main')

@section('title','Create New Post')

@section('css')

  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea.tm',
			plugins: 'link code fullscreen image',
			menubar: 'view insert',
     file_picker_types: 'file image media',
     images_upload_url: '/upload',
     image_prepend_url: '/',
     image_advtab: true,
     image_class_list: [
      {title: 'Left', value: 'left'},
      {title: 'Right', value: 'right'},
      {title: 'Wrap Text', value: 'wrap'}
     ],
     image_description: true,
     image_title: true,
     image_dimensions: false,
     typeahead_urls: false,
     image_caption: true,
     //convert_urls: false,
     images_upload_handler: function (blobInfo, success, failure) {
     var xhr, formData;
     xhr = new XMLHttpRequest();
     xhr.withCredentials = false;
     xhr.open('POST', '/upload');
     var token = '{{ csrf_token() }}';
     xhr.setRequestHeader("X-CSRF-Token", token);
     xhr.onload = function() {
      var json;
      if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
      }
      json = JSON.parse(xhr.responseText);
  
      if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
      }
      success(json.location);
     };
     formData = new FormData();
     formData.append('file', blobInfo.blob(), blobInfo.filename());
     xhr.send(formData);
     },
		});
	</script>

@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
       <h1>Create New Post</h1>
       <hr>
       
       {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true, 'class' => 'form-gap']) !!}
           {{ Form::label('title','Subject:') }}
           {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
  
           {{ Form::label('slug','URL Slug:') }}
           {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minLength' => '5', 'maxlength' => '255']) }}
  
           {{ Form::label('category_id','Category:') }}
           <select class="form-control" name="category_id">
               <option value="">Please select a category...</option>
               @foreach($categories as $category)
                   <option value='{{ $category->id }}'>{{ $category->name }}</option>
               @endforeach
           </select>

           {{ Form::label('tags','Tags:') }}
           <select class="form-control select2-multi" name="tags[]" multiple="multiple">
               @foreach($tags as $tag)
                   <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
               @endforeach
           </select>
          
           {{ Form::label('featured_image','Upload Featured Image:') }}
           {{ Form::file('featured_image') }}

           {{ Form::label('video','Upload optional video:') }}
           {{ Form::file('video') }}

           {{ Form::label('video_sub','Upload video subtitles:') }}
           {{ Form::file('video_sub') }}
           
           
           {{ Form::label('body','Post:') }}
           {{ Form::textarea('body', null, ['class' => 'form-control tm']) }}

           {{ Form::label('summary','Summary:') }}
           {{ Form::textarea('summary', null, ['class' => 'form-control']) }}

           {{ Form::submit('Publish Post', ['class' => 'btn btn-success btn-lg btn-block btn-gap']) }}
       {!! Form::close() !!}
    </div>
</div>



@endsection

@section('scripts')

  {!! Html::script('/js/parsley.min.js') !!}
  {!! Html::script('/js/select2.min.js') !!}
  
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
@endsection

