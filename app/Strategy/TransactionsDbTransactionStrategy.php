<?php

declare(strict_types=1);

namespace App\Strategy;

use Illuminate\Support\Facades\DB;

class TransactionsDbTransactionStrategy implements TransactionStrategy
{
    public function getTransactions(): array
    {
        $collection = DB::table('transactions')->get('*');
        return $collection->toArray();
    }
}