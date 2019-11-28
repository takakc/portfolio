<?php

namespace App\Repositories;

use App\Repositories\BlogRepositoryInterface;
use YamlFrontMatter;

/**
 * Class BlogRepository
 */
class BlogRepository implements BlogRepositoryInterface
{
    public function __construct()
    {
        //
    }

    /**
     * 取得
     * @param string $name
     * @return array
     */
    public function get(string $name): array
    {
        $markdownFilesPath = config('const.blog_path') . $name . '.md';
        $object = YamlFrontMatter::parse(file_get_contents($markdownFilesPath));
        $return['title'] = $object->matter('title');
        $return['body'] = $object->body();

        return $return;
    }

    /**
     * 一覧取得
     * @return array
     */
    public function getAll(): array
    {
        $return = [];
        $markdownFilesPath = config('const.blog_path') . '*';
        foreach(glob($markdownFilesPath) as $file) {
            $object = YamlFrontMatter::parse(file_get_contents($file));
            $return[] = $object->matter();
        }

        return $return;
    }
}
