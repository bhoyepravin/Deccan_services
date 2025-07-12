<?php

namespace App\Filament\Resources\WashingMachineRepairServiceResource\Pages;

use App\Filament\Resources\WashingMachineRepairServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWashingMachineRepairServices extends ListRecords
{
    protected static string $resource = WashingMachineRepairServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
