<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserStoreResource\Pages;
use App\Filament\Resources\UserStoreResource\RelationManagers;
use App\Models\Store;
use App\Models\User;
use App\Models\UserStore;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use PhpOption\Option;

class UserStoreResource extends Resource
{
    protected static ?string $model = UserStore::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Customer')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('store_id')
                    ->label('Store')
                    ->options(Store::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user_id')
                    ->formatStateUsing(fn (UserStore $record): string => "{$record->user->name}"),
                Tables\Columns\TextColumn::make('store_id')
                    ->formatStateUsing(fn (UserStore $record): string => "{$record->store->name}")

            ])
            ->filters([
                //
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
            'index' => Pages\ListUserStores::route('/'),
            'create' => Pages\CreateUserStore::route('/create'),
            'edit' => Pages\EditUserStore::route('/{record}/edit'),
        ];
    }
}
