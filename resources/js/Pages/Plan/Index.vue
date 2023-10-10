<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Form from './Components/Form.vue';
import TablePlan from './Components/TablePlan.vue'

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
		
		<Form class="p-4"></Form>
		<TablePlan class="p-4" :plans="plans"></TablePlan>
	</AppLayout>
</template>