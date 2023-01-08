<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tickets;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Tables\Columns\TextInput;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TicketsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TicketsResource\RelationManagers;
use App\Filament\Resources\TicketsResource\RelationManagers\MembersRelationManager;
use Filament\Resources\RelationManagers\RelationManager;

class TicketsResource extends Resource
{
    protected static ?string $model = tickets::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Ticket Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ticket_code') ,
                Forms\Components\TextInput::make('quantity')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               Tables\Columns\TextColumn::make('ticket_code')->searchable(),
                Tables\Columns\TextColumn::make('quantity'),   
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            MembersRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTickets::route('/create'),
            'edit' => Pages\EditTickets::route('/{record}/edit'),
        ];
    }    
}
