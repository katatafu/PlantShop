<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produkty';
    protected static ?string $pluralModelLabel = 'Produkty';
    protected static ?string $modelLabel = 'Produkt';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Název produktu')
                ->required()
                ->maxLength(255),

            TextInput::make('sku')
                ->label('SKU')
                ->required()
                ->maxLength(100),

            Textarea::make('description')
                ->label('Popis')
                ->rows(3),

            TextInput::make('price')
                ->label('Cena (Kč)')
                ->numeric()
                ->required(),

            FileUpload::make('image')
                ->label('Obrázek produktu')
                ->image()
                ->directory('products')
                ->visibility('public')
                ->imagePreviewHeight('200')
                ->panelLayout('integrated'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Obrázek')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Název')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Popis')
                    ->limit(50),

                TextColumn::make('price')
                    ->label('Cena')
                    ->suffix(' Kč')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
