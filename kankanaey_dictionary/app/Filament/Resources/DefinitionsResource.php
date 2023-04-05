<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DefinitionsResource\Pages;
use App\Filament\Resources\DefinitionsResource\RelationManagers;
use App\Models\Definitions;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class DefinitionsResource extends Resource
{
    protected static ?string $model = Definitions::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('word'),
                TextInput::make('word_type'),
                Textarea::make('definitions')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('word')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('word_type'),
                Tables\Columns\TextColumn::make('definitions')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDefinitions::route('/'),
            'create' => Pages\CreateDefinitions::route('/create'),
            'edit' => Pages\EditDefinitions::route('/{record}/edit'),
        ];
    }
}
