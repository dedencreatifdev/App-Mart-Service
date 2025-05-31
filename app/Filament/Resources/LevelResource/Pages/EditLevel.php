<?php

namespace App\Filament\Resources\LevelResource\Pages;

use App\Filament\Resources\LevelResource;
use App\Filament\Resources\LevelResource\Widgets\LevelPermisi;
use App\Models\Permisi;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLevel extends EditRecord
{
    protected static string $resource = LevelResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getFooterWidgetsColumns(): int | array
    {
        return 1;
    }

    protected function getFooterWidgets(): array
    {
        $id = $this->record->id;
        return [
            LevelPermisi::make([
                'id' => $id,
            ]),
        ];
    }
}
