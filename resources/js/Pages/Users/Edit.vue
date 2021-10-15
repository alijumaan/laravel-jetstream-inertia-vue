<template>
    <app-layout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit {{ user.name }}
            </h2>
        </template>
        <div class="flex justify-center items-center h-full overflow-auto">
            <div class="mx-3 my-20">
                <div class="card">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class=" overflow-hidden sm:rounded-lg">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="rounded-t mb-0 px-3 py-6">
                                            <div class="text-center flex justify-between">
                                                <h6 class="text-blueGray-700 text-xl font-bold">
                                                </h6>
                                                <Link :href="route('users.index')">
                                                    <jet-button >Back to users</jet-button>
                                                </Link>
                                            </div>
                                        </div>
                                        <form @submit.prevent="updateUser">
                                            <div class="flex flex-wrap -m-2">
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <Label for="name" value="Name" />
                                                        <Input type="text" v-model="form.name" id="name" name="name" class="mt-1 block w-full " />
                                                        <jet-input-error :message="form.errors.name" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <Label for="email" value="Email" />
                                                        <Input type="email" v-model="form.email" id="email" name="email" class="mt-1 block w-full " />
                                                        <jet-input-error :message="form.errors.email" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <Label for="username" value="Username" />
                                                        <Input type="text" v-model="form.username" id="username" name="username" class="mt-1 block w-full " />
                                                        <jet-input-error :message="form.errors.username" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="p-2 w-full">
                                                    <div class="relative">
                                                        <Label for="role" value="Role" />
                                                        <select v-model="form.role" id="role" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                                            <option v-for="role in roles" :value="role.name">{{ role.name }}</option>
                                                        </select>
                                                    </div>
                                                    <jet-input-error :message="form.errors.role" class="mt-2" />
                                                </div>
                                                <div class="p-2 w-full">
                                                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                        Update
                                                    </jet-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import AppLayout from "@/Layouts/AppLayout";
import Label from "@/Jetstream/Label";
import Input from "@/Jetstream/Input";
import JetButton from "@/Jetstream/Button";
import JetInputError from '@/Jetstream/InputError.vue'

export default defineComponent({
    components: {
        AppLayout,
        Label,
        Input,
        JetButton,
        JetInputError,
        Link,
    },
    props: {
        user: Object,
        roles: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.user.name,
                email: this.user.email,
                username: this.user.username,
                role: this.user.role
            }),
        }
    },
    methods: {
        updateUser() {
            this.form.put(route('users.update', this.user.id), {
                onSuccess: () => this.form.reset(),
            })
        },
    },
})
</script>

<style scoped></style>
