<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Exceptions\InvalidArgumentException;

class Source
{
    const DB = 'db';
    const CSV = 'csv';
    private string $value;

    private function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function equals(string $source): bool
    {
        return $this->value === $source;
    }

    private function validate(string $value): void
    {
        if (!($value === self::DB || $value === self::CSV)) {
            throw new InvalidArgumentException('Invalid source, you can choice csv or db');
        }
    }
}