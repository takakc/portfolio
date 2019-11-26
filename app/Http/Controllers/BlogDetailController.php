<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YamlFrontMatter;

class BlogDetailController extends Controller
{
    /**
     * ブログ詳細取得
     *
     * @param  string $name  ファイル名
     * @return array  指定のmarkdownファイルデータ
     */
    public function getBlogDetail(string $name)
    {
        $markdownFilesPath = public_path() . '/assets/blogs/' . $name . '.md';
        $object = YamlFrontMatter::parse(file_get_contents($markdownFilesPath));
        $return['title'] = $object->matter('title');
        $return['body'] = $object->body();

        return $return;
    }
}
