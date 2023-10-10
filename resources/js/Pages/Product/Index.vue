<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Table from './Components/Table.vue';
import Nav from './Components/Nav.vue';

defineProps({
	products:Array
})

</script>
<template>
	<AppLayout title="Index Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Index Products
            </h2>
        </template>
		<section class="p-4">
			<Nav />
			<Table :products="products"></Table>
		</section>
	</AppLayout>
</template>