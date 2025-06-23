<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StepResource\Pages;
use App\Models\Step;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StepResource extends Resource
{
    protected static ?string $model = Step::class;
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup = 'Home Page';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('icon')
                    ->options([
                        'phone' => 'Phone',
                        'calendar' => 'Calendar',
                        'search' => 'Search',
                        'check-circle' => 'Check Circle',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('image_url')
                    ->image()
                    ->directory('steps')
                    ->required(),
                Forms\Components\Select::make('color')
                    ->options([
                        'bg-blue-100' => 'Blue',
                        'bg-green-100' => 'Green',
                        'bg-yellow-100' => 'Yellow',
                        'bg-pink-100' => 'Pink',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
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
            ])
            ->reorderable('order');
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
            'index' => Pages\ListSteps::route('/'),
            'create' => Pages\CreateStep::route('/create'),
            'edit' => Pages\EditStep::route('/{record}/edit'),
        ];
    }
}
