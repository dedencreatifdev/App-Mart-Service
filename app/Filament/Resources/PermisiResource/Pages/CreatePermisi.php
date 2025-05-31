<?php

namespace App\Filament\Resources\PermisiResource\Pages;

use App\Filament\Resources\PermisiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermisi extends CreateRecord
{
    protected static string $resource = PermisiResource::class;
    protected static bool $canCreateAnother = false;
}
