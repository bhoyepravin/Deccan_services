<?php

namespace App\Filament\Resources\MicrowaveRepairDataResource\Pages;

use App\Filament\Resources\MicrowaveRepairDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMicrowaveRepairData extends EditRecord
{
    protected static string $resource = MicrowaveRepairDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
