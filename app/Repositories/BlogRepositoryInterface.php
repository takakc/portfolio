<?php

namespace App\Repositories;

interface BlogRepositoryInterface
{
    /**
     * 指定のmarkdownファイルデータ取得
     *
     * @param string $name markdownファイル名
     * @return array
     */
    public function get(string $name): array;

    /**
     * markdownファイルデータ一覧取得
     *
     * @return array
     */
    public function getAll(): array;
}
