<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    // protected ?string $subheading = 'Edit UserResource';
    // public string $dd;

    protected function getHeaderActions(): array
    {

        return [
            Actions\ViewAction::make()
                ->label('Detail'),
            Actions\DeleteAction::make()
                ->label('Hapus'),
        ];
    }
}
