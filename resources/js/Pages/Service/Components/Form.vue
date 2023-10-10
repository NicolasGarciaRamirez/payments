<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';


const createServiceForm = useForm({
    name: '',
	price: '',
	description: '',
	image: '',
	active: ''
});

const onImageChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        createServiceForm.image = file;
    }
};

const createService = () => {
	const formData = new FormData();
    formData.append('name', createServiceForm.name);
    formData.append('price', createServiceForm.price);
    formData.append('description', createServiceForm.description);
    formData.append('frequency', createServiceForm.frequency);
    formData.append('active', createServiceForm.active);


    // Agregamos la imagen al formulario si se seleccionó una
    if (createServiceForm.image) {
        formData.append('image', createServiceForm.image);
    }

    createServiceForm.post(route('Services.store'), formData, {
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
			
			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="image" value="Image" />
				<div class="mt-1 flex items-center space-x-4">
					<label class="w-40 h-40 flex flex-col items-center px-4 py-6 bg-white rounded-lg shadow-lg tracking-wide border cursor-pointer hover:bg-blue-500 hover:text-white">
						<svg
							class="w-8 h-8 text-blue-400"
							fill="currentColor"
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 20 20"
							fill-rule="evenodd"
							clip-rule="evenodd"
						>
							<path
								d="M6.293 5.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z"
								clip-rule="evenodd"
							></path>
						</svg>
						<span class="mt-2 text-base leading-normal">Select a file</span>
						<input
							type="file"
							id="image"
							class="hidden"
							accept="image/*"
							@change="onImageChange"
						/>
					</label>
				</div>
				<InputError :message="createServiceForm.errors.image" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="active" value="active" />
				<Checkbox
					id="active"
					v-model="createServiceForm.active"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createServiceForm.errors.active" class="mt-2" />
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