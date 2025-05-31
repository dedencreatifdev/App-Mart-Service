<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermisiResource\Pages;
use App\Filament\Resources\PermisiResource\RelationManagers;
use App\Models\Permisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermisiResource extends Resource
{
    protected static ?string $model = Permisi::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('level_id')
                    ->required()
                    ->maxLength(36),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('list'),
                Forms\Components\Toggle::make('detail'),
                Forms\Components\Toggle::make('tambah'),
                Forms\Components\Toggle::make('ubah'),
                Forms\Components\Toggle::make('hapus'),
                Forms\Components\Toggle::make('hapus_semua'),
                Forms\Components\Toggle::make('import'),
                Forms\Components\Toggle::make('export'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('list')
                    ->boolean(),
                Tables\Columns\IconColumn::make('detail')
                    ->boolean(),
                Tables\Columns\IconColumn::make('tambah')
                    ->boolean(),
                Tables\Columns\IconColumn::make('ubah')
                    ->boolean(),
                Tables\Columns\IconColumn::make('hapus')
                    ->boolean(),
                Tables\Columns\IconColumn::make('hapus_semua')
                    ->boolean(),
                Tables\Columns\IconColumn::make('import')
                    ->boolean(),
                Tables\Columns\IconColumn::make('export')
                    ->boolean(),
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ,
                ]),
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
            'index' => Pages\ListPermisis::route('/'),
            'create' => Pages\CreatePermisi::route('/create'),
            'edit' => Pages\EditPermisi::route('/{record}/edit'),
        ];
    }
}
