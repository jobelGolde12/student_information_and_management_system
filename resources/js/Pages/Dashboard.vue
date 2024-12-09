<script setup>
import { computed, defineProps, onMounted, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps({
    user: {
        type: Object,
        default: () => ({})
    }
})


</script>

<template>
    <Head title="Student" />
   <AuthenticatedLayout>
    <div class="mt-2  container">
        <h1 class="text-danger fw-light mb-2 text-center">Not enrolled!</h1>
        <div class="table table-striped table-responsive pb-5">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody class="t-body">
                <tr>
                    <td>{{ props.user.id }}</td>
                    <td> {{ props.user.name }} </td>
                    <td>{{ props.user.email }}</td>   
                    <td>{{ props.user.role }}</td>
                </tr>
            </tbody>
        </div>  

        <div class="container bg-success rounded p-5 text-light info">
            Hi {{ props.user.name }} the enrollment is pending... we email you if it is ready.
        </div>
    </div>
   </AuthenticatedLayout>




</template>
<style lang="css" scoped>
.info{
    opacity: 0;
    animation: animateInfo 2s ease forwards;
    animation-delay: 1s;
}
@keyframes animateInfo{
    from {
        opacity: 0;
    }
    to{
        opacity: 1;
    }
}
</style>