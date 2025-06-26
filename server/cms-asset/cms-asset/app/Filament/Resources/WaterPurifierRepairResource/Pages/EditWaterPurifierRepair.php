<?php

namespace App\Filament\Resources\WaterPurifierRepairResource\Pages;

use App\Filament\Resources\WaterPurifierRepairResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWaterPurifierRepair extends EditRecord
{
    protected static string $resource = WaterPurifierRepairResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
