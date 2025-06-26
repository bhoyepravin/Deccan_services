<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcRepairContentResource\Pages;
use App\Filament\Resources\AcRepairContentResource\RelationManagers;
use App\Models\AcRepairContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AcRepairContentResource extends Resource
{
    protected static ?string $model = AcRepairContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench';
    protected static ?string $navigationLabel = 'AC Repair Content';
    protected static ?string $modelLabel = 'AC Repair Content';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                Forms\Components\Section::make('Repair Process')
                    ->schema([
                        Forms\Components\TextInput::make('process_title')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\Textarea::make('process_description')
                            ->required(),
                            
                        Forms\Components\Repeater::make('process_steps')
                            ->schema([
                                Forms\Components\TextInput::make('step')
                                    ->required()
                            ])
                            ->required(),
                            
                        Forms\Components\Textarea::make('process_note')
                            ->required(),
                    ]),
                    
                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('main_images')
                            ->label('Main Images (2 images)')
                            ->image()
                            ->directory('ac-repair/main')
                            ->multiple()
                            ->maxFiles(2)
                            ->required(),
                            
                        Forms\Components\FileUpload::make('gallery_images')
                            ->label('Gallery Images (3 images)')
                            ->image()
                            ->directory('ac-repair/gallery')
                            ->multiple()
                            ->maxFiles(3)
                            ->required(),
                    ]),
                    
                Forms\Components\Section::make('Call to Action')
                    ->schema([
                        Forms\Components\Textarea::make('cta_text')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('process_title')
                    ->limit(30),
                    
                Tables\Columns\ImageColumn::make('main_images')
                    ->stacked()
                    ->limit(2),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAcRepairContents::route('/'),
            'create' => Pages\CreateAcRepairContent::route('/create'),
            'edit' => Pages\EditAcRepairContent::route('/{record}/edit'),
        ];
    }
}