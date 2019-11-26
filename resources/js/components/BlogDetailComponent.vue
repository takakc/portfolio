<template>
    <div id="blogDetail" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                {{title}} - Blog 個人メモ
            </div>
        </div>
        <div class="page-content">
            <div v-html="markdownText" />
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import marked from 'marked'

    export default {
        name: "BlogDetailComponent",
        data () {
            return {
                title: '',
                markdownText: '',
            }
        },
        mounted() {
            this.init()
        },
        methods: {
            init() {
                const fileName = this.$route.params['name']
                const url = '/get-blog/' + fileName;
                axios.get(url).then(response => {
                    this.title = response.data.title
                    this.markdownText = marked(response.data.body)
                }).catch(error => {
                    console.log(error);
                });

            },
            back () {
                this.$router.push({ name: 'blog' });
            },
        },
    }
</script>
