<template>
	<paginator
		:url="`/api/etiquetas/${this.tag}`"
		component-name="posts-list"
	/>
	<!-- <posts-list :posts="posts"></posts-list> -->
</template>
<script>
	export default {
		props: ['tag']
	}
</script>
