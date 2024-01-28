<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\LeaderboardEntryResource\Pages;
use App\Models\LeaderboardEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class LeaderboardEntryResource extends Resource
{
    protected static ?string $model = LeaderboardEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Players';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('trigger_id')
                    ->numeric(),
                Forms\Components\TextInput::make('player_session_id')
                    ->numeric(),
                Forms\Components\Select::make('leaderboard_id')
                    ->relationship('leaderboard', 'title')
                    ->required(),
                Forms\Components\TextInput::make('score')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trigger_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('player_session_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leaderboard.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score')
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

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLeaderboardEntries::route('/'),
            'create' => Pages\CreateLeaderboardEntry::route('/create'),
            'view' => Pages\ViewLeaderboardEntry::route('/{record}'),
            'edit' => Pages\EditLeaderboardEntry::route('/{record}/edit'),
        ];
    }
}
