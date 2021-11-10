<template>
   <section class="container mx-auto">

	  <div class="space-y-2 mb-4 mt-4">
		 <div class="flex justify-end w-full">
			<Link :href="route('vacations.create')">
			   <ButtonDefault colors="bg-blue-400 text-white">Submit request</ButtonDefault>
			</Link>
		 </div>
	  </div>

	  <SectionCard>
		 <template v-slot:content>
			<TableComponent>

			   <TableHead>
				  <TableTr>
					 <TableTh>Date Submitted</TableTh>
					 <TableTh>Dates requested</TableTh>
					 <TableTh>Days requested</TableTh>
					 <TableTh>Status</TableTh>
				  </TableTr>
			   </TableHead>

			   <TableBody>
				  <TableTr v-for="(vacation, index) in vacations.data"
						   :key="vacation.id"
						   :index="index">
					 <TableTd>{{ vacation.created_format }}</TableTd>
					 <TableTd>{{ vacation.date_request }}</TableTd>
					 <TableTd>{{ vacation.days }}</TableTd>
					 <TableTd>{{ vacation.status }}</TableTd>
				  </TableTr>
			   </TableBody>

			</TableComponent>
		 </template>
	  </SectionCard>
	  <Pagination class="mt-6" :links="vacations.links" />
   </section>


</template>
<script>
import Authenticated from "@/Layouts/Authenticated";

export default {layout: Authenticated}
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


defineProps({
   "vacations": Object
})


</script>

<style scoped>

</style>