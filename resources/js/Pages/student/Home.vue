<script setup>
import { computed, defineProps, onMounted, ref } from 'vue';
import StudentLayout from '@/Layouts/StudentLayout.vue';
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
   <StudentLayout>
    <div class="mt-2  container">
        <h1 class="text-dark fw-light mb-2 text-center">My Data</h1>
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
    </div>
   </StudentLayout>




</template>
<style lang="css" scoped>

</style>