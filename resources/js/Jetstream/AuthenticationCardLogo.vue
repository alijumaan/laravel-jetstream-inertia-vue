<template>
    <Link :href="'/'">
        <img src="@asset/img/logo.png" alt="" width="150">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
