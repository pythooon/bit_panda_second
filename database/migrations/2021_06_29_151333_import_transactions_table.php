<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportTransactionsTable extends Migration
{
    public function up(): void
    {
        DB::unprepared(file_get_contents(__DIR__ . '/transactions.sql'));
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
}
