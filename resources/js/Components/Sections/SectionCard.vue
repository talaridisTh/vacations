<template>
    <section>
        <div class="bg-white shadow sm:rounded-md sm:overflow-hidden">
            <div v-if="hasTitle" class="px-4 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900">
                    <slot name="title"/>
                </h2>
            </div>

            <div :class="{ 'mt-6': hasTitle }">
                <slot name="content"/>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "SectionCard",

    props: {
        hasTitle: {
            type: Boolean,
            default: false
        }
    }
}
</script>
