<template>
    <inertia-link :href="href" :class="classes">
        <slot/>
    </inertia-link>
</template>

<script>
export default {
    name: "TablePaginationPageLink",

    props: {
        href: String,
        current: {
            type: Boolean,
            default() {
                return false
            }
        }
    },

    computed: {
        classes() {
            return [
                this.current
                    ? 'z-10 bg-primary-50 border-primary-500 text-primary-600'
                    : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
                'relative inline-flex items-center px-4 py-2 border text-sm font-medium'
            ]
        }
    }
}
</script>
