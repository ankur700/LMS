<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $navigationGroup = 'Manage Address Book';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Forms\Components\Select::make('title')
                ->options(['Mr' => 'Mr', 'Mrs' => 'Mrs', 'Miss' => 'Miss', 'Dr' => 'Dr', 'Prof.' => 'Prof.']),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('designation'),
            Forms\Components\Select::make('language')
            ->options(['english' => 'English', 'nepali' => 'Nepali', 'both' => 'Both']),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('fax')
            ->tel()
            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->numeric(),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->numeric(),
                Forms\Components\TextInput::make('mobile_number')
            ->tel()
            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
            ->mask('+999-999-999-9999')
            ->placeholder('+999-999-999-9999')
            ->stripCharacters('-', '+')
                    ->numeric(),
                Forms\Components\TextInput::make('extension_number')
            ->length(3)
                    ->numeric(),
                Forms\Components\TextInput::make('organisation_name'),
                Forms\Components\TextInput::make('organisation_department'),
                Forms\Components\TextInput::make('organisation_address'),
                Forms\Components\TextInput::make('personal_address_one'),
                Forms\Components\TextInput::make('personal_address_two'),
                Forms\Components\TextInput::make('city'),
                Forms\Components\TextInput::make('state'),
                Forms\Components\TextInput::make('country'),
                Forms\Components\TextInput::make('region'),
                Forms\Components\TextInput::make('zip_code'),
            Forms\Components\TextInput::make('postal_code'),
                Forms\Components\Select::make('contact_category_id')
                    ->relationship('contactCategory', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('designation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mobile_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('extension_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('organisation_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organisation_department')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organisation_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('personal_address_one')
                    ->searchable(),
                Tables\Columns\TextColumn::make('personal_address_two')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->searchable(),

                Tables\Columns\TextColumn::make('contactCategory.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
