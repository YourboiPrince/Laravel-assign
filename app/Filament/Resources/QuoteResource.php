<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Filament\Resources\QuoteResource\RelationManagers;
use App\Models\Quote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'sales';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('deal_id')->label('Deal ID')->required(),
            TextInput::make('account_id')->label('Account ID')->required(),
            TextInput::make('contact_id')->label('Contact ID')->required(),
            DateTimePicker::make('quote_date')->label('Quote Date')->required(),
            DateTimePicker::make('expiry_date')->label('Expiry Date')->required(),
            TextInput::make('total')->label('Total')->required(),
            TextInput::make('status')->label('Status')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('deal_id')->searchable(),
            TextColumn::make('account_id')->searchable(),
            TextColumn::make('contact_id')->searchable(),
            TextColumn::make('quote_date')->searchable(),
            TextColumn::make('expiry_date')->searchable(),
            TextColumn::make('total')->searchable(),
            TextColumn::make('status')->searchable(),
        ])
            ->filters([
                //
            ])
            ->actions([
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotes::route('/'),
            'create' => Pages\CreateQuote::route('/create'),
            'edit' => Pages\EditQuote::route('/{record}/edit'),
        ];
    }
}
