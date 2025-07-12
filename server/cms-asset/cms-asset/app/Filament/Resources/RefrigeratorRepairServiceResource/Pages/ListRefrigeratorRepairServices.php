<?php

namespace App\Filament\Resources\RefrigeratorRepairServiceResource\Pages;

use App\Filament\Resources\RefrigeratorRepairServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefrigeratorRepairServices extends ListRecords
{
    protected static string $resource = RefrigeratorRepairServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
