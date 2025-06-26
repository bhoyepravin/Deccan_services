<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WaterPurifierRepairResource\Pages;
use App\Models\WaterPurifierRepair;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;

class WaterPurifierRepairResource extends Resource
{
    protected static ?string $model = WaterPurifierRepair::class;
    protected static ?string $navigationIcon = 'heroicon-o-beaker'; // Corrected icon
    protected static ?string $navigationLabel = 'Water Purifier Repair';
    protected static ?string $modelLabel = 'Water Purifier Repair Content';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                            
                        Repeater::make('description_paragraphs')
                            ->label('Description Paragraphs')
                            ->schema([
                                Textarea::make('paragraph')
                                    ->required()
                                    ->columnSpanFull()
                            ])
                            ->defaultItems(3)
                            ->columnSpanFull(),
                            
                        TextInput::make('video_src')
                            ->label('YouTube Video URL')
                            ->url()
                            ->required()
                            ->columnSpanFull(),
                            
                        TextInput::make('video_title')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                Section::make('Repair Process')
                    ->schema([
                        TextInput::make('process_title')
                            ->required()
                            ->maxLength(255),
                            
                        Repeater::make('process_steps')
                            ->label('Repair Process Steps')
                            ->schema([
                                TextInput::make('step')
                                    ->required()
                            ])
                            ->defaultItems(5)
                            ->columnSpanFull(),
                            
                        Textarea::make('process_note')
                            ->label('Additional Note')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                Section::make('Images')
                    ->schema([
                        FileUpload::make('main_images')
                            ->label('Main Images (2 required)')
                            ->image()
                            ->directory('water-purifier-repair/main')
                            ->multiple()
                            ->minFiles(2)
                            ->maxFiles(2)
                            ->required()
                            ->columnSpanFull(),
                            
                        FileUpload::make('gallery_images')
                            ->label('Gallery Images (3 required)')
                            ->image()
                            ->directory('water-purifier-repair/gallery')
                            ->multiple()
                            ->minFiles(3)
                            ->maxFiles(3)
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                Section::make('Call to Action')
                    ->schema([
                        Textarea::make('cta_text')
                            ->label('CTA Text')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('process_title')
                    ->limit(30)
                    ->toggleable(),
                    
                Tables\Columns\ImageColumn::make('main_images')
                    ->stacked()
                    ->limit(2)
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWaterPurifierRepairs::route('/'),
            'create' => Pages\CreateWaterPurifierRepair::route('/create'),
            'edit' => Pages\EditWaterPurifierRepair::route('/{record}/edit'),
        ];
    }
}