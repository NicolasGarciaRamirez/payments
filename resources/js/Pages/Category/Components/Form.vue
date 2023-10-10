<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


defineProps({
	categories: Array
})

const createCategoryForm = useForm({
    name: ''
});

const createCategory = () => {
    createCategoryForm.post(route('Categories.store'), {
        preserveScroll: true,
        onSuccess: () => {
            displayingToken.value = true;
            createCategoryForm.reset();
        },
    });
};
</script>
<template>
	<FormSection @submitted="createCategory">
		<template #title>
			Create category
		</template>

		<template #description>
			Crea todas las categorias que desees para tus productos
		</template>

		<template #form>
			<!-- Token Name -->
			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="name" value="Name" />
				<TextInput
					id="name"
					v-model="createCategoryForm.name"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createCategoryForm.errors.name" class="mt-2" />
			</div>
		</template>

		<template #actions>
			<ActionMessage :on="createCategoryForm.recentlySuccessful" class="mr-3">
				Created.
			</ActionMessage>

			<PrimaryButton :class="{ 'opacity-25': createCategoryForm.processing }" :disabled="createCategoryForm.processing">
				Create
			</PrimaryButton>
		</template>
	</FormSection>
</template>