<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const createPlanForm = useForm({
	name: '',
	price: '',
	description: '',
	frequency: ''
});
const createPlan = () => {
    createPlanForm.post(route('Plans.store'), {
        preserveScroll: true,
        onSuccess: () => {
            displayingToken.value = true;
            createPlanForm.reset();
        },
    });
};
</script>
<template>
	<FormSection @submitted="createPlan">
		<template #title>
			Create Plan
		</template>

		<template #description>
			Crea todos los planes con el tiempo de frecuencia preestablecido
		</template>

		<template #form>
			<!-- Token Name -->
			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="name" value="Name" />
				<TextInput
					id="name"
					v-model="createPlanForm.name"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createPlanForm.errors.name" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="Price" value="Price" />
				<TextInput
					id="price"
					v-model="createPlanForm.price"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createPlanForm.errors.price" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="description" value="Description" />
				<TextInput
					id="description"
					v-model="createPlanForm.description"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createPlanForm.errors.description" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="time" value="time" />
				<select v-model="createPlanForm.time">
					<option value="Month">Month</option>
					<option value="Year">Year</option>
				</select>
				<InputError :message="createPlanForm.errors.time" class="mt-2" />
			</div>
		</template>

		<template #actions>
			<ActionMessage :on="createPlanForm.recentlySuccessful" class="mr-3">
				Created.
			</ActionMessage>

			<PrimaryButton :class="{ 'opacity-25': createPlanForm.processing }" :disabled="createPlanForm.processing">
				Create
			</PrimaryButton>
		</template>
	</FormSection>
</template>