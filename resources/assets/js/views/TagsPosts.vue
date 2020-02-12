<template>
	<posts-list :posts="posts"></posts-list>
</template>
<script>
	export default {
		props: ['tag'],
		data() {
			return {
				posts: []
			}
		},
		mounted() {
			axios.get(`/api/etiquetas/${this.tag}`)
					.then(res=> {
						this.posts = res.data.data
					})
					.catch(err => {
						console.log(err)
					})
		}
	}
</script>
