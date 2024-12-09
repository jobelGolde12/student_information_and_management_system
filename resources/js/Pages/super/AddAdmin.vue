<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: "",
  dateofbirth: "",
  gender: "", 
  phonenumber: "",
  email: "",
  password: "",
});

const submitForm = () => {
  form.post(route('create.adminPost') ,{
  onSuccess : () => alert("Data post successfully"),
  onError : (errors) => alert("Error => " + JSON.stringify(errors))
  })
  
};
</script>
<template>
     <div class="student-container mt-5 px-5">
      <h1 class="text-center">Create Admin</h1>
      <form @submit.prevent="submitForm" class="h-auto">
        <!-- Name -->
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control" v-model="form.name" required />
  
  
        <!-- Email -->
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" class="form-control" v-model="form.email" required />
  
         <!-- Password -->
          <label for="password" class="form-label">Password</label>
          <input type="text" id="password" class="form-control" v-model="form.password" required />
  
       
  
          <button type="submit" class="btn btn-dark me-3">Submit</button>
          <Link :href="route('dashboard')" class="btn btn-secondary">Back to home</Link>
      </form>
    </div>
</template>

<style lang="css" scoped>
.student-container{
    position: absolute;
    min-width: 100%;
    height: auto;
    overflow-x:hidden;
}
form{
  width: 100%; 
}
</style>