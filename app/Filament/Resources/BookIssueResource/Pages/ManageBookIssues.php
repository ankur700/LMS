<?php

namespace App\Filament\Resources\BookIssueResource\Pages;

use App\Filament\Resources\BookIssueResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBookIssues extends ManageRecords
{
    protected static string $resource = BookIssueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
