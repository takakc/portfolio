<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;

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
     * お問合せ登録
     *
     * @param array $requestData
     * @return int   登録id
     */
    public function save(array $requestData): int
    {
        $this->contact->title = $requestData['title'];
        $this->contact->email = $requestData['email'];
        $this->contact->message = $requestData['message'];
        $this->contact->save();

        return $this->contact->id;
    }
}
