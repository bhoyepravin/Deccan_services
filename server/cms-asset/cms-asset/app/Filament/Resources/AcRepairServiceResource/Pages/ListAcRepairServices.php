<?php

namespace App\Filament\Resources\AcRepairServiceResource\Pages;

use App\Filament\Resources\AcRepairServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcRepairServices extends ListRecords
{
    protected static string $resource = AcRepairServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
