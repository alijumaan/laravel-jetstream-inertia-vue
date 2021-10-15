<template>
    <div>
        <a @click="confirmShow" href="javascript:void(0)" class="text-indigo-600 hover:text-indigo-900">
            <i class="fa fa-edit"></i>
        </a>

        <jet-dialog-modal :show="showModal" :max-width="'lg'" @close="closeModal">
            <template #title>
                Edit {{ building.name }}
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

                <jet-button class="ml-2" @click="updateBuilding" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
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
        building: Object,
        periods: Object,
        users: Object
    },
    data() {
        return {
            showModal: false,
            form: this.$inertia.form({
                name: this.building.name,
                number: this.building.number,
                user_id: this.building.user_id,
                period_id: this.building.period_id,
                notes: this.building.notes,
                status: this.building.status,
            })
        }
    },
    methods: {
        confirmShow() {
            this.showModal = true
            setTimeout(() => this.$refs.name.focus(), 250)
        },

        updateBuilding() {
            this.form.put(route('buildings.update', this.building.slug), {
                preserveScroll: true,
                onSuccess: () => {
                    this.closeModal()
                    Toast.fire({
                        icon: 'success',
                        title: 'The building updated successfully'
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
