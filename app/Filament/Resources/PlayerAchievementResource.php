<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\PlayerAchievementResource\Pages;
use App\Models\PlayerAchievement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerAchievementResource extends Resource
{
    protected static ?string $model = PlayerAchievement::class;

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
                Forms\Components\Select::make('achievement_id')
                    ->relationship('achievement', 'title')
                    ->required(),
                Forms\Components\TextInput::make('trigger_id')
                    ->numeric(),
                Forms\Components\TextInput::make('player_session_id')
                    ->numeric(),
                Forms\Components\TextInput::make('unlocker_id')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('unlocked_at'),
                Forms\Components\DateTimePicker::make('unlocked_hardcore_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.ID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievement.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trigger_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('player_session_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unlocker_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unlocked_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unlocked_hardcore_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListPlayerAchievements::route('/'),
            'create' => Pages\CreatePlayerAchievement::route('/create'),
            'view' => Pages\ViewPlayerAchievement::route('/{record}'),
            'edit' => Pages\EditPlayerAchievement::route('/{record}/edit'),
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
