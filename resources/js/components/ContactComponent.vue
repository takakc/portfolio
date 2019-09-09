<template>
    <div id="contact" class="sub-page">
        <div id='header'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                Portfolio
            </div>
        </div>
        <div class="page-content">
            <ul>
                <li>テスト</li>
            </ul>
        </div>
        <div id='inputArea'>
            <div id="inputBox">
                <input type="text" name="">
            </div>
            <button v-on:click="send">送信</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactComponent",
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
        },
        methods: {
            back () {
                this.$router.push({ name: 'top' });
            },
            send () {

            }
        },
    }
</script>
