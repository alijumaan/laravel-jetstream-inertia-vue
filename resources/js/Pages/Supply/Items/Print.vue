<template>
    <div class="justify-center items-center h-full">
            <div class="px-8 pt-5 text-left flex justify-between">
                <jet-button onclick="window.print();" class="bg-green-700">Print</jet-button>
                <Link :href="route('items.index')">
                    <jet-button>Back</jet-button>
                </Link>
            </div>
            <div class="mx-3">
                <div class="card">
                    <div class="flex flex-col">
                        <div class="px-3 my-2 overflow-x-auto ">
                            <div class="py-2 align-middle inline-block min-w-full">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y text-left divide-gray-200 print-container">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-3 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                #
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nomenclature
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Size
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Quantity
                                            </th>
                                            <th scope="col" class="py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                SKU
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-if="items.length > 0" v-for="(item, index) in items" :key="item.id">
                                            <td class=" whitespace-nowrap">
                                                <span class="pl-3 inline-flex text-xs leading-5 font-semibold rounded-full">
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
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import AppLayout from "../../../Layouts/AppLayout";
import JetButton from "../../../Jetstream/Button"

export default defineComponent({
    components: {
        AppLayout,
        JetButton,
        Link,
    },
    props: {
        items: Object
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
.print-container {
    font-size: 14px;
}
</style>
