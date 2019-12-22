<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;

class BlogController extends Controller
{
    /**
     * ブログリポジトリの実装
     *
     * @var BlogRepository
     */
    private $blogRepository;


    /**
     * ブログコントローラインスタンスの生成
     *
     * @param  BlogRepository  $blog
     * @return void
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    /**
     * ブログ取得
     *
     * @return array  blog
     */
    public function getBlog()
    {
        return $this->blogRepository->getAll();
    }
}
