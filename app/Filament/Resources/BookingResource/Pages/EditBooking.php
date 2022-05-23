<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\ButtonAction;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function getDeleteAction(): Action
    {
        return ButtonAction::make('delete')->hidden();
    }
}
