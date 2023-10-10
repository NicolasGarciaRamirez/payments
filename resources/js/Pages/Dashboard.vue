<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import landing from '@/Pages/LandingPage/landing.vue';
import Productlist from '@/Pages/Product/List.vue'
import PlansList from '@/Pages/Plan/List.vue'
import ServiceList from '@/Pages/Service/List.vue'
defineProps({
	categories:Array,
	plans:Array,
	services:Array
})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
			<landing></landing>
			<Productlist :categories="categories"></Productlist>
			<PlansList :plans="plans"></PlansList>
			<ServiceList :services="services"></ServiceList>
        </div>
    </AppLayout>
</template>
