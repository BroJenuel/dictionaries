<?php

namespace App\Filament\Resources\DefinitionsResource\Pages;

use App\Filament\Resources\DefinitionsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDefinitions extends EditRecord
{
    protected static string $resource = DefinitionsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
