<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Form from './Components/Form.vue';
</script>
<template>
	<AppLayout title="Edit Plan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Plan
            </h2>
        </template>

		<Form></Form>
	</AppLayout>
</template>