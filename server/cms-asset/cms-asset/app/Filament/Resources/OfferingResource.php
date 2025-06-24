<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferingResource\Pages;
use App\Filament\Resources\OfferingResource\RelationManagers;
use App\Models\Offering;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class OfferingResource extends Resource
{
    protected static ?string $model = Offering::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'What We Offer';
    
    protected static ?string $modelLabel = 'Offering';
    protected static ?string $navigationGroup = 'About Us';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('icon_class')
                            ->required()
                            ->maxLength(255)
                            ->label('Icon Class (e.g., fas fa-tools)'),
                            
                        Forms\Components\ColorPicker::make('color')
                            ->required(),
                            
                        Forms\Components\FileUpload::make('image_url')
                            ->label('Service Image')
                            ->image()
                            ->directory('offerings')
                            ->preserveFilenames()
                            ->required(),
                            
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(65535),
                            
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image'),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                    
                Tables\Columns\ColorColumn::make('color'),
            ])
            ->filters([
                Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true))
                    ->default(),
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfferings::route('/'),
            'create' => Pages\CreateOffering::route('/create'),
            'edit' => Pages\EditOffering::route('/{record}/edit'),
        ];
    }
}