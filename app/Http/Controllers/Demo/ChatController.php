<?php

namespace App\Http\Controllers\Demo;

use App\Http\Requests\ChatRequest;
use App\Repositories\ChatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ChatController extends \App\Http\Controllers\Controller
{
    /**
     * Chatリポジトリの実装
     *
     * @var ChatRepository
    */
    private $chatRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }


    /**
     * お問い合わせ取得
     *
     * @param  string  $token
     * @return Collection  chats
     */
    public function getChat(?string $token): Collection
    {
        $token = \Session::get('_token');

        return $this->chatRepository->getAll($token);
    }


    /**
     * お問い合わせ登録
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function postChat(Request $request)
    {
        // エラーチェック
        $requestData['message'] = $request->message;
        $ChatRequest = new ChatRequest;
        $validator = \Validator::make(
            $requestData,
            $ChatRequest->rules(),
            $ChatRequest->messages()
        );
        $validator->setAttributeNames($ChatRequest->attributes());
        if ($validator->fails()) {
            // エラー時
            $return['status'] = 'error';
            $return['message'] = $validator->errors()->first();
            return $return;
        }

        // 登録
        $this->chatRepository->save($request);

        // slackに通知
        if(env('SLACK_URL')) {
            \Slack::send($request->session()->get('_token') . "\n" . $request->message);
        }

        return [
            'status' => 'success',
            'message' => $request->message,
            'session' => $request->session()->get('_token'),
        ];
    }
}
