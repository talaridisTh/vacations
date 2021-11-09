<template>
    <input
        :type="type"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :placeholder="placeholder"
        :class="[error ? 'border-red-400': 'border-gray-300']"
        ref="input">
</template>

<script>
export default {
    name: 'FormInput',

    props: {
        modelValue: String,

        placeholder: String,

        type: {
            type: String,
            default: 'text'
        },

        error: String
    },

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>

