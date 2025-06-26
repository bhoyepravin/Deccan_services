<?php


namespace App\Filament\Resources;

use App\Filament\Resources\WashingMachineRepairContentResource\Pages;
use App\Filament\Resources\WashingMachineRepairContentResource\RelationManagers;
use App\Models\WashingMachineRepairContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;

class WashingMachineRepairContentResource extends Resource
{
    protected static ?string $model = WashingMachineRepairContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'Washing Machine Repair';
    protected static ?string $modelLabel = 'Washing Machine Repair Content';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Main Content Section
                Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                            
                        Repeater::make('description_paragraphs')
                            ->label('Description Paragraphs')
                            ->schema([
                                Forms\Components\Textarea::make('paragraph')
                                    ->required()
                                    ->columnSpanFull()
                            ])
                            ->defaultItems(3)
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('video_url')
                            ->label('YouTube Video URL')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('video_title')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                // Repair Process Section
                Section::make('Repair Process')
                    ->schema([
                        Forms\Components\TextInput::make('process_title')
                            ->required()
                            ->maxLength(255),
                            
                        Repeater::make('process_steps')
                            ->label('Repair Process Steps')
                            ->schema([
                                Forms\Components\TextInput::make('step')
                                    ->required()
                            ])
                            ->defaultItems(5)
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('process_note')
                            ->label('Additional Note')
                            ->columnSpanFull(),
                    ]),
                    
                // Images Section
                Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('main_images')
                            ->label('Main Images (2 required)')
                            ->image()
                            ->directory('washing-machine-repair/main')
                            ->multiple()
                            ->minFiles(2)
                            ->maxFiles(2)
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\FileUpload::make('gallery_images')
                            ->label('Gallery Images (3 required)')
                            ->image()
                            ->directory('washing-machine-repair/gallery')
                            ->multiple()
                            ->minFiles(3)
                            ->maxFiles(3)
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                // Call to Action Section
                Section::make('Call to Action')
                    ->schema([
                        Forms\Components\Textarea::make('cta_text')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                    
                // Service Buttons Section
                Section::make('Service Navigation Buttons')
                    ->schema([
                        Repeater::make('service_buttons')
                            ->label('Service Links')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                    
                                Forms\Components\TextInput::make('route')
                                    ->required(),
                            ])
                            ->defaultItems(4)
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListWashingMachineRepairContents::route('/'),
            'create' => Pages\CreateWashingMachineRepairContent::route('/create'),
            'edit' => Pages\EditWashingMachineRepairContent::route('/{record}/edit'),
        ];
    }
}
