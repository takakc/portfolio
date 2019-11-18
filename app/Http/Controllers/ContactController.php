<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // お問い合わせテーブル
    private $ContactModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ContactModel = new ContactModel();
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
        $contacts = ContactModel::where('session', $token)
            ->where('is_deleted', false)
            ->take(10)
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

        $contactModel = $this->ContactModel;
        $contactModel->session = $request->session()->get('_token');
        $contactModel->message = $request->message;
        $contactModel->direction = config('const.direction.sendAdmin');
        $contactModel->save();

        return [
            'status' => 'success',
            'message' => $request->message,
            'session' => $request->session()->get('_token'),
        ];
    }
}
