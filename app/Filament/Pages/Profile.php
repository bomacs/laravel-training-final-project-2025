<?php

namespace App\Filament\Pages;

use Filament\Auth\Pages\EditProfile;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Page;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class Profile extends EditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('avatar')
                    ->avatar()
                    ->imageEditor()
                    ->disk('public')
                    ->visibility('public')
                    ->circleCropper(),

                // ->required()
                // ->rule('required')
                // ->rules(['required']),

                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->rules([
                Password::min(8)
                    ->max(12)
                    ->symbols()
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->uncompromised()
            ]);
    }
}
