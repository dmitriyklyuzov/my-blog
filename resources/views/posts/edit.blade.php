@extends('layouts.clean-blog')

@section('title', 'Edit a blog post')

@section('site-heading')
	<h1>Edit post</h1>
@endsection

@section('content')

	{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}

		{{ Form::hidden('_method', 'PUT') }}

		<div class="form-group">
			{{ Form::label('title', 'Post Title') }}
			{{ Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Post Title']) }}
		</div>

		<div class="form-group">
			{{ Form::label('subtitle', 'Post Subtitle') }}
			{{ Form::text('subtitle', $post->subtitle, ['class'=>'form-control', 'placeholder'=>'Post Subtitle']) }}
		</div>

		<div class="form-group">
			{{ Form::label('body', 'Post Body') }}
			{{ Form::textarea('body', $post->body, ['id'=>'article-ckeditor', 'class'=>'form-control']) }}
		</div>

		{{-- <div class="form-group">
			{{ Form::label('image', 'Post Image') }}
			{{ Form::text('image', $post->image_url, ['class'=>'form-control']) }}
		</div> --}}

				<div class="form-group">
			{{ Form::label('image', 'Post Image') }}

			<div class="input-group">
			   <span class="input-group-btn">
			     <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
			       <i class="fa fa-picture-o"></i> Change
			     </a>
			   </span>
			   {{ Form::hidden('image', $post->image_url, ['class'=>'form-control'])}}
			 </div>
			 <img id="holder" style="margin-top:15px" class="img-responsive" src="{{ $post->image_url }}">
		</div>

		<br>

		<div class="checkbox">
			<label>
				{{ Form::hidden('published', '0') }}
				{{ Form::checkbox('published', '1', true) }} Published
			</label>
		</div>

		<br>

    	<div class="text-center">
			{{ Form::submit('Save', ['class'=>'btn btn-default']) }}
			<a href="{{ url('/') }}" class="btn btn-default">Close</a>
		</div>

	{!! Form::close() !!}

@endsection

@section('scripts')

	<script src={{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}></script>
	<script src={{ asset('vendor/laravel-filemanager/js/lfm.js') }}></script>

	{{-- TinyMCE Config --}}
	<script>
	  var editor_config = {
	    menubar: false,
	    branding: false,
	    height: 500,
	    image_dimensions: false,
	    image_description: false,
	    path_absolute : "/",
	    selector: "textarea",
	    plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
	    relative_urls: false,
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	  };

	  tinymce.init(editor_config);
	</script>

	{{-- Enabling post thumbnail picker --}}
	<script>$('#lfm').filemanager('image');</script>

	{{-- CKEditor --}}
	{{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var options = {
		    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
		    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
		    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
		    disallowedContent : 'img{width,height}'
		  };
        CKEDITOR.replace( 'article-ckeditor', options );
    </script> --}}
@endsection