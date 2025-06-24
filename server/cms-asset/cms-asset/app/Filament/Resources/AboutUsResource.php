<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'About Us';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'About Us Section';

    protected static ?string $navigationGroup = 'About Us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                    
                Forms\Components\FileUpload::make('image_url')
                    ->label('Section Image')
                    ->image()
                    ->directory('about-us')
                    ->preserveFilenames(),
                    
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                    
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image'),
                    
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                Filter::make('active')
                    ->query(fn (Builder $query) => $query->where('is_active', true))
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
            // Define your relations here if needed
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}