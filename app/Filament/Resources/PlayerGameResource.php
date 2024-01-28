<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\PlayerGameResource\Pages;
use App\Models\PlayerGame;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerGameResource extends Resource
{
    protected static ?string $model = PlayerGame::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Players';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'ID')
                    ->required(),
                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'title')
                    ->required(),
                Forms\Components\TextInput::make('game_hash_id')
                    ->numeric(),
                Forms\Components\TextInput::make('achievement_set_version_hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('achievements_total')
                    ->numeric(),
                Forms\Components\TextInput::make('achievements_unlocked')
                    ->numeric(),
                Forms\Components\TextInput::make('achievements_unlocked_hardcore')
                    ->numeric(),
                Forms\Components\TextInput::make('achievements_beat')
                    ->numeric(),
                Forms\Components\TextInput::make('achievements_beat_unlocked')
                    ->numeric(),
                Forms\Components\TextInput::make('achievements_beat_unlocked_hardcore')
                    ->numeric(),
                Forms\Components\TextInput::make('beaten_percentage')
                    ->numeric(),
                Forms\Components\TextInput::make('beaten_percentage_hardcore')
                    ->numeric(),
                Forms\Components\TextInput::make('completion_percentage')
                    ->numeric(),
                Forms\Components\TextInput::make('completion_percentage_hardcore')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('last_played_at'),
                Forms\Components\TextInput::make('playtime_total')
                    ->numeric(),
                Forms\Components\TextInput::make('time_taken')
                    ->numeric(),
                Forms\Components\TextInput::make('time_taken_hardcore')
                    ->numeric(),
                Forms\Components\TextInput::make('beaten_dates'),
                Forms\Components\TextInput::make('beaten_dates_hardcore'),
                Forms\Components\TextInput::make('completion_dates'),
                Forms\Components\TextInput::make('completion_dates_hardcore'),
                Forms\Components\DateTimePicker::make('beaten_at'),
                Forms\Components\DateTimePicker::make('beaten_hardcore_at'),
                Forms\Components\DateTimePicker::make('completed_at'),
                Forms\Components\DateTimePicker::make('completed_hardcore_at'),
                Forms\Components\DateTimePicker::make('last_unlock_at'),
                Forms\Components\DateTimePicker::make('last_unlock_hardcore_at'),
                Forms\Components\DateTimePicker::make('first_unlock_at'),
                Forms\Components\DateTimePicker::make('first_unlock_hardcore_at'),
                Forms\Components\TextInput::make('points_total')
                    ->numeric(),
                Forms\Components\TextInput::make('points')
                    ->numeric(),
                Forms\Components\TextInput::make('points_hardcore')
                    ->numeric(),
                Forms\Components\TextInput::make('points_weighted_total')
                    ->numeric(),
                Forms\Components\TextInput::make('points_weighted')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.ID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game_hash_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievement_set_version_hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('achievements_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievements_unlocked')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievements_unlocked_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievements_beat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievements_beat_unlocked')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievements_beat_unlocked_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beaten_percentage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beaten_percentage_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completion_percentage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completion_percentage_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_played_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('playtime_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time_taken')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time_taken_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beaten_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('beaten_hardcore_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_hardcore_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_unlock_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_unlock_hardcore_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_unlock_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_unlock_hardcore_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points_weighted_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points_weighted')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPlayerGames::route('/'),
            'create' => Pages\CreatePlayerGame::route('/create'),
            'view' => Pages\ViewPlayerGame::route('/{record}'),
            'edit' => Pages\EditPlayerGame::route('/{record}/edit'),
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
