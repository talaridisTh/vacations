<template>
    <label :for="id" class="block text-sm font-medium text-gray-700 mb-1">
        <slot/>
    </label>
</template>

<script>
    export default {
        name: "FormLabel",

        props: {
            id: String
        }
    }
</script>
