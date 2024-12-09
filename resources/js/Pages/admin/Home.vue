<script setup>
import { computed, defineProps, onMounted, ref } from 'vue';
import LayoutForAdmin from '@/Layouts/LayoutForAdmin.vue';
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
const editForm = useForm({
    name: '',
    email: '',
    id: ''
});
let searchInput = ref('')
const originalData = ref([]);



let userIdToDelete = ref()
const getIdToDelete = (id) => {
    userIdToDelete.value = id
    console.log(" function called id is " + userIdToDelete)
}
const deleteUser = () => {
    Inertia.delete(route('user.delete', userIdToDelete.value), {
        onSuccess: () => {
            alert("Deleted successfully...")
        },
        onError: () => {
            alert("An error occured while deleting data.")
        }
    })
}

const getData = (data) =>{
    editForm.name = data.name;
    editForm.email = data.email;
    editForm.id = data.id;
}
onMounted(() => {
    tableData.value = props.users
    originalData.value = props.users;
})

const editFunc = () => {
    editForm.put(route('edit.user', editForm.id), {
        onSuccess: () => alert('Done'),
        onError: () => console.log('Error '),
    })

}
</script>

<template>
    <Head title="View users" />
   <LayoutForAdmin>
    <div class="mt-2  container">
        <h1 class="text-dark fw-light mb-2 text-center">All users</h1>
        <div class="container-fluid d-flex justify-content-end mb-3">
            <Link :href="route('add.student')" class="btn btn-primary me-2"> Add Student</Link>
            <Link :href="route('add.instructor')" class="btn btn-secondary"> Add Instructor</Link>
        </div>

        <div class="table table-striped table-responsive pb-5">
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="t-body">
                <tr v-for="data in tableData" :key="data.index">
                    <td>{{ data.id }}</td>
                    <td> {{ data.name }} </td>
                    <td>{{ data.email }}</td>   
                    <td>{{ data.role }}</td>
                    <td>
                        <button class="btn btn-primary me-2 " :class="{'disabled' : data.role === 'admin' || data.role === 'superadmin'}" data-bs-toggle="modal" data-bs-target="#edit" @click="getData(data)">Edit</button>
                        <button class="btn btn-warning" :class="{'disabled' : data.role === 'admin' || data.role === 'superadmin'}" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="getIdToDelete(data.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </div>
    </div>
   </LayoutForAdmin>


     <!-- Modal to update -->
     <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <form @submit.prevent="editFunc" class="form w-100">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="editForm.name">
                            <label class="mt-2">Email</label>
                            <input type="text" class="form-control" v-model="editForm.email">


                            <div class="d-flex gap-2 mt-2">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit Edited</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                      
                </div>
            </div>
        </div>
    </div>



    <!-- Modal to delete -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body d-flex flex-row gap-1">
                    <div>
                        Are you sure you want to delete selected user?
                    </div>
                    <div class="d-flex flex-row gap-1">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="deleteUser">Yes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>
<style lang="css" scoped>
    .container-fluid div .dot{
        position: relative;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        transform: translateY(-80%);
        margin-right: .5rem;
    }
    td .user-type-color{
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: block;
    }
</style>