<template>
   <section class="container mx-auto">
	  <Form @submit="submit">


		 <Spacer>

			<FormComponent>
			   <FormLabel>
				  FirstName
			   </FormLabel>
			   <div class="flex flex-col">
				  <FormInput v-model="form.firstname" type="text" />
				  <FormError v-if="errors.firstname">{{ errors.firstname }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>
				  Lastname
			   </FormLabel>
			   <div class="flex flex-col">
				  <FormInput v-model="form.lastname" type="text" />
				  <FormError v-if="errors.lastname">{{ errors.lastname }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>Email</FormLabel>
			   <div class="flex flex-col">
				  <FormInput v-model="form.email" type="text" />
				  <FormError v-if="errors.email">{{ errors.email }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>Role</FormLabel>
			   <div class="flex flex-col">
				  <select v-model="form.role">
					 <option :value="index"  v-for="(role,index)  in $page.props.roles" :key="role.index" >
						{{ capitalize(role) }}
					 </option>
				  </select>
				  <FormError v-if="errors.role">{{ errors.role }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>Password</FormLabel>
			   <div class="flex flex-col">
				  <FormInput v-model="form.password" type="password" />
				  <FormError v-if="errors.password">{{ errors.password }}</FormError>
			   </div>
			</FormComponent>

			<FormComponent>
			   <FormLabel>Password Confirm</FormLabel>
			   <div class="flex flex-col">
				  <FormInput v-model="form.password_confirmation" type="password" />
				  <FormError v-if="errors.password_confirmation">{{ errors.password_confirmation }}</FormError>
			   </div>
			</FormComponent>

		 </Spacer>

		 <div class="pt-5">
			<div class="flex justify-end">
			   <ButtonDefault type="submit" class="bg-green-900 text-white">
				  Update
			   </ButtonDefault>
			</div>
		 </div>

	  </Form>
   </section>
</template>

<script>
import Admin from "@/Layouts/Admin";

export default {layout: Admin}
</script>

<script setup>
import Form from "@/Components/Forms/Form";
import Spacer from "@/Components/Forms/Spacer";
import FormComponent from "@/Components/Forms/FormComponent";
import FormLabel from "@/Components/Forms/InputGroups/FormLabel";
import FormError from "@/Components/Forms/FormError";
import {reactive} from "vue";
import ButtonDefault from "@/Components/Elements/Buttons/ButtonDefault";
import {Inertia} from '@inertiajs/inertia'
import FormInput from "@/Components/Forms/InputGroups/FormInput";


const props = defineProps({
   "user": Object,
   "errors": Object
})

const form = reactive({
   firstname: props.user.firstname,
   lastname: props.user.lastname,
   email: props.user.email,
   role: props.user.role,
   password: null,
   password_confirmation: null,
})

function capitalize($value) {
   return $value.charAt(0).toUpperCase() + $value.slice(1);
}


function submit() {
   Inertia.put(route("admin.update", props.user.slug),form )
}

</script>

<style scoped>

</style>