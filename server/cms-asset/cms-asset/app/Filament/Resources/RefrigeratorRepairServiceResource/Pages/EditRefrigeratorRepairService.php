<?php

namespace App\Filament\Resources\RefrigeratorRepairServiceResource\Pages;

use App\Filament\Resources\RefrigeratorRepairServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefrigeratorRepairService extends EditRecord
{
    protected static string $resource = RefrigeratorRepairServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
