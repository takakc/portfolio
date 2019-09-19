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
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TopComponent",
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
        },
        methods: {
            skill: function () {
            },
            history: function () {
            },
        }
    }
</script>
