<script setup>
defineProps({
	products:Array
})
</script>
<template>
	<table class="min-w-full divide-y divide-gray-200">
		 <thead>
			<tr>
				<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Name
				</th>
				<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Description
				</th>
				<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Price
				</th>
				<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Stock
				</th>
				<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
					Actions
				</th>
			</tr>
		</thead>
		<tbody class="bg-white divide-y divide-gray-200">
			<!-- Aquí agregar filas de datos -->
			<tr  v-for="product, index in products" :key="index">
				<td class="px-6 py-4 whitespace-nowrap">
					{{ product.name }}
				</td>
				<td class="px-6 py-4 whitespace-nowrap">
					{{ product.description }}
				</td>
				<td class="px-6 py-4 whitespace-nowrap">
					{{ product.price }}
				</td>
				<td class="px-6 py-4 whitespace-nowrap">
					{{ product.stock }}
				</td>
				<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
					<a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
					<a href="#" class="text-red-600 hover:text-red-900 ml-4">Delete</a>
				</td>
			</tr>
			<!-- Agregar más filas según tus datos -->
		</tbody>
	</table>
</template>