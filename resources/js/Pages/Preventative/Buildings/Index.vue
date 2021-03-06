<template>
    <app-layout title="Buildings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Buildings
            </h2>
        </template>
        <div class="justify-center items-center h-full">
            <div class="mx-3 my-20">
                <div class="card">
                    <create-building-form :periods="periods" :users="users"/>
                    <div class="relative w-full">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <input type="text"
                               v-model="keyword"
                               @keyup="search"
                               class="w-full pr-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-gray-500 dark:focus:border-gray-500 focus:outline-none focus:ring"
                               placeholder="Search">
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto">
                            <div class="py-2 align-middle inline-block min-w-full ">
                                <div class="sm shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y text-left divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="text-left py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Building
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Expiry date
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-if="buildings.data.length > 0"
                                            v-for="(building, index) in buildings.data"
                                            :key="building.id"
                                            :class="{'bg-gray-100': index%2 ===0}">
                                            <td class="whitespace-nowrap">
                                                <div>
                                                    <div class="px-3 text-sm font-medium text-gray-900">
                                                        <Link :href="route('buildings.show', building.slug)" class="text-indigo-600 hover:text-indigo-900">
                                                            {{ building.name }}
                                                        </Link>
                                                    </div>
                                                    <div class="px-3 text-sm text-gray-500">
                                                        {{ building.number }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <span :class="new Date(building.checked_at ).getTime() > new Date().getTime()
                                                        ? 'inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800'
                                                        : 'inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800'">
                                                            {{ building.checked_at }}
                                                        </span>
                                                    </div>
                                                    <div :class="new Date(building.checked_at ).getTime() > new Date().getTime()
                                                                 ? 'text-sm text-green-500'
                                                                 :  'text-sm text-red-500'">
                                                        {{ building.checked_at_string }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap">
                                              <span :class="building.status === 0
                                                        ? 'inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800'
                                                        : 'inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800'">
                                                {{ building.status === 0 ? 'Inactive' : 'Active'}}
                                              </span>
                                            </td>
                                            <td class="whitespace-nowrap text-sm font-medium justify-between">
                                                <update-building-status-form :buildingStatus="building.status" :buildingSlug="building.slug" :buildingName="building.name"/>
                                            </td>
                                        </tr>
                                        <tr v-else>
                                            <td colspan="4" class=" py-3 text-center">No building found.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="buildings.total > buildingsLimit" class="mt-4">
                    <div class="flex items-center">
                        <template v-for="(link, key) in buildings.links">
                            <div v-if="link.url === null" :key="key"
                                 class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                 v-html="link.label" :class="{ 'bg-white': link.active }"/>
                            <Link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                  :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout";
    import JetButton from "@/Jetstream/Button";
    import JetSecondaryButton from "@/Jetstream/SecondaryButton";
    import CreateBuildingForm from '@/Pages/Preventative/Buildings/Partials/CreateBuildingForm.vue'
    import UpdateBuildingStatusForm from '@/Pages/Preventative/Buildings/Partials/UpdateBuildingStatusForm.vue'
    import _ from 'lodash';

    export default defineComponent({
        components: {
            AppLayout,
            CreateBuildingForm,
            UpdateBuildingStatusForm,
            JetSecondaryButton,
            JetButton,
            Head,
            Link,
        },
        props: {
            buildings: Object,
            periods: Object,
            users: Object,
            buildingsLimit: Number
        },
        data() {
            return {
                keyword: ''
            }
        },
        methods: {
            search: _.throttle(function () {
                this.$inertia.replace(route('buildings.index', {keyword: this.keyword}))
            }, 200)
        }

    })
</script>

<style scoped>
table, thead, tbody, th, td, tr {
    padding: 5px 0 5px 0;
    margin: 0;
}
.sm {
    padding: 6px 2px 5px 3px;
    margin: 2px;
    font-size: 9px;
}
</style>
