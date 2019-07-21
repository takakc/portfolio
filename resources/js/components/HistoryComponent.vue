<template>
    <div id="history" class="sub-page">
        <div class="page-content">
            <div class="title m-b-md">
                History
            </div>
            <dl>
                <dt class="year border-bottom(orange)">
                    2015年4月〜
                </dt>
                <dd class="content">
                    WEBエンジニアとして仕事を始める。<br>
                    言語はPHP、フレームワークはCakePHPを利用して従業員管理システムの保守などに主に担当。
                </dd>
                <dt class="year">
                    2017年2月〜
                </dt>
                <dd class="content">
                    同じく言語はPHPのまま、フレームワークはCodeigniterを利用して広告系のシステムを作成、捕手担当。
                    要件定義から保守まで担当したのは初めてでした。
                </dd>
                <dt class="year">
                    2018年2月〜
                </dt>
                <dd class="content">
                    現場に派遣され、物流関係のシステムや記入関係のシステムの保守を担当。
                    PHPでは「Laravel」「ZendFrameWork」「独自FW」を利用、あとは物流のシステムでC#(UWP)を利用。
                </dd>
                <dt class="year">
                    2019年3月〜
                </dt>
                <dd class="content">
                    フリーランスとして活躍中。<br>
                    主にPHPの案件を大阪で活動しています！
                </dd>
            </dl>
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
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
        }
    }
</script>
