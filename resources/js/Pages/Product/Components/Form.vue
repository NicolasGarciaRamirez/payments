<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const createProductForm = useForm({
    name: '',
    permissions: props.defaultPermissions,
});
const createProduct = () => {
    createProductForm.post(route('products.store'), {
        preserveScroll: true,
        onSuccess: () => {
            displayingToken.value = true;
            createProductForm.reset();
        },
    });
};
</script>
<template>
	<FormSection @submitted="createProduct">
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
					v-model="createProductForm.name"
					type="text"
					class="mt-1 block w-full"
					autofocus
				/>
				<InputError :message="createProductForm.errors.name" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="Price" value="Price" />
				<TextInput
					id="price"
					v-model="createProductForm.price"
					type="text"
					class="mt-1 block w-full"
					autofocus
				/>
				<InputError :message="createProductForm.errors.price" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="description" value="Description" />
				<TextInput
					id="description"
					v-model="createProductForm.description"
					type="text"
					class="mt-1 block w-full"
					autofocus
				/>
				<InputError :message="createProductForm.errors.description" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="time" value="time" />
				<TextInput
					id="time"
					v-model="createProductForm.time"
					type="text"
					class="mt-1 block w-full"
					autofocus
				/>
				<InputError :message="createProductForm.errors.time" class="mt-2" />
			</div>
		</template>

		<template #actions>
			<ActionMessage :on="createProductForm.recentlySuccessful" class="mr-3">
				Created.
			</ActionMessage>

			<PrimaryButton :class="{ 'opacity-25': createProductForm.processing }" :disabled="createProductForm.processing">
				Create
			</PrimaryButton>
		</template>
	</FormSection>
</template>