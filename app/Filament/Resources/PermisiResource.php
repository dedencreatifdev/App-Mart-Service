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
    // protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('level_id')
                    ->columnSpanFull()
                    ->label('Level')
                    ->options(Level::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Toggle::make('view'),
                Forms\Components\Toggle::make('tambah'),
            ]);
    }

    public static function getTable(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('list')
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('level_id', '=', request('level_id'))->whereNot('name', 'Permisi')->whereNot('name', 'Team');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePermisis::route('/'),
        ];
    }
}
