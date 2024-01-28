<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\ForumResource\Pages;
use App\Models\Forum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ForumResource extends Resource
{
    protected static ?string $model = Forum::class;

    protected static ?string $navigationIcon = 'fas-comments';

    protected static ?string $navigationGroup = 'Community';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('forumable_model')
                    ->maxLength(255),
                Forms\Components\TextInput::make('forumable_id')
                    ->numeric(),
                Forms\Components\TextInput::make('CategoryID')
                    ->numeric(),
                Forms\Components\TextInput::make('Title')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('Description')
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('LatestCommentID')
                    ->numeric(),
                Forms\Components\TextInput::make('DisplayOrder')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\DateTimePicker::make('Created'),
                Forms\Components\DateTimePicker::make('Updated'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('forumable_model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('forumable_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CategoryID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('LatestCommentID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('DisplayOrder')
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
            'index' => Pages\ListForums::route('/'),
            'create' => Pages\CreateForum::route('/create'),
            'view' => Pages\ViewForum::route('/{record}'),
            'edit' => Pages\EditForum::route('/{record}/edit'),
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
