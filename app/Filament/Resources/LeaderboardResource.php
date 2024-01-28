<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\LeaderboardResource\Pages;
use App\Models\Leaderboard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeaderboardResource extends Resource
{
    protected static ?string $model = Leaderboard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Platform';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('GameID')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Textarea::make('Mem')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('Format')
                    ->maxLength(50),
                Forms\Components\TextInput::make('Title')
                    ->maxLength(255)
                    ->default('Leaderboard Title'),
                Forms\Components\TextInput::make('Description')
                    ->maxLength(255)
                    ->default('Leaderboard Description'),
                Forms\Components\Toggle::make('LowerIsBetter')
                    ->required(),
                Forms\Components\TextInput::make('DisplayOrder')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('Author')
                    ->maxLength(32),
                Forms\Components\DateTimePicker::make('Created'),
                Forms\Components\DateTimePicker::make('Updated'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('GameID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Format')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Description')
                    ->searchable(),
                Tables\Columns\IconColumn::make('LowerIsBetter')
                    ->boolean(),
                Tables\Columns\TextColumn::make('DisplayOrder')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Author')
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
            'index' => Pages\ListLeaderboards::route('/'),
            'create' => Pages\CreateLeaderboard::route('/create'),
            'view' => Pages\ViewLeaderboard::route('/{record}'),
            'edit' => Pages\EditLeaderboard::route('/{record}/edit'),
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
