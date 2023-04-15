<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DefinitionsResource\Pages;
use App\Models\Definitions;
use Exception;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Validation\Rules\Exists;

class DefinitionsResource extends Resource
{
    protected static ?string $model = Definitions::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('word')->unique()->required(),
                Forms\Components\Radio::make('language')->options([
                    'kankana-ey' => 'Kankana-ey',
                    'english' => 'English'
                ])->required(),
                TextInput::make('word_type'),
                Textarea::make('definitions')->required()
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('word')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('word_type'),
                Tables\Columns\TextColumn::make('language'),
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
