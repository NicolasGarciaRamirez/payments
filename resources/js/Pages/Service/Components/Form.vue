<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const createServiceForm = useForm({
    name: '',
	price: '',
	description: '',
	time: ''
});
const createService = () => {
    createServiceForm.post(route('Services.store'), {
        preserveScroll: true,
        onSuccess: () => {
            displayingToken.value = true;
            createServiceForm.reset();
        },
    });
};
</script>
<template>
	<FormSection @submitted="createService">
		<template #title>
			Create Service
		</template>

		<template #description>
			Crea todos los servicios con el tiempo de frecuencia preestablecido
		</template>

		<template #form>
			<!-- Token Name -->
			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="name" value="Name" />
				<TextInput
					id="name"
					v-model="createServiceForm.name"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createServiceForm.errors.name" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="Price" value="Price" />
				<TextInput
					id="price"
					v-model="createServiceForm.price"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createServiceForm.errors.price" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="description" value="Description" />
				<TextInput
					id="description"
					v-model="createServiceForm.description"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createServiceForm.errors.description" class="mt-2" />
			</div>
		</template>

		<template #actions>
			<ActionMessage :on="createServiceForm.recentlySuccessful" class="mr-3">
				Created.
			</ActionMessage>

			<PrimaryButton :class="{ 'opacity-25': createServiceForm.processing }" :disabled="createServiceForm.processing">
				Create
			</PrimaryButton>
		</template>
	</FormSection>
</template>