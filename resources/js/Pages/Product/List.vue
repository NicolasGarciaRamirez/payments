<script setup>
import Swal from 'sweetalert2'

defineProps({
	categories:Array
})

const addToCart = (newItem) => {
	// Obtengo el carrito actual en local
	 let currentCart = JSON.parse(localStorage.getItem('cart')) || { items: [] };
	// Agrego el nuevo elemento al carrito
	currentCart.items.push(newItem);
	// Guardo el carrito actualizado en local
	localStorage.setItem('cart', JSON.stringify(currentCart));
	Swal.fire('Success', 'Se ha agregado correctamente el producto al carrito', 'success')

}
</script>
<template>
	<div class="container mx-auto mt-8">
		<div class="bg-white">
			<h2 class="text-2xl font-semibold mb-4 ">Productos por Categoría</h2>
			<div v-for="(category, index) in categories" :key="index" class="border rounded-lg p-4 hover:shadow-lg">
				<h3 class="text-lg font-semibold bg-gray">{{ category.name }}</h3>
				<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
					<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
						<a v-for="product in category.products" :key="product.id" :href="product.href" class="group">
							<div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
								<img :src="product.image" :alt="product.imageAlt" class="h-full w-full object-cover object-center group-hover:opacity-75" />
							</div>
							<h3 class="mt-4 text-sm text-gray-700">{{ product.name }}</h3>
							<p class="mt-1 text-lg font-medium text-gray-900">${{ product.price }}</p>
							<span><b>Stock:</b>{{ product.stock }}</span>
							<button class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md ml-2" @click="addToCart(product)">
								Agregar al carrito
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>
  	</div>
</template>