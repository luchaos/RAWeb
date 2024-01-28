<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'fas-newspaper';

    protected static ?string $navigationGroup = 'Community';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'ID'),
                Forms\Components\TextInput::make('Title')
                    ->maxLength(250),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'User')
                    ->searchable()
                    // ->preload()
                    ->required(),
                // Forms\Components\Textarea::make('lead')
                //     ->maxLength(2000)
                //     ->columnSpanFull(),
                Forms\Components\Textarea::make('Payload')
                    ->required()
                    ->maxLength(10000)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('Link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Image')
                    ->maxLength(255),
                Forms\Components\Group::make([
                    Forms\Components\DateTimePicker::make('publish_at'),
                    Forms\Components\DateTimePicker::make('unpublish_at'),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('ID')
                //     ->label('ID')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Author')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('Link')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('Image')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('Timestamp')
                    ->label('Created at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Updated')
                    ->label('Updated at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publish_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unpublish_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('ID', 'DESC')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'view' => Pages\ViewNews::route('/{record}'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
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
