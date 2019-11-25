<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YamlFrontMatter;

class BlogController extends Controller
{
    /**
     * ブログ取得
     *
     * @return object  contacts
     */
    public function getBlog()
    {
        $markdownFilesPath = public_path() . '/assets/blogs/*';
        foreach(glob($markdownFilesPath) as $file) {
            $object = YamlFrontMatter::parse(file_get_contents($file));
            $return[] = $object->matter();
        }

        return $return;
    }
}
