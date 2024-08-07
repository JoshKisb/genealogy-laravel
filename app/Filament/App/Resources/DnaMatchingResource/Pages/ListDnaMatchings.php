<?php

namespace App\Filament\App\Resources\DnaMatchingResource\Pages;

use App\Filament\App\Resources\DnaMatchingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDnaMatchings extends ListRecords
{
    protected static string $resource = DnaMatchingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
