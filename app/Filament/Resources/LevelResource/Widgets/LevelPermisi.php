<?php

namespace App\Filament\Resources\LevelResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Doctrine\DBAL\Query\QueryBuilder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LevelPermisi extends BaseWidget
{
    public $id;

    public function table(Table $table): Table
    {
        return $table
        ->heading('Permisi Role')
            ->query(
                \App\Models\Permisi::query()
                    ->where('level_id', $this->id)
                    ->whereNot('name', 'Team')
                    ->whereNot('name', 'Permisi')
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Permisi Role'),
                CheckboxColumn::make('list'),
                CheckboxColumn::make('detail'),
                CheckboxColumn::make('tambah'),
                CheckboxColumn::make('ubah'),
                CheckboxColumn::make('hapus'),
                CheckboxColumn::make('hapus_semua'),
                CheckboxColumn::make('import'),
                CheckboxColumn::make('export'),
            ]);
    }
}
