<template>
	<div id="disqus_thread"></div>
</template>
<script>
	export default {
		mounted() { // para que se actualice en todos los posts
			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://zendero.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
		}
	}
</script>
