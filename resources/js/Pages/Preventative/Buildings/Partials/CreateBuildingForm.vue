<template>
    <div>
        <div class="text-center flex justify-between">
            <span class="text-blueGray-700 text-xl font-bold">
                <jet-button @click="confirmShow">
                Create
                </jet-button>
            </span>
            <Link :href="route('preventatives.index')">
                <jet-button class="mb-4">Back</jet-button>
            </Link>
        </div>

        <jet-dialog-modal :show="showModal" :max-width="'lg'" @close="closeModal">
            <template #title>
                Create new building
            </template>

            <template #content>
                <small>Please make sure that the data entered is correct before saving</small>

                <div class="mt-3">
                    <jet-input type="text" class="mt-1 block w-full" placeholder="Name"
                               ref="name"
                               v-model="form.name" />
                    <jet-input-error :message="form.errors.name" class="mt-2" />
                </div>

                <div class="mt-3">
                    <jet-input type="text" class="mt-1 block w-full" placeholder="Number"
                               ref="number"
                               v-model="form.number" />
                    <jet-input-error :message="form.errors.number" class="mt-2" />
                </div>

                <div v-if="$page.props.is_admin" class="mt-3">
                    <div class="relative">
                        <jet-label value="Inspector" />
                        <select v-model="form.user_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                            <option value="">Inspector</option>
                            <option v-for="user in users" :value="user.id">{{ user.name }}</option>
                        </select>
                    </div>
                    <jet-input-error :message="form.errors.user_id" class="mt-2" />
                </div>

                <div class="mt-3">
                    <div class="relative">
                        <jet-label value="Period" />
                        <select v-model="form.period_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                            <option value="">Period</option>
                            <option v-for="period in periods" :value="period.id">{{ period.period }}</option>
                        </select>
                    </div>
                    <jet-input-error :message="form.errors.period_id" class="mt-2" />
                </div>

                <div class="mt-3">
                    <jet-input type="text" class="mt-1 block w-full" placeholder="Notes"
                               ref="notes"
                               v-model="form.notes" />
                    <jet-input-error :message="form.errors.notes" class="mt-2" />
                </div>

            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>

                <jet-button class="mr-2" @click="saveBuilding" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
    import JetLabel from '@/Jetstream/Label.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetButton from "@/Jetstream/Button";

    export default defineComponent({
        components: {
            Link,
            JetDialogModal,
            JetInput,
            JetLabel,
            JetButton,
            JetInputError,
            JetSecondaryButton
        },
        props: {
            buildings: Object,
            users: Object,
            periods: Object
        },
        data() {
            return {
                showModal: false,
                form: this.$inertia.form({
                    name: '',
                    number: '',
                    user_id: '',
                    period_id: '',
                    notes: '',
                })
            }
        },
        methods: {
            confirmShow() {
                this.showModal = true
                setTimeout(() => this.$refs.name.focus(), 250)
            },

            saveBuilding() {
                this.form.post(this.route('buildings.store'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.closeModal()
                        Toast.fire({
                            icon: 'success',
                            title: 'The building has been created successfully '
                        })
                    },
                    onError: () => this.$refs.name.focus(),
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
