<?php

namespace App\Filament\Resources\AcRepairServiceResource\Pages;

use App\Filament\Resources\AcRepairServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcRepairService extends EditRecord
{
    protected static string $resource = AcRepairServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
