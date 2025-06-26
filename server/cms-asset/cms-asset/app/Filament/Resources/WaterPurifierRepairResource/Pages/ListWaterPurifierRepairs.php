<?php

namespace App\Filament\Resources\WaterPurifierRepairResource\Pages;

use App\Filament\Resources\WaterPurifierRepairResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWaterPurifierRepairs extends ListRecords
{
    protected static string $resource = WaterPurifierRepairResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
