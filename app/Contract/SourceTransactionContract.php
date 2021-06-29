<?php

declare(strict_types=1);

namespace App\Contract;

use App\ValueObject\Source;

interface SourceTransactionContract
{
    public function getSource(): Source;
}