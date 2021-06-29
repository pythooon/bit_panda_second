<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Exceptions\InvalidArgumentException;
use App\ValueObject\Source;

class TransactionsDirector
{
    public function findTransactions(Source $source): array
    {
        switch ($source) {
            case $source->equals(Source::DB):
                $strategy = new TransactionsDbTransactionStrategy();
                break;
            case $source->equals(Source::CSV):
                $strategy = new TransactionsCsvTransactionStrategy();
                break;
            default:
                throw new InvalidArgumentException('Invalid source');
        }

        $context = new TransactionsContext($strategy);

        return $context->do();
    }
}