<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryItemResource\Pages;
use App\Filament\Resources\GalleryItemResource\RelationManagers;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Home Page';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                ->disk('public_uploads')
                    ->options([
                        'image' => 'Image',
                        'video' => 'YouTube Video'
                    ])
                    ->required()
                    ->live(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube_id')
                    ->label('YouTube Video ID')
                    ->required()
                    ->visible(fn (Forms\Get $get) => $get('type') === 'video'),
                Forms\Components\FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->directory('gallery')
                    ->required()
                    ->visible(fn (Forms\Get $get) => $get('type') === 'image'),
                Forms\Components\FileUpload::make('thumbnail_url')
                    ->label('Thumbnail (optional)')
                    ->image()
                    ->directory('gallery/thumbnails')
                    ->visible(fn (Forms\Get $get) => $get('type') === 'video'),
                Forms\Components\Select::make('category')
                    ->options([
                        'ac' => 'AC Repair',
                        'washing' => 'Washing Machine',
                        'water' => 'Water Purifier',
                        'microwave' => 'Microwave',
                        'team' => 'Our Team',
                        'customer' => 'Customer Stories'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url')
                    ->label('Preview')
                    ->getStateUsing(function (GalleryItem $record) {
                        return $record->type === 'video' 
                            ? ($record->thumbnail_url ?: "https://i.ytimg.com/vi/{$record->youtube_id}/hqdefault.jpg")
                            : $record->image_url;
                    }),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('category')
                    ->badge(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                ->disk('public_uploads')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Video',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'ac' => 'AC Repair',
                        'washing' => 'Washing Machine',
                        'water' => 'Water Purifier',
                        'microwave' => 'Microwave',
                        'team' => 'Our Team',
                        'customer' => 'Customer Stories'
                    ]),
                Tables\Filters\Filter::make('is_active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleryItems::route('/'),
            'create' => Pages\CreateGalleryItem::route('/create'),
            'edit' => Pages\EditGalleryItem::route('/{record}/edit'),
        ];
    }
}