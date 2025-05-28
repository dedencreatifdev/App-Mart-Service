<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Level;
use App\Models\Permisi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PermisiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PermisiResource\RelationManagers;

class PermisiResource extends Resource
{
    protected static ?string $model = Permisi::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('level_id')
                    ->label('Level')
                    ->options(Level::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Toggle::make('lihat'),
                Forms\Components\Toggle::make('tambah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('lihat')
                    ->boolean(),
                Tables\Columns\IconColumn::make('tambah')
                    ->boolean(),
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
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
            'index' => Pages\ManagePermisis::route('/'),
        ];
    }
}
