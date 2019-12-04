<?php

namespace App\Repositories;


interface ContactRepositoryInterface
{
    /**
     * お問合せ登録
     *
     * @param array $requestData
     * @return int
     */
    public function save(array $requestData);
}
