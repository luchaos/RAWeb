<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\GameHashResource\Pages;
use App\Models\GameHash;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameHashResource extends Resource
{
    protected static ?string $model = GameHash::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Platform';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('system_id')
                    ->relationship('system', 'name'),
                Forms\Components\TextInput::make('hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('crc')
                    ->maxLength(8),
                Forms\Components\TextInput::make('MD5')
                    ->maxLength(32),
                Forms\Components\TextInput::make('sha1')
                    ->maxLength(40),
                Forms\Components\TextInput::make('file_crc')
                    ->maxLength(8),
                Forms\Components\TextInput::make('file_md5')
                    ->maxLength(32),
                Forms\Components\TextInput::make('file_sha1')
                    ->maxLength(40),
                Forms\Components\TextInput::make('file_name_md5')
                    ->maxLength(32),
                Forms\Components\TextInput::make('GameID')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('Created'),
                Forms\Components\TextInput::make('User')
                    ->maxLength(32),
                Forms\Components\TextInput::make('Name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Labels')
                    ->maxLength(255),
                Forms\Components\TextInput::make('file_names'),
                Forms\Components\TextInput::make('file_size')
                    ->numeric(),
                Forms\Components\TextInput::make('parent_id')
                    ->numeric(),
                Forms\Components\TextInput::make('regions'),
                Forms\Components\TextInput::make('languages'),
                Forms\Components\TextInput::make('source')
                    ->maxLength(255),
                Forms\Components\TextInput::make('source_status')
                    ->maxLength(255),
                Forms\Components\TextInput::make('source_version')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('imported_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('system.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('crc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('MD5')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sha1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_crc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_md5')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_sha1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_name_md5')
                    ->searchable(),
                Tables\Columns\TextColumn::make('GameID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Created')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('User')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Labels')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_size')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('source')
                    ->searchable(),
                Tables\Columns\TextColumn::make('source_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('source_version')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imported_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListGameHashes::route('/'),
            'create' => Pages\CreateGameHash::route('/create'),
            'view' => Pages\ViewGameHash::route('/{record}'),
            'edit' => Pages\EditGameHash::route('/{record}/edit'),
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
