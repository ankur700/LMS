<?php

namespace App\Filament\Resources\ContactCategoryResource\Pages;

use App\Filament\Resources\ContactCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageContactCategories extends ManageRecords
{
    protected static string $resource = ContactCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
