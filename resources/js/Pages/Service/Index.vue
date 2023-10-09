<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Form from './Components/Form.vue';
</script>
<template>
	<AppLayout title="Index Service">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Index Service
            </h2>
        </template>
		<Form class="p-4"></Form>
	</AppLayout>
</template>