<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyChooseUsResource\Pages;
use App\Models\WhyChooseUs;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WhyChooseUsResource extends Resource
{
    protected static ?string $model = WhyChooseUs::class;
    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?string $navigationLabel = 'Why Choose Us';
    protected static ?string $navigationGroup = 'Why Choose Us';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('section_name')
                    ->options([
                        'main_reasons' => 'Main Reasons',
                        'compact_benefits' => 'Compact Benefits',
                        'stats' => 'Statistics',
                    ])
                    ->required()
                    ->live(),
                    
                TextInput::make('icon')
                    ->required()
                    ->visible(fn (Forms\Get $get) => $get('section_name') !== 'stats'),
                    
                TextInput::make('title')
                    ->required()
                    ->visible(fn (Forms\Get $get) => $get('section_name') !== 'stats'),
                    
                Textarea::make('description')
                    ->visible(fn (Forms\Get $get) => $get('section_name') === 'main_reasons')
                    ->columnSpanFull(),
                    
                FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->directory('why-choose-us')
                    ->visible(fn (Forms\Get $get) => $get('section_name') === 'main_reasons'),
                    
                TextInput::make('image_alt')
                    ->label('Image Alt Text')
                    ->visible(fn (Forms\Get $get) => $get('section_name') === 'main_reasons'),
                    
                TextInput::make('number')
                    ->visible(fn (Forms\Get $get) => $get('section_name') === 'stats'),
                    
                TextInput::make('label')
                    ->visible(fn (Forms\Get $get) => $get('section_name') === 'stats'),
                    
                FileUpload::make('stats_background_image')
                    ->label('Stats Background Image')
                    ->image()
                    ->directory('why-choose-us/stats')
                    ->visible(fn (Forms\Get $get) => $get('section_name') === 'stats'),
                    
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section_name')
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'main_reasons' => 'Main Reason',
                        'compact_benefits' => 'Compact Benefit',
                        'stats' => 'Statistic',
                        default => $state,
                    }),
                TextColumn::make('title')->limit(30),
                ImageColumn::make('image_url')->label('Image')->disk('public'),
                TextColumn::make('sort_order'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('section_name')
                    ->options([
                        'main_reasons' => 'Main Reasons',
                        'compact_benefits' => 'Compact Benefits',
                        'stats' => 'Statistics',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('sort_order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhyChooseUs::route('/'),
            'create' => Pages\CreateWhyChooseUs::route('/create'),
            'edit' => Pages\EditWhyChooseUs::route('/{record}/edit'),
        ];
    }
}
