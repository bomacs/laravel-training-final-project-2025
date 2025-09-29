<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Contracts\Validation\ValidationRule;

class AccessRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::whereEmail($value)->first();

        if (!$user) {
            $fail('Invalid credentials.');
            return;
        }

        if (Filament::getCurrentPanel()->getId() === 'admin' && !$user->is_admin) {
            $fail('Invalid credentials.');
            return;
        }

        if (Filament::getCurrentPanel()->getId() === 'app' && $user->is_admin) {
            $fail('Invalid credentials.');
            return;
        }
    }
}
