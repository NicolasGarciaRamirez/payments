<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Table from './Components/Table.vue';
import Nav from '../Service/Components/nav.vue';
defineProps({
	categories:Array
})
</script>
<template>
	<AppLayout title="Categories">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>
		<section>
			<Nav></Nav>
			<Table :categories="categories"></Table>
		</section>
	</AppLayout>
</template>
