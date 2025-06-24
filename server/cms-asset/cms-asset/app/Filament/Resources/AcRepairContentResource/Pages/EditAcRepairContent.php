<?php

namespace App\Filament\Resources\AcRepairContentResource\Pages;

use App\Filament\Resources\AcRepairContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcRepairContent extends EditRecord
{
    protected static string $resource = AcRepairContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
