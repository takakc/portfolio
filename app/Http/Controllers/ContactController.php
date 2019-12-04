<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Contactリポジトリの実装
     *
     * @var ContactRepository
    */
    private $contactRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }


    /**
     * お問い合わせ登録
     *
     * @param  App\Http\Requests\ContactRequest  $request
     * @return void
     */
    public function postContact(ContactRequest $request): void
    {
        // エラーチェック
        $validatedData = $request->validated();
        try {
            // 登録
            $this->contactRepository->save($validatedData);
            // Slackのメッセージ
            $sendMessage  = 'お問い合わせ' . "\n" . $request->title . "\n";
            $sendMessage .= $request->email . "\n" . $request->message;
        } catch (Exception $e) {
            $sendMessage  = 'お問い合わせ エラー' . "\n" . $e->getMessage();
        }

        // slackに通知
        if(env('SLACK_URL')) {
            \Slack::send($sendMessage);
        }

        // 表示上は成功したように見せる
        return;
    }
}
