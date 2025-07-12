<?php

namespace App\Filament\Resources\MicrowaveOvenRepairServiceResource\Pages;

use App\Filament\Resources\MicrowaveOvenRepairServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMicrowaveOvenRepairServices extends ListRecords
{
    protected static string $resource = MicrowaveOvenRepairServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
