<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInformationResource\Pages;
use App\Models\ContactInformation;
use Filament\Forms;
use Filament\Forms\Form; // Correct Form class import
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactInformationResource extends Resource
{
    protected static ?string $model = ContactInformation::class;
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $modelLabel = 'Contact Information';
    protected static ?string $navigationLabel = 'Contact Information';
    protected static ?string $navigationGroup = 'Contact Management';
    protected static ?int $navigationSort = 2;

    // Corrected method signature
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                    
                // Forms\Components\TextInput::make('map_link')
                //     ->url()
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\TextInput::make('regular_hours')
                ->required()
                ->default('9 AM - 5 PM')
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInformation::route('/'),
            'create' => Pages\CreateContactInformation::route('/create'),
            'edit' => Pages\EditContactInformation::route('/{record}/edit'),
        ];
    }
}