<template>
    <div>
        <jet-danger-button @click="confirmShow" class="btn-sm" v-if="buildingStatus === 0">
            Edit
        </jet-danger-button>

        <jet-dialog-modal :show="showModal" :max-width="'sm'" @close="closeModal">
            <template #title>
                Are you sure to update ({{ buildingName }})?
            </template>

            <template #content>
                <span class="text-red-700">You will not be able to undo after the update</span>
            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button class="ml-2" @click="updateStatus(buildingSlug)">
                    Update
                </jet-danger-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";

export default defineComponent({
    components: {
        Link,
        JetDialogModal,
        JetButton,
        JetDangerButton,
        JetSecondaryButton
    },
    props: {
        buildingStatus: Number,
        buildingName: String,
        buildingSlug: String,
    },
    data() {
        return {
            showModal: false,
        }
    },
    methods: {
        confirmShow() {
            this.showModal = true
        },

        updateStatus(slug) {
            this.$inertia.put(route('buildings.update_status', slug), null, {
                preserveScroll: true,
                onSuccess: () => {
                    this.closeModal()
                    Toast.fire({
                        icon: 'success',
                        title: 'The building updated successfully'
                    })
                },
            })
        },

        closeModal() {
            this.showModal = false
        },
    }
})
</script>
<style scoped>
.btn-sm {
    padding: 6px 2px 5px 3px;
    margin: 2px;
    font-size: 9px;
}
</style>
