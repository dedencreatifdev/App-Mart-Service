<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    // protected ?string $subheading = 'Daftar UserResource';

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
