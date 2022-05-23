<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceStoreResource\Pages;
use App\Filament\Resources\ServiceStoreResource\RelationManagers;
use App\Models\Service;
use App\Models\ServiceStore;
use App\Models\Store;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;

class ServiceStoreResource extends Resource
{
    protected static ?string $model = ServiceStore::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('service_id')
                    ->label('Service')
                    ->options(Service::all()->pluck('name', 'id'))
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
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('service_id')
                    ->label('Service')
                    ->formatStateUsing(fn (ServiceStore $record): string => "{$record->service->name}")
                    ->searchable(),
                Tables\Columns\TextColumn::make('store_id')
                    ->label('Store')
                    ->formatStateUsing(fn (ServiceStore $record): string => "{$record->store->name}")
                    ->searchable()

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
            'index' => Pages\ListServiceStores::route('/'),
            'create' => Pages\CreateServiceStore::route('/create'),
            'edit' => Pages\EditServiceStore::route('/{record}/edit'),
        ];
    }
}
