<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // お問い合わせテーブル
    private $Contact;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Contact = new Contact();
    }


    /**
     * お問い合わせ取得
     *
     * @param  string  $token
     * @return object  contacts
     */
    public function getContact(?string $token)
    {
        $token = \Session::get('_token');
        $contacts = Contact::where('session', $token)
            ->where('is_deleted', false)
            ->take(10)
            ->orderBy('created_at', 'desc')
            ->get();

        return $contacts;
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

        $contact = $this->Contact;
        $contact->session = $request->session()->get('_token');
        $contact->message = $request->message;
        $contact->direction = config('const.direction.sendAdmin');
        $contact->save();

        // slackに通知
        // \Slack::send($contact->session . "\n" . $contact->message);

        return [
            'status' => 'success',
            'message' => $request->message,
            'session' => $request->session()->get('_token'),
        ];
    }
}
