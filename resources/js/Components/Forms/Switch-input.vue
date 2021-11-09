<template>

    <div class="flex items-center w-full">
        <label :for="id" class="flex items-center cursor-pointer">
            <div class="relative">
                <input
                    :value="modelValue"
                    :checked="modelValue"
                    @change="$emit('onSwitch' ,modelValue)"
                    @input="$emit('update:modelValue', $event.target.checked)"
                    type="checkbox" :id="id" class="sr-only test">
                <div class="block bg-gray-600 w-11 h-6 rounded-full"></div>
                <div class="dot absolute left-1 top-1 bg-red-500 w-4 h-4 rounded-full transition"></div>
            </div>
        </label>
    </div>

</template>

<script>
import {Inertia} from '@inertiajs/inertia'
import {toast} from "../../Plugins/mixin";
import {ref} from "vue"

export default {
    name: "switch-input",
    props: {
        id: String,
        model: String,
        modelValue: Boolean,
    },
}
</script>

<style scoped>
input:checked ~ .dot {
    transform: translateX(100%);
    background-color: #1E7F6F;
}
</style>
