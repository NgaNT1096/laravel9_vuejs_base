<template>
    <div>Tesstaaa
        <Link :href="route('nga')">Nga</Link>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";
import layoutVue from '@/Components/Layout/layout.vue';
export default {
    layout:layoutVue,
    components:{
        Link
    }

}
</script>

<style>

</style>
