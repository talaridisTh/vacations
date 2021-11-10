<template>
   <section class="container mx-auto">
	  <Form @submit="submit">

		 <Spacer>

			<FormComponent>
			   <FormLabel>
				  Date From
			   </FormLabel>
			   <div class="flex flex-col">
				  <input v-model="form.vacation_start" type="date">
				  <FormError v-if="errors.vacation_start">{{ errors.vacation_start }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>
				  Date To
			   </FormLabel>
			   <div class="flex flex-col">
				  <input v-model="form.vacation_end" type="date">
				  <FormError v-if="errors.vacation_end">{{ errors.vacation_end }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>
				  Reason
			   </FormLabel>
			   <div class="flex flex-col space-y-2">
				  <TextareaInput v-model="form.reason"  />
				  <FormError v-if="errors.reason">{{ errors.reason }}</FormError>
			   </div>
			</FormComponent>

		 </Spacer>

		 <div class="pt-5">
			<div class="flex justify-end">
			   <ButtonDefault type="submit" class="bg-green-900 text-white">
				  Create
			   </ButtonDefault>
			</div>
		 </div>

	  </Form>
   </section>
</template>

<script>
import Front from "@/Layouts/Authenticated";

export default {layout: Front}
</script>

<script setup>
import Form from "@/Components/Forms/Form";
import Spacer from "@/Components/Forms/Spacer";
import FormComponent from "@/Components/Forms/FormComponent";
import FormLabel from "@/Components/Forms/InputGroups/FormLabel";
import TextareaInput from "@/Components/Forms/TextareaInput";
import FormError from "@/Components/Forms/FormError";
import {reactive} from "vue";
import ButtonDefault from "@/Components/Elements/Buttons/ButtonDefault";
import {Inertia} from '@inertiajs/inertia'


const props = defineProps({
   "user": Object,
   "errors": Object
})

const form = reactive({
   vacation_start: null,
   vacation_end: null,
   reason: null,
   remember: true,
})

function submit() {
   Inertia.post(route("vacations.store"), form)
}

</script>

<style scoped>

</style>