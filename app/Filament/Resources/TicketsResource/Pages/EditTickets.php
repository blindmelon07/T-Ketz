<?php

namespace App\Filament\Resources\TicketsResource\Pages;

use App\Filament\Resources\TicketsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTickets extends EditRecord
{
    protected static string $resource = TicketsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
