@extends('main')

@section('title','Create New Post')

@section('css')

  {!! Html::style('/css/parsley.css') !!}
  {!! Html::style('/css/select2.min.css') !!}

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
           {{ Form::textarea('body', null, ['class' => 'form-control', "id" => 'richtext_postadd']) }}

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
          $(".select2-multi").select2();// fancy select fields
          $("#title").on('input', function(e) {
              $("#slug").val(
                $(this).val()
                  .toLowerCase()
                  .replace(/_{2,}|[^\w-]+/gi, '_')
                  .replace(/^_+|_+$/g, '')
              )
          })
          $("#title").keypress(function(e){//update the slug from title
              $("#slug").val(
                (this.value+String.fromCharCode(e.which))
                  .toLowerCase()
                  .replace(/_{2,}|[^\w-]+/gi, '_')
                  .replace(/^_+|_+$/g, '')
              )
          })
      })

    //https://alex-d.github.io/Trumbowyg/documentation/
    $('#richtext_postadd').trumbowyg({
      btns: [
          ['viewHTML'],
          ['undo', 'redo'], // Only supported in Blink browsers
          ['formatting'],
          ['strong', 'em', 'del', 'underline', 'preformatted'],
          ['superscript', 'subscript'],
          ['link'],
          ['insertImage'],
          ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
          ['unorderedList', 'orderedList'],
          ['horizontalRule'],
          ['removeformat'],
          ['fullscreen']
      ]
    });

  </script>
@endsection

