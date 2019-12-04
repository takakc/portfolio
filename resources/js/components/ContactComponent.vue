<template>
    <div id="contact" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                Contact お問合せ
            </div>
        </div>
        <div class="page-content">
            <div class="form-content">
                <label for="title">タイトル</label>
                <input v-model="title" id="title" class='contact'>
                <p v-html="errors.title" class='error'></p>
            </div>
            <div class="form-content">
                <label for="email">メールアドレス</label>
                <input v-model="email" id="email" class='contact'>
                <p v-html="errors.email" class='error'></p>
            </div>
            <div class="form-content">
                <label for="message">内容</label>
                <textarea v-model="message" id="message" class='contact'></textarea>
                <p v-html="errors.message" class='error'></p>
            </div>
            <div class='form-button'>
                <button @click="doSend">送信</button>
            </div>
        </div>
        <div v-show="loading" class="loader">Loading...</div>

        <!-- 送信後のモーダル -->
        <MyModal @close="closeModal" v-if="modal">
            <p class='modal-title'>お問合せありがとうございました。</p>
            <div>数日以内に返信を致します。<br>1週間以上連絡がない場合は、再度電話などで連絡してみてください。</div>
            <template slot="footer">
                <button @click="closeModal">閉じる</button>
            </template>
        </MyModal>
    </div>
</template>

<script>
    import MyModal from './Parts/ModalComponent'

    export default {
        components: { MyModal },
        name: "ContactComponent",
        data () {
            return {
                title: "",
                email: "",
                message: "",
                errors: [],
                loading: false,
                modal: false,
            }
        },
        mounted() {
        },
        computed: {
        },
        methods: {
            back () {
                this.$router.push({ name: 'top' });
            },
            // 送信ボタン押下
            doSend () {
                this.loading = true;
                const url = '/post-contact';
                const sendData = {
                    "title" : this.title,
                    "email" : this.email,
                    "message" : this.message,
                };
                axios.post(url, sendData).then(response => {
                    this.loading = false;
                    this.openModal();
                }).catch(error => {
                    this.loading = false;
                    // validation error
                    if (error.response.status == 422) {
                        this.errors = []
                        for(var key in error.response.data.errors) {
                            this.errors[key] = error.response.data.errors[key].join('<br>')
                        }
                    }
                });
            },
            openModal() {
                this.modal = true
            },
            closeModal() {
                this.$router.push({ name: 'top' });
            },
        },
    }
</script>
