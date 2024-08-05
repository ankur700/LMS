<?php

namespace App\Filament\Widgets;

use App\Models\BookIssue;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBookIssues extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => BookIssue::query()->latest())
            ->columns([
                TextColumn::make('book.title'),
                TextColumn::make('employee.name'),
                TextColumn::make('issue_date'),
                TextColumn::make('return_date'),
            ]);
    }
}
