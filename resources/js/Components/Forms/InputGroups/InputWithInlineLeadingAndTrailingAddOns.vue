<template>
    <div class="mt-1 relative rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <div class="text-gray-500 sm:text-sm">
                <slot name="leading"/>
            </div>
        </div>

        <FormInput
            :class="[{'pl-7': withLeading}, {'pr-12': withTrailing}]"
            class="focus:ring-primary-500 focus:border-primary-500 block w-full sm:text-sm border-gray-300 rounded-md"
            :type="type"
            v-model="myValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :error="error"
            :placeholder="placeholder"/>

        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <div class="text-gray-500 sm:text-sm" id="price-currency">
                <slot name="trailing"/>
            </div>
        </div>
    </div>
</template>

<script>
import FormInput from "@/Components/Forms/InputGroups/FormInput";

export default {
    name: "InputWithInlineLeadingAndTrailingAddOns",

    data() {
        return {
            myValue: this.modelValue
        }
    },

    props: {
        placeholder: String,

        type: {
            type: String,
            default: 'text'
        },

        error: {
            type: String,
            default: ""
        },

        modelValue: String,

        withLeading: {
            type: Boolean,
            default: false
        },

        withTrailing: {
            type: Boolean,
            default: false
        }
    },

    components: {
        FormInput,
    },
}
</script>
