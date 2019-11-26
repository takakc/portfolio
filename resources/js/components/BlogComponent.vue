<template>
    <div id="blog" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                Blog 個人メモ
            </div>
        </div>
        <div class="page-content">
            <div id='attributes'>
                <template v-for="blogAttribute in blogAttributes">
                    <router-link v-bind:to="{name: 'blog-detail',params: {name: blogAttribute.file_name}}" class='attribute' :key="blogAttribute.title">
                        <div class='attribute-date'>{{ blogAttribute.created_at }}</div>
                        <div class='attribute-title'>{{ blogAttribute.title }}</div>
                    </router-link>
                </template>
            </div>
            <!-- <div v-html="compiledMarkdownText" /> -->
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogComponent",
        data () {
            return {
                markdownText: '',
                blogAttributes: [],
            }
        },
        mounted() {
            this.init()
        },
        methods: {
            init() {
                const url = '/get-blogs/';
                axios.get(url).then(response => {
                    let returnData = response.data;
                    if(returnData) {
                        this.blogAttributes = Object.assign(
                            [],
                            this.blogAttributes,
                            returnData
                        )
                    } else {
                    }
                }).catch(error => {
                    console.log(error);
                });

            },
            back () {
                this.$router.push({ name: 'top' });
            },
        },
    }
</script>
