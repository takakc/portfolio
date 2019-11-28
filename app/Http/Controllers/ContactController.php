<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
     * お問い合わせ取得
     *
     * @param  string  $token
     * @return Collection  contacts
     */
    public function getContact(?string $token): Collection
    {
        $token = \Session::get('_token');

        return $this->contactRepository->getAll($token);
    }


    /**
     * お問い合わせ登録
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function postContact(Request $request)
    {
        // エラーチェック
        $requestData['message'] = $request->message;
        $ContactRequest = new ContactRequest;
        $validator = \Validator::make(
            $requestData,
            $ContactRequest->rules(),
            $ContactRequest->messages()
        );
        $validator->setAttributeNames($ContactRequest->attributes());
        if ($validator->fails()) {
            // エラー時
            $return['status'] = 'error';
            $return['message'] = $validator->errors()->first();
            return $return;
        }

        // 登録
        $this->contactRepository->save($request);

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
