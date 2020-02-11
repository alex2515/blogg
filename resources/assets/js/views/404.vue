<template>
	<section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Página no encontrada</h1>
			<div class="divider-2" style="margin: 35px 0;"></div>
			<p>Regresar al 
				<!-- <a href="{{ route('pages.home') }}">Inicio</a> -->
				<router-link :to="{ name: 'home' }">Inicio</router-link>
			</p>
		</div>
	</section>
</template>