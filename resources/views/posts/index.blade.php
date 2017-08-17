@extends('layouts.clean-blog')

@section('title', "Dmitriy's blog")

@section('og-tags')
    <meta property="og:image" content="url('/img/home-bg.jpg')">
@endsection

@section('site-heading')
	<h1>{{$title}}</h1>
    <hr class="small">
    <span class="subheading">A little bit of everything</span>
@endsection

@section('content')

	@if(count($posts)>0)
		
		@php
        	$counter = 1;
        	$length = count($posts);
        @endphp

        @foreach($posts as $post)
        
		<div class="post-preview">
            <a href="{{ route('posts.show', ['id'=>$post->id]) }}">
                <h2 class="post-title">
                    {{ $post->title }}
                </h2>
                {{-- <h3 class="post-subtitle">
                    {{ $post->subtitle }}
                </h3> --}}
                <img src="{{$post->image_url}}" class='img-responsive' alt="">
                <span class="meta">Posted on {{ $post->created_at->format('F d, Y') }}</span>
            </a>
            {{-- <p class="post-meta">Posted by {{ $post->user->name }} on {{ $post->created_at->format('F d, Y') }}</p> --}}
            {{-- <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p> --}}
        </div>
            @if($counter<$length)
                <hr>
                @php $counter++; @endphp
            @endif
    	@endforeach
    @else
        <div class="post-preview">
            {{-- <h2 class="post-title">{{ $user->name }} doesn't have any posts yet.</h2> --}}
        </div>
    @endif

@endsection

@section('scripts')
    @include('../analytics')
@endsection