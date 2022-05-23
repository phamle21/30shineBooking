<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeDetailResource\Pages;
use App\Filament\Resources\EmployeeDetailResource\RelationManagers;
use App\Models\EmployeeDetail;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EmployeeDetailResource extends Resource
{
    protected static ?string $model = EmployeeDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id'),
                Forms\Components\TextInput::make('experience')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('note')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('experience'),
                Tables\Columns\TextColumn::make('note'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListEmployeeDetails::route('/'),
            'create' => Pages\CreateEmployeeDetail::route('/create'),
            'edit' => Pages\EditEmployeeDetail::route('/{record}/edit'),
        ];
    }
}
