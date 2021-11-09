<template>
    <div v-if="paginator.total > paginator.per_page" class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <inertia-link v-if="paginator.prev_page_url" :href="paginator.prev_page_url">
                <ButtonWhiteBase>Προηγούμενο</ButtonWhiteBase>
            </inertia-link>

            <inertia-link v-if="paginator.next_page_url" :href="paginator.next_page_url">
                <ButtonWhiteBase>Επόμενο</ButtonWhiteBase>
            </inertia-link>
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    <span class="font-medium">{{ paginator.from }}</span>
                    {{ ' ' }}
                    μέχρι
                    {{ ' ' }}
                    <span class="font-medium">{{ paginator.to }}</span>
                    {{ ' ' }}
                    από
                    {{ ' ' }}
                    <span class="font-medium">{{ paginator.total }}</span>
                    {{ ' ' }}
                    αποτελέσματα
                </p>
            </div>

            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <TablePaginationPageLink v-if="paginator.prev_page_url" class="rounded-l-md" :href="paginator.prev_page_url">
                        <span class="sr-only">Προηγούμενο</span>
                        <ChevronLeftIcon class="h-5 w-5" aria-hidden="true"/>
                    </TablePaginationPageLink>

                    <TablePaginationPageLink v-if="paginator.next_page_url" class="rounded-r-md" :href="paginator.next_page_url">
                        <span class="sr-only">Επόμενο</span>
                        <ChevronRightIcon class="h-5 w-5" aria-hidden="true"/>
                    </TablePaginationPageLink>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/vue/solid'
import ButtonWhiteBase from "@/Components/Elements/Buttons/White/ButtonWhiteBase";
import TablePaginationPageLink from "@/Components/Tables/TablePaginationPageLink";

export default {
    name: "TablePagination",

    props: {
        paginator: Object
    },

    components: {
        TablePaginationPageLink,
        ButtonWhiteBase,
        ChevronLeftIcon,
        ChevronRightIcon
    }
}
</script>
