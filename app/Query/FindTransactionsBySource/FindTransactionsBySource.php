<?php

declare(strict_types=1);

namespace App\Query\FindTransactionsBySource;

use App\Commons\QueryBus\Query;
use App\Contract\SourceTransactionContract;

class FindTransactionsBySource implements Query
{
    private SourceTransactionContract $contract;

    public function __construct(SourceTransactionContract $contract) {
        $this->contract = $contract;
    }

    public function getContract(): SourceTransactionContract
    {
        return $this->contract;
    }
}