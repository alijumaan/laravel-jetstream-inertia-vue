<template>
    <app-layout title="لوحة التحكم">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                لوحة التحكم
            </h2>
        </template>
        <div class="py-12 max-w-7xl mx-auto ">
            <div class="flex justify-center overflow-hidden">
                <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 mt-3">
                    <!-- الوقاية Preventative -->
                    <Link :href="route('preventatives.index')">
                        <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                             style="background-image: url('http://fire-inertia.test/img/bg/1.jpeg');">
                            <div class="absolute inset-0 bg-pink-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                            <div class="relative w-full h-full flex items-center justify-center">
                                <div>
                                    <h3 class="text-center text-white text-lg"></h3>
                                    <h3 class="text-center text-white text-3xl px-8 mt-2 font-bold">الوقاية</h3>
                                </div>
                            </div>
                        </div>
                    </Link>
                    <!-- التموين Supply -->
                    <Link v-if="$page.props.is_admin" :href="route('supplies.index')">
                        <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                             style="background-image: url('http://fire-inertia.test/img/bg/1.jpeg');">
                            <div class="absolute inset-0 bg-blue-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                                <div>
                                    <h3 class="text-center text-white text-lg"></h3>
                                    <h3 class="text-center text-white text-3xl px-8 mt-2 font-bold">التموين</h3>
                                </div>
                            </div>
                        </div>
                    </Link>
                    <!-- المستخدمين users -->
                    <Link v-if="$page.props.is_admin" :href="route('users.index')">
                        <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                             style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                            <div class="absolute inset-0 bg-green-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                                <div>
                                    <h3 class="text-center text-white text-lg"></h3>
                                    <h3 class="text-center text-white text-3xl px-8 mt-2 font-bold">المستخدمين</h3>
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Link
        },
    })
</script>
