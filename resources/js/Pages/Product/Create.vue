<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Form from './Components/Form.vue';
import Nav from './Components/Nav.vue';
defineProps({
	categories:Array
})
</script>
<template>
	<AppLayout title="Create Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Product
            </h2>
        </template>
		<section class="p-4">
			<Nav></Nav>
			<Form :categories="categories"></Form>
		</section>
	</AppLayout>
</template>