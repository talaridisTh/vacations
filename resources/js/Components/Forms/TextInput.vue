<template>
    <div class="mt-1 sm:mt-0 col-span-2">
        <div class="flex flex-col rounded-md shadow-sm">
            <div class="flex justify-between">
                <input :id="id" ref="input" v-bind="$attrs"
                       autocomplete="off"
                       class="block w-full shadow-sm focus:ring-primary-500 focus:border-primary-500 w-full sm:text-sm  rounded-md pl-4"
                       :class="[ error ? 'border-red-400':'border-gray-300' ]"
                       :type="type"
                       :value="modelValue"
                       @input="$emit('update:modelValue', $event.target.value)"/>
            </div>
        </div>

        <FormError v-if="error">{{ error }}</FormError>
    </div>
</template>

<script>
import FormError from "./FormError";

export default {
    components: {FormError},

    props: {
        id: {
            type: String,
        },

        type: {
            type: String,
            default: 'text',
        },

        modelValue: {
            type: String,
        },

        label: String,

        error: {
            type: String,
            default: ""
        }
    },


}
</script>
