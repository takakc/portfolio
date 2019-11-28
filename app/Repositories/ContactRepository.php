<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class ContactRepository
 */
class ContactRepository implements ContactRepositoryInterface
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }


    /**
     * 一覧取得
     *
     * @param string $token
     * @return Collection
     */
    public function getAll(string $token): Collection
    {
        $contacts = Contact::where('session', $token)
            ->where('is_deleted', false)
            ->orderBy('created_at', 'desc')
            ->get();

        return $contacts;
    }


    /**
     * 一覧取得
     *
     * @param object $requestData
     * @return int   登録id
     */
    public function save(object $requestData): int
    {
        $this->contact->session = $requestData->session()->get('_token');
        $this->contact->message = $requestData->message;
        $this->contact->direction = config('const.direction.sendAdmin');
        $this->contact->save();

        return $this->contact->id;
    }
}
