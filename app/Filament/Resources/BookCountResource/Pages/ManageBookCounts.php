<?php

namespace App\Filament\Resources\BookCountResource\Pages;

use App\Filament\Resources\BookCountResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBookCounts extends ManageRecords
{
    protected static string $resource = BookCountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
