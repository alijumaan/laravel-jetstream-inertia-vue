<template>
    <div>
        <div class="text-center flex justify-between">
            <span class="text-blueGray-700 text-xl font-bold">
                <jet-button @click="confirmShow">
                Create new role
                </jet-button>
            </span>
            <Link :href="route('dashboard')">
                <jet-button class="mb-4">Home</jet-button>
            </Link>
        </div>

        <jet-dialog-modal :show="showModal" :max-width="'lg'" @close="closeModal">
            <template #title>
                Create
            </template>

            <template #content>
                <small>Create a new job and assign permissions to it</small>

                <div class="mt-3">
                    <jet-input type="text" class="mt-1 block w-full" placeholder="Name"
                               ref="name"
                               v-model="form.name"
                               @keyup.enter="saveRole" />
                    <jet-input-error :message="form.errors.name" class="mt-2" />
                </div>
                <div class="mt-4">
                    <VueMultiselect
                        v-model="form.permissions"
                        :options="permissions"
                        :multiple="true"
                        :taggable="true"
                        :close-on-select="false"
                        placeholder="Choose permissions"
                        label="name"
                        track-by="name"
                        :clear-on-select="false"
                        :preserve-search="false"
                        :preselect-first="false"
                    />
                    <jet-input-error :message="form.errors.permissions" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2" @click="saveRole" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetButton from "@/Jetstream/Button";

    export default defineComponent({
        components: {
            Link,
            JetDialogModal,
            JetInput,
            JetButton,
            JetInputError,
            JetSecondaryButton
        },
        props: {
            permissions: Object
        },
        data() {
            return {
                showModal: false,
                form: this.$inertia.form({
                    name: '',
                    permissions: [],
                })
            }
        },
        methods: {
            confirmShow() {
                this.showModal = true
                setTimeout(() => this.$refs.name.focus(), 250)
            },

            saveRole() {
                this.form.post(this.route('roles.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.closeModal()
                        Toast.fire({
                            icon: 'success',
                            title: 'The role created successfully'
                        })
                    },
                    onError: () => this.$refs.name.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.showModal = false
                this.form.reset()
            },
        }
    })
</script>
<style scoped></style>
