<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Table from './Components/Table.vue';
import Nav from './Components/nav.vue';
</script>
<template>
	<AppLayout title="Index Service">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Index Service
            </h2>
        </template>
		<section class="container">
			<Nav></Nav>
			<Table></Table>
		</section>
	</AppLayout>
</template>