<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ChatRepositoryInterface
{
    /**
     * お問合せ一覧取得
     *
     * @param string $token
     * @return Collection
     */
    public function getAll(string $token): Collection;

    /**
     * お問合せ登録
     *
     * @param object $requestData
     * @return int
     */
    public function save(object $requestData);
}
