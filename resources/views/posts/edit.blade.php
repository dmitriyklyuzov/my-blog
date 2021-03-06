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
	<script src="{{ asset('js/tinymceconfig.js') }}"></script>

	{{-- TinyMCE init --}}
	<script>tinymce.init(editor_config);</script>

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