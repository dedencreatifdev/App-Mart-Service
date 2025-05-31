<?php

namespace App\Filament\Resources\PermisiResource\Pages;

use App\Filament\Resources\PermisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermisi extends EditRecord
{
    protected static string $resource = PermisiResource::class;
    // protected ?string $subheading = 'Edit PermisiResource';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
