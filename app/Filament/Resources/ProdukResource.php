<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master Produk';
    protected static ?string $navigationLabel = 'Produk List';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('satuan_id')
                    ->required(),
                Forms\Components\TextInput::make('kategori_id')
                    ->required(),
                Forms\Components\TextInput::make('brand_id')
                    ->required(),
                Forms\Components\TextInput::make('harga')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('hpp')
                    ->numeric()
                    ->default(0),
                Forms\Components\Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->queryStringIdentifier('produks')
            ->extremePaginationLinks()
            ->columns([

                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('satuan_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->alignEnd()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hpp')
                    ->alignEnd()
                    ->numeric()
                    ->sortable(),
            ])
            ->striped()
            ->paginated([15, 30, 45, 60, 100, 'all'])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-squares-plus')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->modalIcon('heroicon-o-squares-plus')
                        ->modalHeading('Delete post')
                        // ->label(__('Tambah User'))
                        ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
                        ->modalIconColor('primary')
                        ->modalSubmitActionLabel(__('Simpan'))
                        ->modalCancelActionLabel(__('Batal'))
                        ->modalWidth('2xl')
                    // ->slideOver()
                    ,
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProduks::route('/'),
        ];
    }
}
