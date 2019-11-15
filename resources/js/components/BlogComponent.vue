<template>
    <div id="skill" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">? ??</div>
            <div class="header-title m-b-md">
                Portfolio
            </div>
        </div>
        <div class="page-content">
            <div class="title m-b-md">
                Blog
            </div>
            <div v-html="compiledMarkdownText" />
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import marked from 'marked'
    import md from '../../../public/assets/blogs/markdown.md'

    export default {
        name: "SkillComponent",
        data () {
            return {
                markdownText: md.source
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            compiledMarkdownText: function () {
                return marked(this.markdownText)
            }
        },
        methods: {
            back () {
                this.$router.push({ name: 'top' });
            },
        },
    }
</script>
