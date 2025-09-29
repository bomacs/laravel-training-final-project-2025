<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Rules\AccessRule;
use Filament\Auth\Pages\Login;
use Filament\Pages\Page;
use Filament\Schemas\Components\Component;

class UserLogin extends Login
{
    protected function getEmailFormComponent(): Component
    {
        return parent::getEmailFormComponent()
            ->rule(new AccessRule);
    }
}
