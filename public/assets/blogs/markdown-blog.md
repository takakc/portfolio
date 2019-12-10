---
title: laravelでmarkdownファイルを元にブログを作成
created_at: 2019/11/27
description: laravel,vue
file_name: markdown-blog
---

## ポートフォリオ代わりにアウトプット
- 普通にQiitaに投稿するのではなく、自分で作ってみたくなった。

## 環境
- Laravel5.8
- Vuejs

## 内容
### ブログ一覧画面
- PHPでmarkdownファイルのYAMLヘッダを読み込んで一覧に表示
- PHPから送られてきたデータを元にVue側で一覧表示

### ブログ詳細画面
- PHPでmarkdownファイルの内容を取得
- PHPから送られてきたmarkdown形式をVue側で変換して表示

#### ブログ画面に利用したパッケージ
##### composer
- ファイルのYamlヘッダ部分と内容部分を読み込んでくれるパッケージ
  - [spatie/yaml-front-matter](https://github.com/spatie/yaml-front-matter)
  - [このサイトでの利用](/blog-detail/yaml-front-matter)


##### npm
- markdown形式の内容をHTMLに変換
  - [marked](https://www.npmjs.com/package/marked)
