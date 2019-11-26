<template>
    <div id="history" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                経歴
            </div>
        </div>
        <dl class="history-list">
            <dt class="history-list__item history-list__item--orange">
                2015年4月〜
            </dt>
            <dd class="history-list__item history-list__item--content">
                WEBエンジニアとして仕事を始める。<br>
                言語はPHP、フレームワークはCakePHPを利用して従業員管理システムの保守などに主に担当。
            </dd>
            <dt class="history-list__item history-list__item--green">
                2017年2月〜
            </dt>
            <dd class="history-list__item history-list__item--content">
                同じく言語はPHPのまま、フレームワークはCodeigniterを利用して広告系のシステムを作成、捕手担当。
                要件定義から保守まで担当したのは初めてでした。
            </dd>
            <dt class="history-list__item history-list__item--blue">
                2018年2月〜
            </dt>
            <dd class="history-list__item history-list__item--content">
                現場に派遣され、物流関係のシステムや記入関係のシステムの保守を担当。
                PHPでは「Laravel」「ZendFrameWork」「独自FW」を利用、あとは物流のシステムでC#(UWP)を利用。
            </dd>
            <dt class="history-list__item history-list__item--purple">
                2019年3月〜
            </dt>
            <dd class="history-list__item history-list__item--content">
                フリーランスとして活躍中。<br>
                主にPHPの案件を大阪で活動しています！<br>
                PGリーダー経験中です。
            </dd>
        </dl>
        <div class="links">
            <router-link to="/" class="nav-link button-color">Top</router-link>
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
            back () {
                this.$router.push({ name: 'top' });
            },
        },
    }
</script>
