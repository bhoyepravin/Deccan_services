<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefrigeratorRepairServiceResource\Pages;
use App\Models\RefrigeratorRepairService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RefrigeratorRepairServiceResource extends Resource
{
    protected static ?string $model = RefrigeratorRepairService::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Refrigerator Repair';
    protected static ?string $modelLabel = 'Refrigerator Repair Service';
    protected static ?string $navigationGroup = 'Services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Hidden field to ensure page value is always set
                Forms\Components\Hidden::make('page')
                    ->default('RefrigeratorRepairservice')
                    ->required(),
                    
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\FileUpload::make('background_image')
                    ->label('Hero Background Image')
                    ->image()
                    ->directory('refrigerator-repair/hero')
                    ->preserveFilenames(),
                    
                Forms\Components\TextInput::make('video_url')
                    ->label('YouTube Video URL')
                    ->url(),
                    
                Forms\Components\FileUpload::make('uploaded_video_path')
                    ->label('Upload Video')
                    ->directory('refrigerator-repair/videos'),
                    
                Forms\Components\TextInput::make('video_title'),
                
                // Service Description Section
                Forms\Components\Section::make('Service Description')
                    ->schema([
                        Forms\Components\TextInput::make('service_description.title'),
                        Forms\Components\Repeater::make('service_description.description')
                            ->schema([
                                Forms\Components\Textarea::make('paragraph')
                                    ->columnSpanFull()
                            ])
                            ->defaultItems(3)
                    ]),
                
                // Gallery Images
                Forms\Components\FileUpload::make('gallery_images')
                    ->label('Gallery Images')
                    ->multiple()
                    ->image()
                    ->directory('refrigerator-repair/gallery')
                    ->preserveFilenames(),
                
                // Repair Process Section
                Forms\Components\Section::make('Repair Process')
                    ->schema([
                        Forms\Components\TextInput::make('repair_process.title'),
                        Forms\Components\Textarea::make('repair_process.description')
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('repair_process.steps')
                            ->schema([
                                Forms\Components\TextInput::make('step')
                            ]),
                        Forms\Components\Textarea::make('repair_process.note')
                            ->columnSpanFull()
                    ]),
                
                // Final Gallery Images
                Forms\Components\FileUpload::make('final_gallery_images')
                    ->label('Final Gallery Images')
                    ->multiple()
                    ->image()
                    ->directory('refrigerator-repair/final-gallery')
                    ->preserveFilenames(),
                
                // CTA Section
                Forms\Components\Section::make('Call to Action')
                    ->schema([
                        Forms\Components\Textarea::make('cta_section.text')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_section.background'),
                        Forms\Components\TextInput::make('cta_section.border')
                    ]),
                
                // Contact Info
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('contact_info.phone'),
                        Forms\Components\Textarea::make('contact_info.address')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('contact_info.email')
                            ->email()
                    ]),
                
                // Meta Information
                Forms\Components\Section::make('SEO/Meta Information')
                    ->schema([
                        Forms\Components\TextInput::make('meta.title'),
                        Forms\Components\Textarea::make('meta.description')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('meta.keywords')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('background_image')
                    ->label('Hero Image'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListRefrigeratorRepairServices::route('/'),
            'create' => Pages\CreateRefrigeratorRepairService::route('/create'),
            'edit' => Pages\EditRefrigeratorRepairService::route('/{record}/edit'),
        ];
    }
}