<template>
    <button
		@click="$emit('click',true)"
        :type="type"
        :disabled="disabled"
        :class="[padding, fontSize, rounded, colors]"
        class="inline-flex items-center border border-transparent font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">
        <slot/>
    </button>
</template>

<script>
export default {
    name: "ButtonDefault",

    props: {
        type: {
            type: String,
            default: 'button',
        },

        disabled: {
            type: Boolean,
            default: false
        },

        padding: {
            type: String,
            default: 'px-4 py-2'
        },

        fontSize: {
            type: String,
            default: 'text-sm'
        },

        rounded: {
            type: String,
            default: 'rounded'
        },

        colors: {
            type: String,
            default: 'text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-500'
        }
    }
}
</script>
