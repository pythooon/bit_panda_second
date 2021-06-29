<?php

declare(strict_types=1);

namespace App\View;

use Carbon\Carbon;

class TransactionView
{
    private int $id;
    private string $code;
    private float $amount;
    private int $userId;
    private Carbon $updatedAt;
    private Carbon $createdAt;

    public function __construct(int $id, string $code, float $amount, int $userId, Carbon $updatedAt, Carbon $createdAt)
    {
        $this->id = $id;
        $this->code = $code;
        $this->amount = $amount;
        $this->userId = $userId;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
    }
}