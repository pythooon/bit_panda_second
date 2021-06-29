<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Contract\SourceTransactionContract;
use App\ValueObject\Source;
use Illuminate\Foundation\Http\FormRequest;

class SourceTransactionRequest extends FormRequest implements SourceTransactionContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'source' => 'required'
        ];
    }

    public function getSource(): Source
    {
        return Source::fromString($this->get('source'));
    }
}
