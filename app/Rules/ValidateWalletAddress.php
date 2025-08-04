<?php

namespace App\Rules;

use App\Wallet;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateWalletAddress implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $wallet = new Wallet();
        if (!$wallet->validateAddress($value)) {
            $fail('Invalid AnimeCoin address.');
        }
    }
}
