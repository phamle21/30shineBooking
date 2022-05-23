<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RewardPointResource\Pages;
use App\Filament\Resources\RewardPointResource\RelationManagers;
use App\Models\RewardPoint;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class RewardPointResource extends Resource
{
    protected static ?string $model = RewardPoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id'),
                Forms\Components\TextInput::make('point')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->searchable()
                ->label('Customer')
                ->formatStateUsing(fn (RewardPoint $record): string => $record->user->name),
                Tables\Columns\TextColumn::make('point')
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
            'index' => Pages\ListRewardPoints::route('/'),
            'create' => Pages\CreateRewardPoint::route('/create'),
            'edit' => Pages\EditRewardPoint::route('/{record}/edit'),
        ];
    }
}
