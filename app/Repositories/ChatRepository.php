<?php

namespace App\Repositories;

use App\Models\ChatLog;
use App\Repositories\ChatRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class ChatRepository
 */
class ChatRepository implements ChatRepositoryInterface
{
    private $chatLog;

    public function __construct(ChatLog $chatLog)
    {
        $this->chatLog = $chatLog;
    }


    /**
     * 一覧取得
     *
     * @param string $token
     * @return Collection
     */
    public function getAll(string $token): Collection
    {
        $chatLogs = ChatLog::where('session', $token)
            ->where('is_deleted', false)
            ->orderBy('created_at', 'desc')
            ->get();

        return $chatLogs;
    }


    /**
     * 一覧取得
     *
     * @param object $requestData
     * @return int   登録id
     */
    public function save(object $requestData): int
    {
        $this->chatLog->session = $requestData->session()->get('_token');
        $this->chatLog->message = $requestData->message;
        $this->chatLog->direction = config('const.direction.sendAdmin');
        $this->chatLog->save();

        return $this->chatLog->id;
    }
}
