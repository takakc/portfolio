---
title: laravelでvuejs利用
created_at: 2019/11/24
description: laravel,vue
file_name: laravel-vue
---

## 経緯
現場でLaravel + Vuejsを利用したことはあったが初期導入をしたことがなかったのでやってみた

## 環境
- Laravel5.8
- Vue2.5

## vueをLaravelで利用
### 変更内容
#### ファイル変更
##### /resources/views/index.blade.php
```
    <div class="flex-center position-ref full-height main-color">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
+        <div id="app">
+            <example-component></example-component>
+        </div>
    </div>
+    <script src=" {{ mix('js/app.js') }} "></script>
```

##### npm コマンド
```
npm run dev
```

これでトップ画面を確認するとresources/js/components/ExampleComponent.vueの内容が見えるはず

## vue-routerをLaravelで利用する場合
### npmでvueルーターの追加
```
npm install vue-router vue-axios --save
```

### 変更内容
#### ファイル変更
##### /resources/js/app.js
```
require('./bootstrap');

window.Vue = require('vue');
+import VueRouter from 'vue-router';
+Vue.use(VueRouter);
+import VueAxios from 'vue-axios';
+import axios from 'axios';
+import App from './App.vue';
+Vue.use(VueAxios, axios);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

+import TopComponent from './components/TopComponent.vue';
+import AboutComponent from './components/AboutComponent.vue';

+const routes = [
+    {
+        name: 'top',
+        path: '/',
+        component: TopComponent
+    },
+    {
+        name: 'about',
+        path: '/about',
+        component: AboutComponent
+    },
+];
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

+const router = new VueRouter(
+    { mode: 'history', routes: routes}
+);
+const app = new Vue(
+    Vue.util.extend(
+        { router }, App
+    )
+).$mount('#app');
```

##### /routes/web.php
```
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

+Route::get('/{any}', function () {
+    return view('index');
+})->where('any', '.*');
```

/resources/js/app.js内に記載しているようにExampleComponent.vueをコピーして以下の二つを作成
- components/TopComponent.vue
- components/AboutComponent.vue

##### npm コマンド
```
npm run dev
```

これで/aboutにリンクした時にAboutComponentの内容が確認できればOK
