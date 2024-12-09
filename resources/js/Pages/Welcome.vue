<script setup>
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Welcome" />
     <div class="header d-flex flex-row justify-content-around align-items-center pt-2">
        <div class="logo">SIM System</div>
        <div class="links d-flex gap-3">
            <Link :href="route('login')" class="btn btn-light" > Login</Link>
            <Link :href="route('register')" class="btn btn-primary" > Register</Link>
        </div>
     </div>


     <div class="container text-center mt-5 pt-5">
            <h1 class="text-dark">Streamline Your Campus Experience</h1>
            <p class="text-muted">"Empowering Institutions with Smart Student Information & Management Solutions"</p>
        </div>
</template>
