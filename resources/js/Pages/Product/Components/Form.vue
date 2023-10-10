<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


defineProps({
	categories: Array
})

const image = ref(null);
const preview = ref(null)
const imageUploadError = ref(null);
const createProductForm = useForm({
    name: '',
	price: '',
	description: '',
	stock: '',
	category_id:''
});

const onImageChange = (event) => {
    const file = event.target.files[0];
	preview.value = URL.createObjectURL(file)
	
    if (file) {
        if (file.type.startsWith('image/')) {
            image.value = file;
            imageUploadError.value = null;
        } else {
            image.value = null;
            imageUploadError.value = 'Please select a valid image file.';
        }
    }
};

const createProduct = () => {
	const formData = new FormData();
    formData.append('name', createProductForm.name);
    formData.append('price', createProductForm.price);
    formData.append('description', createProductForm.description);
    formData.append('stock', createProductForm.stock);
    formData.append('category_id', createProductForm.category_id);
    
    if (image.value) {
        formData.append('image', image.value);
    }
	
    axios.post(route('Products.store'), formData, {
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
			Create Product
		</template>

		<template #description>
			Crea todos los productos
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
				/>
				<InputError :message="createProductForm.errors.name" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="Price" value="Price" />
				<TextInput
					id="price"
					v-model="createProductForm.price"
					type="number"
					class="mt-1 block w-full"
				/>
				<InputError :message="createProductForm.errors.price" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="Stock" value="Stock" />
				<TextInput
					id="stock"
					v-model="createProductForm.stock"
					type="number"
					class="mt-1 block w-full"
				/>
				<InputError :message="createProductForm.errors.stock" class="mt-2" />
			</div>

			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="description" value="Description" />
				<TextInput
					id="description"
					v-model="createProductForm.description"
					type="text"
					class="mt-1 block w-full"
				/>
				<InputError :message="createProductForm.errors.description" class="mt-2" />
			</div>
			<div class="col-span-6 sm:col-span-4">
				<InputLabel for="Category" value="Category" />
				<select class="w-full" id="category" v-model="createProductForm.category_id">
					<option v-for="(category, index) in categories" :value="category.id">{{ category.name }}</option>
				</select>
				<InputError :message="createProductForm.errors.category" class="mt-2" />
			</div>
			<div class="col-span-6 sm:col-span-4">
				<!-- Vista previa de la imagen seleccionada -->
				<div v-if="preview" class="mt-2">
                    <label class="block text-gray-500 font-bold">Preview:</label>
                    <img
                        :src="preview"
                        alt="Preview"
                        class="mt-1 w-40 h-40 border border-gray-200 rounded-lg"
                    />
                </div>

				<InputLabel for="image" value="Image" />
				<input
					id="image"
					type="file"
					accept="image/*"
					@change="onImageChange"
					class="mt-1 block w-full"
				/>
				<InputError :message="imageUploadError" class="mt-2" />
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