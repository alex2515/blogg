<template>
	<section class="posts container">
	        <article v-for="post in posts" class="post">
	            <div class="content-post">
	            	<post-header :post="post"></post-header>
	                <p v-html="post.excerpt"></p>
	                <footer class="container-flex space-between">
	                    <div class="read-more">
	                    	<router-link :to="{ name: 'posts_show', params: {url: post.url} }" class="text-uppercase c-green">Leer más</router-link>
	                    </div>
	                    <div class="tags container-flex">
	                        <span class="tag c-gray-1 text-capitalize" v-for="tag in post.tags">
	                        	<a href="#">#{{ tag.name }}</a>
	                        </span>
	                    </div>
	                </footer>
	            </div>
	        </article>
	        <article class="post" v-if="! posts.length">
	            <div class="content-post">
	                <h1>No hay publicaciones todavía</h1>
	            </div>
	        </article>
	</section>
</template>
<script>
	export default {
		data() {
			return {
				posts: []
			}
		},
		mounted() {
			axios.get(`/api/categorias/${this.$route.params.category}`)
				.then(res=> {
					this.posts = res.data.data
				})
				.catch(err => {
					console.log(err)
				})
		}
	}
</script>