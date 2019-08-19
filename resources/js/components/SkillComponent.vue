<template>
    <div id="skill" class="sub-page">
        <div class="content">
            <div class="title m-b-md">
                Skill
            </div>
            <div class="item">
                <h4>PHP</h4>
                <h5>経験年数</h5>
                <ul>
                    <li>5年</li>
                </ul>
                <h5>フレームワーク</h5>
                <ul>
                    <li>Cakephp 1系</li>
                    <li>Cakephp 2系</li>
                    <li>CodeIgniter 2</li>
                    <li>CodeIgniter 3</li>
                    <li>ZendFramework</li>
                    <li>Laravel 5.5～5.7</li>
                </ul>
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
