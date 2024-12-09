<script setup>
import { computed, defineProps, onMounted, ref } from 'vue';
import LayoutForInstructor from '@/Layouts/LayoutForInstructor.vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps({
    users: {
        type: Object,
        default: () => ({})
    }
})

let tableData = ref([])
const originalData = ref([]);
const subjectForm = useForm({
    subject_name: ''
});
const addSub = () => {
    subjectForm.post(route('add.subject'), {
        onSuccess: () => alert('added!'),
        onError: (error) => console.log('Error ' + error)
    })
}

onMounted(() => {
    tableData.value = props.users
    originalData.value = props.users;
})

</script>

<template>
    <Head title="View users" />
   <LayoutForInstructor>
    <div class="mt-2  container">
        <h1 class="text-dark fw-light mb-2 text-center">All users</h1>
        <div class="container-fluid d-flex justify-content-end mb-3">
            <button  data-bs-toggle="modal" data-bs-target="#addSub" class="btn btn-primary me-2"> Add Subject</button>
            <Link :href="route('add.subjectRoute')" class="btn btn-dark me-2" > View all subjects </Link>
        </div>

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
                <tr v-for="data in tableData" :key="data.index">
                    <td>{{ data.id }}</td>
                    <td> {{ data.name }} </td>
                    <td>{{ data.email }}</td>   
                    <td>{{ data.role }}</td>
                </tr>
            </tbody>
        </div>
    </div>
   </LayoutForInstructor>

 <!-- Modal to add subject -->
 <div class="modal fade" id="addSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <form @submit.prevent="addSub" class="form w-100">
                            <label>Subject name</label>
                            <input type="text" class="form-control" v-model="subjectForm.subject_name" placeholder="Enter here...">
                            <div class="d-flex gap-2 mt-2">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                      
                </div>
            </div>
        </div>
    </div>


</template>
<style lang="css" scoped>
</style>