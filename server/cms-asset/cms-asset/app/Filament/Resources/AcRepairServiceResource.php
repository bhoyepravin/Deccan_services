<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcRepairServiceResource\Pages;
use App\Filament\Resources\AcRepairServiceResource\RelationManagers;
use App\Models\AcRepairService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcRepairServiceResource extends Resource
{
    protected static ?string $model = AcRepairService::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'Services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('page')
                            ->default('acRepair')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('background_image')
                            ->disk('public_uploads')
                            ->directory('ac-repair/hero')
                            ->image()
                            ->required()
                            ->maxSize(10240) // 10MB
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('800')
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Video Section')
                    ->schema([
                        Forms\Components\TextInput::make('video_title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('video_url')
                            ->label('YouTube Video URL')
                            ->url()
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\FileUpload::make('uploaded_video_path')
                            ->label('Or Upload Video')
                            ->disk('public_uploads')
                            ->directory('ac-repair/videos')
                            ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                            ->maxSize(20480) // 20MB
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Service Description')
                    ->schema([
                        Forms\Components\TextInput::make('service_description.title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Repeater::make('service_description.description')
                            ->schema([
                                Forms\Components\Textarea::make('paragraph')
                                    ->required()
                                    ->maxLength(2000)
                            ])
                            ->defaultItems(3)
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Image Gallery')
                    ->schema([
                        Forms\Components\FileUpload::make('gallery_images')
                            ->disk('public_uploads')
                            ->directory('storage/ac-repair/gallery')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->maxSize(5120) // 5MB per image
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('600')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Repair Process')
                    ->schema([
                        Forms\Components\TextInput::make('repair_process.title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('repair_process.description')
                            ->required()
                            ->maxLength(2000)
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('repair_process.steps')
                            ->schema([
                                Forms\Components\TextInput::make('step')
                                    ->required()
                                    ->maxLength(255)
                            ])
                            ->defaultItems(5)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('repair_process.note')
                            ->required()
                            ->maxLength(2000)
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Final Gallery')
                    ->schema([
                        Forms\Components\FileUpload::make('final_gallery_images')
                            ->disk('public_uploads')
                            ->directory('storage')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->maxSize(5120) // 5MB per image
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('600')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('CTA Section')
                    ->schema([
                        Forms\Components\Textarea::make('cta_section.text')
                            ->required()
                            ->maxLength(2000)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_section.background')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cta_section.border')
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Forms\Components\Section::make('Contact Info')
                    ->schema([
                        Forms\Components\TextInput::make('contact_info.phone')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_info.address')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_info.email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Forms\Components\Section::make('Meta Information')
                    ->schema([
                        Forms\Components\TextInput::make('meta.title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('meta.description')
                            ->required()
                            ->maxLength(2000)
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('meta.keywords')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('background_image')
                    ->disk('public_uploads')
                    ->label('Hero Image')
                    ->width(100)
                    ->height(60)
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('video_title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                    
                Tables\Columns\ImageColumn::make('gallery_images')
                    ->disk('public_uploads')
                    ->label('Gallery Images')
                    ->width(100)
                    ->height(60)
                    ->stacked()
                    ->limit(3)
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\ImageColumn::make('final_gallery_images')
                    ->disk('public_uploads')
                    ->label('Final Gallery')
                    ->width(100)
                    ->height(60)
                    ->stacked()
                    ->limit(3)
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
            'index' => Pages\ListAcRepairServices::route('/'),
            'create' => Pages\CreateAcRepairService::route('/create'),
            'edit' => Pages\EditAcRepairService::route('/{record}/edit'),
        ];
    }
}