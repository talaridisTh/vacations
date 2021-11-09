<template>
    <textarea
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        rows="3"
        :class="[error ? 'border-red-400': 'border-gray-300']"
        class="w-full shadow-sm block w-full focus:ring-primary-500 focus:border-primary-500 sm:text-sm border rounded-md"></textarea>
</template>

<script>
import FormError from "./FormError";

export default {
    name: "TextareaInput",

    props: {
        modelValue: {
            type: String,
        },

        placeholder: {
            placeholder: String,
        },

        error: {
            type: String,
            default: ''
        }
    },

    components: {
        FormError
    },
}
</script>
