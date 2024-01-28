<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Extensions\Resources\Resource;
use App\Filament\Resources\TicketResource\Pages;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'fas-ticket-simple';

    protected static ?string $navigationGroup = 'Development';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('game_hash_set_id')
                    ->numeric(),
                Forms\Components\TextInput::make('player_session_id')
                    ->numeric(),
                Forms\Components\TextInput::make('ticketable_model')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ticketable_id')
                    ->numeric(),
                Forms\Components\TextInput::make('AchievementID')
                    ->numeric(),
                Forms\Components\TextInput::make('ReportedByUserID')
                    ->numeric(),
                Forms\Components\Toggle::make('ReportType')
                    ->required(),
                Forms\Components\Toggle::make('Hardcore'),
                Forms\Components\Textarea::make('ReportNotes')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('ReportedAt'),
                Forms\Components\DateTimePicker::make('ResolvedAt'),
                Forms\Components\TextInput::make('ResolvedByUserID')
                    ->numeric(),
                Forms\Components\Toggle::make('ReportState')
                    ->required(),
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
                Tables\Columns\TextColumn::make('player_session_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ticketable_model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticketable_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('AchievementID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ReportedByUserID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('ReportType')
                    ->boolean(),
                Tables\Columns\IconColumn::make('Hardcore')
                    ->boolean(),
                Tables\Columns\TextColumn::make('ReportedAt')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ResolvedAt')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ResolvedByUserID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('ReportState')
                    ->boolean(),
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'view' => Pages\ViewTicket::route('/{record}'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
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
