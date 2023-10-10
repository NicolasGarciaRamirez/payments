<script setup>
import { computed } from 'vue';
import { onMounted, ref } from 'vue';
import Modal from '@/Components/Modal.vue'
defineProps({
	showModal:{
		value: false,
		type:Boolean
	}
})

const cart = ref(JSON.parse(localStorage.getItem('cart')) || []);

const removeFromCart = (index) => {
	cart.value.splice(index, 1);
}
const calculateTotal = computed(() => {
	let total = 0
	cart.value.items.map((item)=>{
		total += item.price
	})
	return total;
})

</script>
<template>
	<Modal :show="showModal" @close="showModal = false">
		<div class="flex justify-center py-5">
			<h1>Carrito de Compras</h1>
		</div>

		<div class="bg-white rounded-lg shadow-md p-4 mb-4" v-for="(item, index) in cart.items" :key="index">
			<div class="flex items-center justify-between">
				<!-- Nombre del producto -->
				<h2 class="text-lg font-semibold">{{ item.name }}</h2>
				<!-- Precio del producto -->
				<p class="text-gray-600">${{ item.price }}</p>
			</div>
			<div class="mt-2">
				<!-- Descripción del producto -->
				<p class="text-sm text-gray-700">{{ item.description }}</p>
			</div>
			<div class="mt-4 flex justify-between items-center">
				<!-- Cantidad del producto -->
				<div class="flex items-center">
				<label for="quantity" class="text-sm font-medium text-gray-700">Cantidad:</label>
				<input
					id="quantity"
					type="number"
					class="ml-2 w-16 border rounded-md py-1 px-2 text-sm text-gray-700"
					value="1"
				/>
				</div>
				<!-- Subtotal del producto -->
				<p class="text-lg font-semibold text-indigo-600">${{calculateTotal}}</p>
			</div>
			<div class="mt-4">
				<!-- Botón para eliminar el producto del carrito -->
				<button class="text-sm font-semibold text-red-500 hover:text-red-700" @click="removeFromCart(index)">
					Eliminar
				</button>
			</div>
		</div>
		<div class="flex justify-center py-5">
			<button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full shadow-md transition duration-300 ease-in-out transform hover:scale-105">
				Pagar Ahora
			</button>
		</div>

	</Modal>
</template>