---
title: PHPでmarkdownのyamlヘッダを読み込む
created_at: 2019/12/10
description: laravel,vue
file_name: yaml-front-matter
---

## 使うことになった経緯
- 自分のブログ用にmarkdownファイルのyamlヘッダを読み込んでview側に送る際に利用しました。

## yamlヘッダとは
- markdownファイル上部にある以下のような箇所で静的サイトジェネレーター等で見かけるかと思います。

```
---
title: testTitle
created_at: 2019/11/25
description: test
file_name: markdown
---
```

### 利用したパッケージ
##### spatie/yaml-front-matter
- ファイルのYamlヘッダ部分と内容部分を読み込んでくれるパッケージ
  - https://github.com/spatie/yaml-front-matter

#### やった内容
##### composer install

```
composer require spatie/yaml-front-matter
```

##### 以下のファイルに利用できるように追加

```php:config/app.php
    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        ...
        'YamlFrontMatter' => Spatie\YamlFrontMatter\YamlFrontMatter::class, // 追加
        ...
```

- あとは使いたいcontrollerで以下のような形で使う

```php:config/app.php
use YamlFrontMatter; // 宣言

    function getMarkdownContents()
    {

        // markdownファイルのファイルパス
        $markdownFilesPath = '/markdown.md';
        // YamlFrontMatterを使って取得
        $object = YamlFrontMatter::parse(file_get_contents($markdownFilesPath));
        // yamlヘッダを配列で取得
        $matter = $object->matter();
        // 内容取得
        $body = $object->body();
        ...
    }

```

- 公式(github)のreadmeにも記載されていました。
