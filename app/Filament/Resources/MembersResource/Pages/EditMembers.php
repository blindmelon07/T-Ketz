<?php

namespace App\Filament\Resources\MembersResource\Pages;

use App\Filament\Resources\MembersResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembers extends EditRecord
{
    protected static string $resource = MembersResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
