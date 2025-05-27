<?php

namespace App\Filament\Resources\LevelResource\Pages;

use App\Filament\Resources\LevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLevels extends ManageRecords
{
    protected static string $resource = LevelResource::class;
    // protected ?string $subheading = 'Tambah LevelResource';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->createAnother(false)
                ->icon('heroicon-o-squares-plus')
                // ->color('primary')
                // ->requiresConfirmation()
                // ->modalIcon('heroicon-o-squares-plus')
                // ->modalHeading('Delete post')
                // ->label(__('Tambah User'))
                // ->modalDescription('Are you sure you\'d like to delete this post? This cannot be undone.')
                // ->modalIconColor('primary')
                // ->modalSubmitActionLabel(__('Simpan'))
                // ->modalCancelActionLabel(__('Batal'))
                // ->modalHeading(__('Add User'))
                // ->modalWidth('xl')
                // ->slideOver()
                ,
        ];
    }
}
