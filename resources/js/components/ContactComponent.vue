<template>
    <div id="contact" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                Contact お問合せ
            </div>
        </div>
        <div class="modal_button"><button @click="openModal">お問合せ</button></div>
        <div class="page-content">
            <template v-show="Object.keys(this.contacts).length > 0">
                <ul v-for="contact in contacts"
                    :key="contact.id"
                    class='message-list'>
                    <li v-if="contact.direction === 1" class='message-list__message message-list__message--left'>
                        <span>お問合せ内容</span><br>
                        {{ contact.message }}
                    </li>
                    <li v-else class='message-list__message message-list__message--right'>
                        <span>回答</span><br>
                        {{ contact.message }}
                    </li>
                </ul>
            </template>
            <div v-show="Object.keys(this.contacts).length == 0" class='cautions'>
                上部の「お問合せ」ボタンをからお問合せ内容を送信ください。<br>
                ブラウザのセッションを利用しているため、別のブラウザや端末に変更すると受信できません。<br>
                ご了承ください。
            </div>
        </div>
        <div v-show="loading" class="loader">Loading...</div>
        <!-- コンポーネント MyModal -->
        <MyModal @close="closeModal" v-if="modal">
            <p>お問合せ</p>
            <div><textarea v-model="sendMessage"></textarea></div>
            <p v-show="errorDisplay" class='error'>{{errorMessage}}</p>
            <template slot="footer">
                <button v-bind:disabled="loading == true" @click="doSend">送信</button>
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
                modal: false,
                sendMessage: "",
                message: "",
                errorMessage: "",
                loading: false,
                errorDisplay: false,
                contacts: [],
            }
        },
        mounted() {
            this.init()
        },
        computed: {
        },
        methods: {
            // 初期実行
            init () {
                // セッションを元に問合せ内容取得
                const userToken = localStorage.getItem('userToken');
                const url = '/get-contact/' + userToken;
                axios.get(url).then(response => {
                    let returnData = response.data;
                    if(returnData) {
                        this.contacts = Object.assign(
                            {},
                            this.contacts,
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
            openModal() {
                this.modal = true
            },
            closeModal() {
                this.errorDisplay = false
                this.modal = false
                this.loading = false;
            },
            // 送信ボタン押下
            doSend () {
                this.loading = true;
                const url = '/post-contact';
                let sendData = {
                    "message" : this.sendMessage,
                };
                axios.post(url, sendData).then(response => {
                    let returnData = response.data;
                    if (returnData.status == "success") {
                        if(returnData) {
                            this.errorMessage = '';
                            this.events = Object.assign(
                                {},
                                this.events,
                                returnData
                            )
                        }
                        localStorage.setItem('userToken', returnData.session)
                        this.sendMessage = "";
                        this.closeModal()
                        this.init()

                    // エラー時
                    } else {
                        this.errorMessage = returnData.message
                        this.errorDisplay = true
                    }
                    this.loading = false;
                }).catch(error => {
                    console.log(error);
                });
            }
        },
    }
</script>
