<?php

namespace App\Filament\Resources\PictureResource\Pages;

use App\Filament\Resources\PictureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPicture extends EditRecord
{
    protected static string $resource = PictureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
