<?php

namespace App\Http\Requests\Article;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'data' => ['json']
        ];
    }
}
