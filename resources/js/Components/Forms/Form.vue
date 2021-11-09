<template>

    <form @submit.prevent="$emit('submit')"
          class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
        <div v-if="label">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ label }}
            </h3>
        </div>

        <slot></slot>
    </form>
</template>

<script>
export default {
    name: "Form",

    props: {
        label: String
    },

}
</script>

<style scoped>

</style>
