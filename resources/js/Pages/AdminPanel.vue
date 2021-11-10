<template>
   <section class="container mx-auto">

	  <div class="space-y-2 mb-4 mt-4">
		 <div class="flex justify-end w-full">
			<Link :href="route('admin.create')">
			   <ButtonDefault colors="bg-blue-400 text-white">Create User</ButtonDefault>
			</Link>
		 </div>
	  </div>

	  <SectionCard>
		 <template v-slot:content>
			<TableComponent>
			   <TableHead>
				  <TableTr>
					 <TableTh>Firstname</TableTh>
					 <TableTh>Lastname</TableTh>
					 <TableTh>Email</TableTh>
					 <TableTh>Role</TableTh>
				  </TableTr>
			   </TableHead>

			   <TableBody>
				  <TableTr v-for="(employer, index) in $page.props.auth.employers.data"
						   :key="employer.id"
						   :index="index" class="hover:bg-gray-300">
					 <Link :href="route('admin.edit',employer.slug)" class="contents ">
						<TableTd>{{ employer.firstname }}</TableTd>
						<TableTd>{{ employer.lastname }}</TableTd>
						<TableTd>{{ employer.email }}</TableTd>
						<TableTd>{{ employer.role }}</TableTd>
					 </Link>
				  </TableTr>
			   </TableBody>
			</TableComponent>
		 </template>
	  </SectionCard>
	  <Pagination class="mt-6" :links="$page.props.auth.employers.links" />
   </section>
</template>
<script>
import Admin from "@/Layouts/Admin";

export default {layout: Admin}
</script>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import SectionCard from "@/Components/Sections/SectionCard";
import TableComponent from "@/Components/Table/TableComponent";
import TableHead from "@/Components/Table/TableHead";
import TableTr from "@/Components/Table/TableTr";
import TableTh from "@/Components/Table/TableTh";
import TableBody from "@/Components/Table/TableBody";
import TableTd from "@/Components/Table/TableTd";
import ButtonDefault from "@/Components/Elements/Buttons/ButtonDefault";
import Pagination from "@/Components/Pagination";




</script>

<style scoped>

</style>