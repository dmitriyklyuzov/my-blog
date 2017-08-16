@extends('layouts.clean-blog')

@section('title', $post->title)

@section('og-tags')
    @if(isset($post) && $post->image_url!='')
        <meta property="og:image" content="{{url($post->image_url)}}">
    @else
        <meta property="og:image" content="url('/img/home-bg.jpg')">
    @endif
@endsection

@section('header')
    <header class="intro-header" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url({{url($post->image_url)}}); background-size: cover; background-repeat: no-repeat;">
@endsection

@section('site-heading')
    <h1>{{ $post->title }}</h1>
    <h2 class="subheading">{{ $post->subtitle }}</h2>
    <br>
    {{-- <span class="meta">Posted by {{ $post->user->name }} on {{ $post->created_at->format('F d, Y') }}</span> --}}
    <span class="meta">Posted on {{ $post->created_at->format('F d, Y') }}</span>
@endsection

@section('content')

    <article>
        {!!html_entity_decode($post->body)!!}
    </article>

    {{-- Controls --}}
    @if(!Auth::guest())
        @if($post->user_id == Auth::id())
            <div class="row">
                <div class="text-center">
                  <a href="{{ route('posts.edit', ['id'=>$post->id]) }}" class="btn btn-default">Edit</a>
                  <form action="{{ route('posts.destroy', ['id'=>$post->id]) }}" method="post" class="display-inline" onsubmit=" return confirmBeforeDeleting({{ $post->id }}); ">
                        {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" value="Delete" class="btn btn-default">
                  </form>
                </div>
            </div>
        @endif
    @endif

    {{-- Pagination --}}
    <ul class="pager">

        @if(!is_null($newer))
            <li class="previous">
                <a href="{{ route('posts.show', ['id'=>$newer->id]) }}" class="btn btn-default">
                    ← Newer
                </a>
            </li>
        @endif

        @if(!is_null($older))
            <li class="next">
                <a href="{{ route('posts.show', ['id'=>$older->id]) }}" class="btn btn-default">
                    Older →
                </a>
            </li>
        @endif

    </ul>

@endsection

@section('scripts')

    <script>
        function confirmBeforeDeleting(id){
            // if the user does NOT confirm the delete action, this function returns
            var confirmed = confirm("Are you sure you want to delete this post?");
            if(confirmed){
                return true;
            }
            else return false;
            
        }
    </script>

    <script>
        $(document).ready(function(){
            // $('article').children('img').each(function(){ doesn't work
            $('img').each(function(){
                $(this).addClass('img-responsive');

                if($(this).css('float')=='right' || $(this).css('float')=='left' ){
                    $(this).css('padding-bottom', '30px');
                }
            });
        });
    </script>

    @include('../analytics')

@endsection