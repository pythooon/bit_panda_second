<?php

declare(strict_types=1);

namespace App\Query\FindTransactionsBySource;

use App\Contract\SourceTransactionContract;
use App\Strategy\TransactionsDirector;

class FindTransactionsBySourceHandler
{
    private TransactionsDirector $strategyDirector;

    public function __construct(TransactionsDirector $strategyDirector)
    {
        $this->strategyDirector = $strategyDirector;
    }

    public function handle(FindTransactionsBySource $query)
    {
        $contract = $query->getContract();

        return $this->strategyDirector->findTransactions($contract->getSource());
    }
}