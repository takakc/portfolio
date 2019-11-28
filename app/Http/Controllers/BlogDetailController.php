<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;

class BlogDetailController extends Controller
{
    /**
     * ブログリポジトリの実装
     *
     * @var BlogRepository
     */
    private $blogRepository;


    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  BlogRepository  $blogRepository
     * @return void
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    /**
     * ブログ詳細取得
     *
     * @param  string $name  ファイル名
     * @return array  指定のmarkdownファイルデータ
     */
    public function getBlogDetail(string $name)
    {
        return $this->blogRepository->get($name);
    }
}
