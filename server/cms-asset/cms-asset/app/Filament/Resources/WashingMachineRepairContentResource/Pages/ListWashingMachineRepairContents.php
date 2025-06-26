<?php

namespace App\Filament\Resources\WashingMachineRepairContentResource\Pages;

use App\Filament\Resources\WashingMachineRepairContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWashingMachineRepairContents extends ListRecords
{
    protected static string $resource = WashingMachineRepairContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
