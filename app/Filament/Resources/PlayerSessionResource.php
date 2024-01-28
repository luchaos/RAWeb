<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\PlayerSessionResource\Pages;
use App\Models\PlayerSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class PlayerSessionResource extends Resource
{
    protected static ?string $model = PlayerSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Players';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'ID'),
                Forms\Components\TextInput::make('game_hash_set_id')
                    ->numeric(),
                Forms\Components\TextInput::make('game_hash_id')
                    ->numeric(),
                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'title'),
                Forms\Components\Toggle::make('hardcore'),
                Forms\Components\Textarea::make('rich_presence')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('rich_presence_updated_at'),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('game_hash_set_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game_hash_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('hardcore')
                    ->boolean(),
                Tables\Columns\TextColumn::make('rich_presence_updated_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
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
            'index' => Pages\ListPlayerSessions::route('/'),
            'create' => Pages\CreatePlayerSession::route('/create'),
            'view' => Pages\ViewPlayerSession::route('/{record}'),
            'edit' => Pages\EditPlayerSession::route('/{record}/edit'),
        ];
    }
}
