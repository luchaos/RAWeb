<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\MemoryNoteResource\Pages;
use App\Models\MemoryNote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemoryNoteResource extends Resource
{
    protected static ?string $model = MemoryNote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Development';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('game_hash_set_id')
                    ->numeric(),
                Forms\Components\TextInput::make('GameID')
                    ->numeric(),
                Forms\Components\TextInput::make('Address')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('AuthorID')
                    ->numeric(),
                Forms\Components\Textarea::make('Note')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('Created'),
                Forms\Components\DateTimePicker::make('Updated'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('game_hash_set_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('GameID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Address')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('AuthorID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Created')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Updated')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemoryNotes::route('/'),
            'create' => Pages\CreateMemoryNote::route('/create'),
            'view' => Pages\ViewMemoryNote::route('/{record}'),
            'edit' => Pages\EditMemoryNote::route('/{record}/edit'),
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
