<?php

namespace App\Filament\Resources\PictureResource\Pages;

use App\Filament\Resources\PictureResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePicture extends CreateRecord
{
    protected static string $resource = PictureResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
