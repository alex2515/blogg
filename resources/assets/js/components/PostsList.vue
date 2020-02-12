<template>
	<section class="posts container">
	    <!-- @if (isset($title)) -->
	        <!-- <h3>{{ $title }}</h3> -->
	    <!-- @endif -->
	    <!-- @forelse($posts as $post) -->
	    <posts-list-item v-for="post in posts" :post="post" :key="post.id"></posts-list-item>

	    <!-- @empty -->
	        <article class="post" v-if="! posts.length">
	            <div class="content-post">
	                <h1>No hay publicaciones todavía</h1>
	            </div>
	        </article>
	    <!-- @endforelse -->
	</section><!-- fin del div.posts.container -->
	<!-- {{ $posts->appends(request()->all())->links()}} -->
</template>
<script>
	export default {
		props: ['posts']
	}
</script>
