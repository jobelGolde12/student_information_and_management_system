<script setup>
import { computed, defineProps, onMounted, ref } from 'vue';
import LayoutForInstructor from '@/Layouts/LayoutForInstructor.vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps({
    subjects: {
        type: Object,
        default: () => ({})
    }
})
const deleteSub = (id) => {
    Inertia.delete(route('delete.subject', id));
    console.log("called the id is " + id)
}

</script>

<template>
    <Head title="View subjects" />
   <LayoutForInstructor>
    <div class="mt-2  container">
        <h1 class="text-dark fw-light mb-2 text-center">All Subjects</h1>

        <div class="table table-striped table-responsive pb-5">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="t-body">
                <tr v-for="data in props.subjects" :key="data.index">
                    <td>{{ data.id }}</td>
                    <td> {{ data.subject_name }} </td>
                    <td>
                        <div class="btn btn-warning" @click="deleteSub(data.id)">Delete</div>
                    </td>
                </tr>
            </tbody>
        </div>
    </div>
   </LayoutForInstructor>



</template>
<style lang="css" scoped>
</style>