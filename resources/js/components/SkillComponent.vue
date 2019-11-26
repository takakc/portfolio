<template>
    <div id="skill" class="sub-page">
        <div id='header' class='sticky-top'>
            <div class="back" @click="back()">＜ 戻る</div>
            <div class="header-title m-b-md">
                技術
            </div>
        </div>
        <div class="skill-list">
            <h4 class='skill-list__title'>PHP</h4>
            <div class="skill-list__detail">
                <h5>経験年数</h5>
                <ul>
                    <li>5年</li>
                </ul>
                <h5>フレームワーク</h5>
                <ul>
                    <li>Cakephp 1系</li>
                    <li>Cakephp 2系</li>
                    <li>CodeIgniter 2</li>
                    <li>CodeIgniter 3</li>
                    <li>ZendFramework</li>
                    <li>Laravel 5.5～5.7</li>
                </ul>
            </div>
            <h4 class='skill-list__title'>SQL</h4>
            <div class="skill-list__detail">
                <h5>利用経験</h5>
                <ul>
                    <li>MySQL</li>
                    <li>PostgreSQL</li>
                </ul>
                <h5>アピール</h5>
                <p>発注関係のシステムでSQLのチューニングも経験があります。</p>
            </div>
            <h4 class='skill-list__title'>JavaScript</h4>
            <div class="skill-list__detail">
                <h5>利用経験</h5>
                <ul>
                    <li>jQuery</li>
                    <li>Vue.js</li>
                </ul>
                <h5>コメント</h5>
                <p>Vue.jsは仕事での利用経験は半年ほどになります。後は自宅で利用して技術向上しています。</p>
            </div>
            <h4 class='skill-list__title'>Server</h4>
            <div class="skill-list__detail">
                <h5>利用経験</h5>
                <ul>
                    <li>Google Cloud Platform</li>
                    <li>その他レンタルサーバ</li>
                </ul>
            </div>
            <h4 class='skill-list__title'>Middleware</h4>
            <div class="skill-list__detail">
                <h5>利用経験</h5>
                <ul>
                    <li>Docker</li>
                </ul>
                <h5>コメント</h5>
                <p>仕事では運用がメインでしたが、家ではdocker-compose.ymlを作ってPHPの開発環境を作ったりしてました。</p>
                <p>最近はLaravelを使っているので、laraDockを利用して開発しています。</p>
            </div>
            <div class="links">
                <router-link to="/" class="nav-link button-color">Top</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SkillComponent",
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
