<template>
    <div id="history" class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                History
            </div>
            <div class="sub-title m-b-md">
                Kan
            </div>
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HistoryComponent",
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
        },
        methods: {
        }
    }
</script>
