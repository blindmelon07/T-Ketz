<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Members;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Actions\Tables\ExportBulkAction;
use App\Filament\Resources\MembersResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use App\Filament\Resources\MembersResource\RelationManagers\TicketRelationManager;

class MembersResource extends Resource
{
    protected static ?string $model = Members::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Ticket Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('clientid'),
                Forms\Components\TextInput::make('fullname'),
                Forms\Components\TextInput::make('branch_name'),
                Forms\Components\DatePicker::make('dateofbirth'),
                Forms\Components\TextInput::make('age'),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('cellnumber'),
                Forms\Components\TextInput::make('address'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clientid')->sortable()
                ->searchable() ,
                Tables\Columns\TextColumn::make('fullname')->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('branch_name'),
                Tables\Columns\TextColumn::make('dateofbirth'),
                Tables\Columns\TextColumn::make('age'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('cellnumber'),
                Tables\Columns\TextColumn::make('address'),
                
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
         TicketRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMembers::route('/create'),
            'edit' => Pages\EditMembers::route('/{record}/edit'),
        ];
    }    
}
