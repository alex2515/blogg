<style>
.overlay{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    position: absolute;
    color: white;
    font-size: 30px;
    background-color: rgba(0,0,0, .7);
}
.gallery-photos{
    overflow: hidden;
}
</style>
@extends('layout')
@section('content')
    <section class="posts container">
        @if (isset($title))
            <h3>{{ $title }}</h3>
        @endif
        @forelse($posts as $post)
            <article class="post">
                @include( $post->viewType('home') )
                <div class="content-post">
                    @include('posts.header')
                    <h1>{{ $post->title }}</h1>
                    <div class="divider"></div>
                    <p>{{ $post->excerpt }}</p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">read more</a>
                        </div>
                        @include('posts.tags')
                    </footer>
                </div>
            </article>
        @empty
            <article class="post">
                <div class="content-post">
                    <h1>No hay publicaciones todavía</h1>
                </div>
            </article>
        @endforelse
    </section><!-- fin del div.posts.container -->    
    {{ $posts->appends(request()->all())->links() }}
{{--     <div class="pagination">
        <ul class="list-unstyled container-flex space-center">
            <li><a href="#" class="pagination-active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div> --}}
@stop

