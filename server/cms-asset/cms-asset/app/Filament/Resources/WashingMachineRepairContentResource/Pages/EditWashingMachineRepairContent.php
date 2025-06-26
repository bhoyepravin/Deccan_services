<?php

namespace App\Filament\Resources\WashingMachineRepairContentResource\Pages;

use App\Filament\Resources\WashingMachineRepairContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWashingMachineRepairContent extends EditRecord
{
    protected static string $resource = WashingMachineRepairContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
