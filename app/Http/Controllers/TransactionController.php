<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceTransactionRequest;
use App\Service\TransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function findTransactionsBySource(SourceTransactionRequest $request, TransactionService $service)
    {
        return new JsonResponse($service->findTransactionsBySource($request), 200);
    }
}
