<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MicrowaveRepairDataResource\Pages;
use App\Models\MicrowaveRepairData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MicrowaveRepairDataResource extends Resource
{
    protected static ?string $model = MicrowaveRepairData::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Microwave Oven Repair';
    protected static ?string $modelLabel = 'Washing Machine Repair Content';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Description')
                    ->schema([
                        Forms\Components\TextInput::make('service_description.title')
                            ->label('Title')
                            ->required(),
                        Forms\Components\Repeater::make('service_description.paragraphs')
                            ->label('Paragraphs')
                            ->schema([
                                Forms\Components\Textarea::make('paragraph')
                                    ->label('Content')
                                    ->required()
                            ]),
                        Forms\Components\TextInput::make('service_description.video.src')
                            ->label('Video URL')
                            ->required(),
                        Forms\Components\TextInput::make('service_description.video.title')
                            ->label('Video Title')
                            ->required(),
                    ]),
                
                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\Repeater::make('images.main')
                            ->label('Main Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->directory('microwave-repair/main')
                                    ->preserveFilenames()
                            ]),
                        Forms\Components\Repeater::make('images.gallery')
                            ->label('Gallery Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->directory('microwave-repair/gallery')
                                    ->preserveFilenames()
                            ]),
                    ]),
                
                Forms\Components\Section::make('Repair Process')
                    ->schema([
                        Forms\Components\TextInput::make('repair_process.title')
                            ->label('Title')
                            ->required(),
                        Forms\Components\Repeater::make('repair_process.steps')
                            ->label('Steps')
                            ->schema([
                                Forms\Components\TextInput::make('step')
                                    ->label('Step Description')
                                    ->required()
                            ]),
                        Forms\Components\Textarea::make('repair_process.note')
                            ->label('Note')
                            ->required(),
                    ]),
                
                Forms\Components\Section::make('CTA Content')
                    ->schema([
                        Forms\Components\Textarea::make('cta_content.text')
                            ->label('Call to Action Text')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service_description.title')
                    ->label('Service Title'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
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
            'index' => Pages\ListMicrowaveRepairData::route('/'),
            'create' => Pages\CreateMicrowaveRepairData::route('/create'),
            'edit' => Pages\EditMicrowaveRepairData::route('/{record}/edit'),
        ];
    }
}
