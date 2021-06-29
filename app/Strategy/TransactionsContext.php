<?php

declare(strict_types=1);

namespace App\Strategy;

class TransactionsContext
{
    private TransactionStrategy $strategy;

    public function __construct(TransactionStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function do(): array
    {
        return $this->strategy->getTransactions();
    }
}