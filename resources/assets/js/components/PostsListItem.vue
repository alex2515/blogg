<template>
	<article class="post">
	    <!-- @include( $post->viewType('home') ) -->

	    <div class="content-post">
	        <!-- @include('posts.header') -->
	    	<post-header :post="post"></post-header>

	        <p v-html="post.excerpt"></p>

	        <footer class="container-flex space-between">
	            <div class="read-more">
	            	<router-link :to="{ name: 'posts_show', params: {url: post.url} }" class="text-uppercase c-green">Leer más</router-link>
	                <!-- <a href="#" class="text-uppercase c-green">Leer más</a> -->
	            </div>
	            <!-- @include('posts.tags') -->
	            <div class="tags container-flex">
	                <!-- @foreach($post->tags as $tag) -->
	                <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
	                	<router-link :to="{ name: 'tags_posts', params: {tag: tag.url} }">#{{ tag.name }}</router-link>
	                </span>
	                <!-- @endforeach -->
	            </div>
	        </footer>
	    </div>
	</article>
</template>
<script>
	export default {
		props: ['post']
	}
</script>