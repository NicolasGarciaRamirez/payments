<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import TablePlan from './Components/Table.vue'
import Nav from './Components/Nav.vue'
defineProps({
	plans: Array
})
</script>
<template>
	<AppLayout title="Index Plan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Index Plan
            </h2>
        </template>
		<section class="container">
			<Nav></Nav>
			<TablePlan class="p-4" :plans="plans"></TablePlan>
		</section>
	</AppLayout>
</template>