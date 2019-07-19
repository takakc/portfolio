<template>
    <div id="skill" class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Skill
            </div>
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SkillComponent",
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
        },
        methods: {
        }
    }
</script>
