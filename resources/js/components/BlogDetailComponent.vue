<template>
    <div id="blogDetail" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                KanKan Blog
            </div>
        </div>
        <div class="page-content">
            <h1>{{matter.title}}</h1>
            <template v-show="Object.keys(this.matter.tags).length > 0">
                <ul class='tag-list'>
                    <li v-for="tag in matter.tags"
                        :key="tag"
                    >
                        {{ tag }}
                    </li>
                </ul>
            </template>
            <p>{{matter.created_at}}</p>
            <div v-html="markdownText" class='markdown-body' />
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
                matter: [],
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
                    this.matter.title = response.data.matter.title
                    this.matter.tags = response.data.matter.tags.split(",")
                    this.matter.created_at = response.data.matter.created_at
                    this.markdownText = marked(response.data.body)
                    document.title = response.data.matter.title
                    document.querySelector("meta[name='description']")
                        .setAttribute('content', response.data.matter.description)
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
