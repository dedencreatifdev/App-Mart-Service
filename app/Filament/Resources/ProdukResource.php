<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use PhpOption\Option;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Kategori;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master Produk';
    protected static ?string $navigationLabel = 'Produk List';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Select::make('satuan_id')
                    ->label('Satuan')
                    ->options(Satuan::all()->pluck('nama', 'id'))
                    ->required(),
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(Kategori::all()->pluck('nama', 'id'))
                    ->required(),
                TextInput::make('brand_id')
                    ->required(),
                TextInput::make('harga')
                    ->numeric()
                    ->default(0),
                TextInput::make('hpp')
                    ->numeric()
                    ->default(0),
                Textarea::make('keterangan')
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

                TextColumn::make('kode')
                    ->label('Kode Barang')
                    ->searchable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('getSatuan.nama')
                    ->label('Satuan')
                    ->searchable(),
                TextColumn::make('getKategori.nama')
                    ->label('Kategori')
                    ->searchable(),
                TextColumn::make('brand_id')
                    ->label('Brand')
                    ->searchable(),
                TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->searchable(),
                TextColumn::make('harga')
                    ->label('Harga Jual')
                    ->alignEnd()
                    ->numeric(),
                TextColumn::make('hpp')
                    ->label('Harga Hpp')
                    ->alignEnd()
                    ->numeric(),
                TextColumn::make('stok')
                    ->label('Stok Minimal')
                    ->alignEnd()
                    ->numeric(),
                TextColumn::make('disc_max')
                    ->alignEnd()
                    ->numeric(),
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
                    Tables\Actions\EditAction::make()
                        ->color('warning')
                        ->requiresConfirmation()
                        ->modalIcon('heroicon-o-squares-plus')
                        ->modalHeading('Ubah Produk')
                        // ->label(__('Tambah User'))
                        ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
                        ->modalIconColor('warning')
                        ->modalSubmitActionLabel(__('Simpan'))
                        ->modalCancelActionLabel(__('Batal'))
                        ->modalWidth('2xl'),
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
