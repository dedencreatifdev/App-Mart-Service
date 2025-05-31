<?php

namespace App\Filament\Resources\SatuanResource\Pages;

use App\Filament\Resources\SatuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSatuans extends ListRecords
{
    protected static string $resource = SatuanResource::class;
    // protected ?string $subheading = 'Daftar SatuanResource';

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
