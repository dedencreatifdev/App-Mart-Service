<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LevelResource\Pages;
use App\Filament\Resources\LevelResource\RelationManagers;
use App\Models\Level;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->striped()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('akses')
                        ->icon('heroicon-o-clipboard-document-check')
                        ->color('primary')
                        ->label(__('Hak Akses'))
                        ->requiresConfirmation()
                        ->modalIcon('heroicon-o-clipboard-document-check')
                        ->modalHeading('Role Hak Akses')
                        ->modalDescription('Silahkan Ubah Hak Akses Sesuai Role.')
                        ->modalIconColor('primary')
                        ->modalSubmitActionLabel(__('Simpan'))
                        ->modalCancelActionLabel(__('Batal'))
                        ->modalWidth('xl')
                        ->modalContent(


                        ),
                    Tables\Actions\EditAction::make()
                        ->icon('heroicon-o-clipboard-document-check')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->modalIcon('heroicon-o-clipboard-document-check')
                        ->modalHeading('Ubah Pelanggan')
                        ->label(__('Ubah'))
                        ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
                        ->modalIconColor('primary')
                        ->modalSubmitActionLabel(__('Simpan'))
                        ->modalCancelActionLabel(__('Batal'))
                        ->modalWidth('xl'),
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
            'index' => Pages\ManageLevels::route('/'),
        ];
    }
}
