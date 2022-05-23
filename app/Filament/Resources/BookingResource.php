<?php

namespace App\Filament\Resources;

use App\Enums\BookingStatus;
use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Forms\Components\Select;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('stylist_id')
                    ->label('Stylist')
                    ->relationship('stylist', 'name')
                    ->disabled(),
                Forms\Components\BelongsToSelect::make('user_id')
                    ->label('Customer')
                    ->relationship('customer', 'name')
                    ->disabled(),
                Forms\Components\BelongsToSelect::make('store_id')
                    ->label('Store')
                    ->relationship('store', 'name')
                    ->disabled(),
                Forms\Components\BelongsToSelect::make('promotion_id')
                    ->label('Promotion')
                    ->relationship('promotion', 'code')
                    ->disabled(),
                Forms\Components\TextInput::make('total')
                    ->disabled()
                    // ->helperText(fn (Booking $record): string => number_format($record->total) . "VNĐ")
                    ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money('đ ', '.', 0))
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(BookingStatus::toSelectArray())
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('user_id')
                    ->label('Customer')
                    ->formatStateUsing(fn (Booking $record): string => "{$record->customer->name}"),
                Tables\Columns\TextColumn::make('store_id')
                    ->label('Store')
                    ->formatStateUsing(fn (Booking $record): string => "{$record->store->name}"),
                Tables\Columns\TextColumn::make('promotion_id')
                    ->label('Promotion')
                    ->extraAttributes(['class' => 'text-center'])
                    ->formatStateUsing(fn (Booking $record): string => "{$record->promotion->percent}%"),
                Tables\Columns\TextColumn::make('booking_at')
                    ->date(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->extraAttributes(['class' => 'text-center'])
                    ->formatStateUsing(fn (Booking $record): string => number_format($record->total) . "VNĐ"),
                Tables\Columns\TextColumn::make('status'),

            ])
            ->filters([
                //
            ])
            ->bulkActions([
                //
            ])
            // Add the actions before the default action/s (before Edit or View)
            ->prependActions([
                Action::make('detail')
                    ->label('Detail')
                    ->url(fn (Booking $record): string => route('filament.resources.bookings.detail', $record))
                    ->icon('heroicon-s-eye'),
            ])
            // Add the actions after the default action/s (after Edit or View)
            ->pushActions([]);
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
            'index' => Pages\ListBookings::route('/'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
            'detail' => Pages\DetailBooking::route('/{record}/detail'),
        ];
    }
}
