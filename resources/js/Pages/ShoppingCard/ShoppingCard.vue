<script setup>
import { computed } from '@vue/reactivity';
import { onMounted } from 'vue';

const card = ref();

const removeFromCart = (index) => {
	cart.value.splice(index, 1);
}
const calculateTotal = computed(() => {
	return cart.value.reduce((total, product) => total + product.price, 0);
})

onMounted(() => {
	cart.value = JSON.parse(localStorage.getItem('cart')) || [];
})

</script>
<template>
	<div>
		<h1>Carrito de Compras</h1>

		<!-- Lista de items en el carrito -->
		<ul>
			<li v-for="(items, index) in cart" :key="index">
				{{ items.name }} - ${{ items.price }}
				<button @click="removeFromCart(index)">Eliminar</button>
			</li>
		</ul>

		<!-- Total del carrito -->
		<div>
			Total: ${{ calculateTotal() }}
		</div>
	</div>
</template>