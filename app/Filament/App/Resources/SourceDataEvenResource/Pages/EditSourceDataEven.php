<?php

namespace App\Filament\App\Resources\SourceDataEvenResource\Pages;

use App\Filament\App\Resources\SourceDataEvenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSourceDataEven extends EditRecord
{
    protected static string $resource = SourceDataEvenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
