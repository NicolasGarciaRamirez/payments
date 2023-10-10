<script setup>
</script>
<template>
	<nav class="navbar p-4 bg-dark">
		<ul class="flex space-x-4">
			<li><a :href="route('Plans.index')" class="hover:text-gray-400">List</a></li>
			<li><a :href="route('Plans.create')" class="hover:text-gray-400">Create</a></li>
		</ul>
	</nav>
</template>