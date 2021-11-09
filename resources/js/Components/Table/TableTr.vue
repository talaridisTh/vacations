<template>
    <tr :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
        <slot/>
    </tr>
</template>

<script>
    export default {
        name: "TableTr",

        props: {
            index: {
                type: Number,
                default() {
                    return 0
                }
            }
        }
    }
</script>
