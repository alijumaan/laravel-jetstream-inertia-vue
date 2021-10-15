<template>
    <div>
        <div class="text-center flex justify-between">
            <span class="text-blueGray-700 text-xl font-bold">
                <jet-button @click="confirmShow">
                    New permission
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
                <small>Create new permission</small>

                <div class="mt-3">
                    <jet-input type="text" class="mt-1 block w-full" placeholder="Name"
                               ref="name"
                               v-model="form.name"
                               @keyup.enter="savePermission" />
                    <jet-input-error :message="form.errors.name" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2" @click="savePermission" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
    data() {
        return {
            showModal: false,
            form: this.$inertia.form({
                name: '',
            })
        }
    },
    methods: {
        confirmShow() {
            this.showModal = true
            setTimeout(() => this.$refs.name.focus(), 250)
        },

        savePermission() {
            this.form.post(this.route('permissions.store'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.closeModal()
                    Toast.fire({
                        icon: 'success',
                        title: 'The permission has been created successfully '
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
