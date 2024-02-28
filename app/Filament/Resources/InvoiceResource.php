<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\Text;  // Add this line for Text column
use Filament\Tables\Columns\Number;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Grid::make([
                Forms\Components\TextInput::make('invoice_number')->label('Invoice Number'),
                Forms\Components\Datepicker::make('invoice_date')->label('Invoice Date'),
                Forms\Components\Datepicker::make('due_date')->label('Due Date'),
                Forms\Components\TextInput::make('total')->label('Total'),
                // Add other fields as needed
            ]),
            Forms\Components\Textarea::make('description')->label('Description'),
            // Add other fields as needed
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('invoice_number')->label('Invoice Number'),
            Tables\Columns\TextColumn::make('invoice_date')->label('Invoice Date'),
            Tables\Columns\TextColumn::make('due_date')->label('Due Date'),
            Tables\Columns\TextColumn::make('total')->label('Total'),
            // Add other columns as needed
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
