<template>
    <div>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active">
                <router-link to="/">Home</router-link>
            </li>
            <li role="presentation">
                <router-link to="/about">About</router-link>
            </li>
            <li role="presentation">
                <router-link to="/message">Messages</router-link>
            </li>
            <li role="presentation">
                <router-link to="/register">Register</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "TopMenu"
    }
</script>

<style scoped>

</style>