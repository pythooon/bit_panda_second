<?php

declare(strict_types=1);

namespace App\Strategy;

class TransactionsCsvTransactionStrategy implements TransactionStrategy
{
    const ID = 0;
    const CODE = 1;
    const AMOUNT = 2;
    const USER_ID = 3;
    const CREATED_AT = 4;
    const UPDATED_AT = 5;

    public function getTransactions(): array
    {
        return $this->readCSV(storage_path('/app/transactions.csv'), ',');
    }

    private function readCSV(string $csvFile, string $delimiter): array
    {
        $fileHandle = fopen($csvFile, 'r');
        while (!feof($fileHandle)) {
            $data[] = fgetcsv($fileHandle, 0, $delimiter);
        }
        fclose($fileHandle);
        return $this->map($data);
    }

    private function map(array $data): array
    {
        $newData = [];
        $arrayKeys = $data[0];
        unset($data[0]);

        foreach ($data as $item) {
            $newData[] = [
                $arrayKeys[self::ID] => (int) $item[self::ID],
                $arrayKeys[self::CODE] => $item[self::CODE],
                $arrayKeys[self::AMOUNT] => $item[self::AMOUNT],
                $arrayKeys[self::USER_ID] => (int) $item[self::USER_ID],
                $arrayKeys[self::CREATED_AT] => $item[self::CREATED_AT],
                $arrayKeys[self::UPDATED_AT] => $item[self::UPDATED_AT]
            ];
        }

        return $newData;
    }
}