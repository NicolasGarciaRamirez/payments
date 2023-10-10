<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Form from './Components/Form.vue';

defineProps({
	categories: Array
})
</script>
<template>
	<AppLayout title="Index Categories">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Index Categories
            </h2>
        </template>
		<Form class="p-4" :categories="categories"></Form>
	</AppLayout>
</template>