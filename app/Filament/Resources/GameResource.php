<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Platform';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Title')
                    ->maxLength(80),
                Forms\Components\TextInput::make('ConsoleID')
                    ->numeric(),
                Forms\Components\TextInput::make('ForumTopicID')
                    ->numeric(),
                Forms\Components\TextInput::make('Flags')
                    ->numeric(),
                Forms\Components\TextInput::make('ImageIcon')
                    ->maxLength(50)
                    ->default('/Images/000001.png'),
                Forms\Components\TextInput::make('ImageTitle')
                    ->maxLength(50)
                    ->default('/Images/000002.png'),
                Forms\Components\TextInput::make('ImageIngame')
                    ->maxLength(50)
                    ->default('/Images/000002.png'),
                Forms\Components\TextInput::make('ImageBoxArt')
                    ->maxLength(50)
                    ->default('/Images/000002.png'),
                Forms\Components\TextInput::make('Publisher')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Developer')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Genre')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Released')
                    ->maxLength(50),
                Forms\Components\DateTimePicker::make('released_at'),
                Forms\Components\Textarea::make('releases')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('IsFinal')
                    ->required(),
                Forms\Components\Textarea::make('RichPresencePatch')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('players_total')
                    ->numeric(),
                Forms\Components\TextInput::make('players_hardcore')
                    ->numeric(),
                Forms\Components\TextInput::make('achievement_set_version_hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('achievements_published')
                    ->numeric(),
                Forms\Components\TextInput::make('achievements_unpublished')
                    ->numeric(),
                Forms\Components\TextInput::make('points_total')
                    ->numeric(),
                Forms\Components\TextInput::make('TotalTruePoints')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('GuideURL')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('Created'),
                Forms\Components\DateTimePicker::make('Updated'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ConsoleID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ForumTopicID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Flags')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ImageIcon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ImageTitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ImageIngame')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ImageBoxArt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Publisher')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Developer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Genre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Released')
                    ->searchable(),
                Tables\Columns\TextColumn::make('released_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('IsFinal')
                    ->boolean(),
                Tables\Columns\TextColumn::make('players_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('players_hardcore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievement_set_version_hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('achievements_published')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('achievements_unpublished')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TotalTruePoints')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('GuideURL')
                    ->searchable(),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'view' => Pages\ViewGame::route('/{record}'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
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
