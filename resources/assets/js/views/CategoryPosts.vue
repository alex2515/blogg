<template>
	<paginator
		:url="`/api/categorias/${this.category}`"
		component-name="posts-list"
	/>
	<!-- <posts-list :posts="posts"></posts-list> -->
</template>
<script>
	export default {
		props: ['category']
	}
</script>
