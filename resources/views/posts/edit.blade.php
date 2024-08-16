@extends('main')
@section('title','Edit Post')

@section('css')
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
        <h1>Edit Post</h1>
        <hr>
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Subject:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('slug', 'URL Slug:') }}
            {{ Form::text('slug', null, ["class" => 'form-control']) }}
            
            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', "placeholder" => "Please select a category..."]) }}

            {{ Form::label('tags', 'Tags:') }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

            {{ Form::label('featured_image', 'Update Featured Image:') }}
            {{ Form::file('featured_image') }}
            <div>
                <img src="{{ asset('images/thumb/' . $post->image) }}" alt="{{$post->image}}" class="img-thumbnail">
                <i class="show">current image</i>
            </div>
            
            {{ Form::label('video','Optional video:') }}
            <p>Current file: {{ $post->video }}</p>
            {{ Form::file('video') }}
           
           {{ Form::label('video_sub','Video subtitles:') }}
            <p>Current file: {{ $post->video_sub }}</p>
           {{ Form::file('video_sub') }}
           
                    
            {{ Form::label('body', 'Post:') }}
            {{ Form::textarea('body', null, ["class" => 'form-control tm']) }}
            
            {{ Form::label('summary','Summary:') }}
            {{ Form::textarea('summary', null, ['class' => 'form-control']) }}
           
            {{ Form::label('featured', 'Featured Post?:') }}
            {{ Form::checkbox("featured", null, null, ["class" => "form-group"]) }}
            <br>
            {{ Form::label('sticky', 'Pin post?:') }}
            {{ Form::checkbox("sticky", null, null, ["class" => "form-group"]) }}

        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
               <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}
                    </div>
               </div>

               <div class="row">
                    <div class="col-sm-12">
                        {{ Html::linkRoute('posts.index', '<< Back to All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing btn-gap']) }}
                    </div>
               </div>
               
               
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection


@section('scripts')
  {!! Html::script('/js/select2.min.js') !!}
  <script>
      $(document).ready(function(){
          $(".select2-multi").select2();
      });
  </script>
@endsection