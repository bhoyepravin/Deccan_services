<?php

// app/Filament/Resources/ContactSubmissionResource/Pages/ViewContactSubmission.php
namespace App\Filament\Resources\ContactSubmissionResource\Pages;

use App\Filament\Resources\ContactSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContactSubmission extends ViewRecord
{
    protected static string $resource = ContactSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('back')
                ->label('Back to list')
                ->url($this->getResource()::getUrl('index'))
                ->color('gray'),
        ];
    }
}