<?php

namespace App\Filament\App\Resources\Posts\Pages;

use App\Filament\App\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // return [
        //     ...$data,
        //     "user_id" => auth()->id,
        // ];

        Arr::set($data, 'user_id', auth()->id());

        return $data;
    }
}
