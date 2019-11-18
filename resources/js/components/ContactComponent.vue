<template>
    <div id="contact" class="sub-page">
        <div id='header'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                Portfolio
            </div>
        </div>
        <div class="page-content">
            <div id='messageArea'>
                <ul>
                    <template v-for="contact in contacts">
                        <template v-if="contact.direction === 1">
                            <li class='message left' :key="contact.id">
                                <p>問い合わせ内容</p>{{ contact.message }}
                            </li>
                        </template>
                        <template v-else>
                            <li class='message right' :key="contact.id">
                                <p>回答</p>{{ contact.message }}
                            </li>
                        </template>
                    </template>
                </ul>
            </div>
        </div>
        <div id='bottomArea'>
            <p id="errorMessage">{{ errorMessage }}</p>
            <table id='inputArea'>
                <tr>
                    <td id="inputBox"><input type="text" v-model="message" name="message"></td>
                    <td id="sendButton">
                        <div><button v-on:click="send">送信</button></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactComponent",
        data () {
            return {
                message: "",
                errorMessage: "",
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
            // 送信ボタン押下
            send () {
                const url = '/post-contact';
                let sendData = {
                    "message" : this.message,
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

                    // エラー時
                    } else {
                        this.errorMessage = returnData.message
                    }
                }).catch(error => {
                    console.log(error);
                });
            }
        },
    }
</script>
