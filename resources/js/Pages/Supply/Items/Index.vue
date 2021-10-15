<template>
    <app-layout title="Items">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Items
            </h2>
        </template>
        <div class="justify-center items-center h-full">
            <div class="mx-3 my-20">
                <div class="card">
                    <div class="text-left flex justify-between">
                        <Link :href="route('items.create')">
                            <jet-button class="mb-4">Create new item</jet-button>
                        </Link>
                        <Link :href="route('items.print')">
                            <jet-button class="mb-4 bg-green-700">Print</jet-button>
                        </Link>
                        <Link :href="route('supplies.index')">
                            <jet-button class="mb-4">Back</jet-button>
                        </Link>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto ">
                            <div class="py-2 align-middle inline-block min-w-full">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y text-left divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                #
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nomenclature
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Size
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Qty
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                SKU
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-if="items.data.length > 0" v-for="(item, index) in items.data" :key="item.id">
                                            <td class=" whitespace-nowrap">
                                                <span class="pr-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                                                    {{ index + 1 }}
                                                </span>
                                            </td>
                                            <td class="py-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ item.nomenclature }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ item.color }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" whitespace-nowrap">
                                                <span class="inline-flex text-xs leading-5 font-semibold rounded-full">
                                                    {{ item.size }}
                                                </span>
                                            </td>
                                            <td class=" whitespace-nowrap">
                                              <span class="inline-flex text-xs leading-5 font-semibold rounded-full">
                                                {{ item.quantity }}
                                              </span>
                                            </td>
                                            <td class=" whitespace-nowrap">
                                              <span class="inline-flex text-xs leading-5 font-semibold rounded-full">
                                                {{ item.sku }}
                                              </span>
                                            </td>
                                            <td class="whitespace-nowrap text-center text-sm font-medium justify-between">
                                                <Link :href="route('items.edit', item.id)" class="text-indigo-600 hover:text-indigo-900">
                                                    <i class="fa fa-edit"></i>
                                                </Link>
                                                <button @click="deleteItem(item.id)" class="text-red-700 hover:text-indigo-900">
                                                    <i class="fa fa-trash ml-3"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr v-else>
                                            <td colspan="4" class=" py-3 text-center">No items found.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="items.total > pagination" class="mt-4">
                    <div class="flex items-center">
                        <template v-for="(link, key) in items.links">
                            <div v-if="link.url === null" :key="key"
                                 class="mr-1 mb-1 px-3 py-3 text-sm leading-4 text-gray-400 border rounded"
                                 v-html="link.label" :class="{ 'bg-white': link.active }"/>
                            <Link v-else class="mr-1 mb-1 px-3 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                  :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from "../../../Layouts/AppLayout";
    import JetButton from "../../../Jetstream/Button"

    export default defineComponent({
        components: {
            AppLayout,
            JetButton,
            Head,
            Link,
        },
        props: {
            items: Object,
            pagination: Number,
        },
        methods: {
            deleteItem(itemId) {
                if(confirm("Are you sure to delete?")) {
                    axios.delete(`items/${itemId}`).then(response => {

                        return this.$inertia.reload();
                    });
                }
                return false;
            }
        }

    })
</script>

<style scoped>
* {
    font-size: 12px;
}
table, thead, tbody, th, td, tr {
    padding: 5px 0 5px 0;
    margin: 0;
}
</style>
