<?php

declare(strict_types=1);

namespace App\Service;

use App\Commons\QueryBus\QueryBus;
use App\Contract\SourceTransactionContract;
use App\Query\FindTransactionsBySource\FindTransactionsBySource;
use App\ValueObject\Source;

class TransactionService
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function findTransactionsBySource(SourceTransactionContract $contract): array
    {
        return $this->queryBus->handle(new FindTransactionsBySource($contract));
    }
}