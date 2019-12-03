<template>
    <div id='top' class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Portfolio
            </div>
            <div class="sub-title m-b-md">
                Kan
            </div>
            <div class="links">
                <router-link to="/skill" class="nav-link button-color">Skill</router-link>
                <router-link to="/history" class="nav-link button-color">History</router-link>
                <router-link to="/blog" class="nav-link button-color">Blog</router-link>
                <router-link to="/contact" class="nav-link button-color">Contact</router-link>
                <router-link to="/chat" class="nav-link button-color">Chat</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TopComponent",
        mounted() {
        },
        computed: {
        },
        methods: {
        }
    }
</script>
