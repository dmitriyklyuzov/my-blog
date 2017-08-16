@extends('layouts.clean-blog-template')

@section('title', 'Lara 5 Blog')

@section('og-tags')
    <meta property="og:image" content="url('/img/home-bg.jpg')">
@endsection

@section('site-heading')
	<h1>Lara 5 Blog</h1>
	<hr class="small">
	<span class="subheading">A Blog Built Using Laravel 5.4 and Clean Blog Theme by Start Bootstrap</span>
@endsection

@section('content')
	{{-- <div class="container"> --}}
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            	@foreach($posts as $post)
				
				<div class="post-preview">
                    <a href="{{ route('posts.show', ['id'=>$post->id]) }}">
                        {{-- @if(isset($post) && $post->image_url!='')
                        <img src="{{ $post->image_url }}" alt="" class="img-responsive">
                        @endif --}}
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->subtitle }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by {{ $post->user->name }} on {{ $post->created_at->format('F d, Y') }}</p>
                    {{-- <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p> --}}
                </div>
                <hr>


            	@endforeach

            </div> {{-- col-lg-8 --}}
        </div> {{-- row --}}
    {{-- </div> container --}}
@endsection