<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DealStageResource\Pages;
use App\Filament\Resources\DealStageResource\RelationManagers;
use App\Models\Deal_stage;
use App\Models\DealStage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealStageResource extends Resource
{
    protected static ?string $model = Deal_stage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')->label('Name')->required(),
            Forms\Components\DateTimePicker::make('created_at')->label('Created At')->disabled(),
            Forms\Components\DateTimePicker::make('updated_at')->label('Updated At')->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('created_at')->searchable()->label('Created At'),
            Tables\Columns\TextColumn::make('updated_at')->searchable()->label('Updated At'),
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
            'index' => Pages\ListDealStages::route('/'),
            'create' => Pages\CreateDealStage::route('/create'),
            'edit' => Pages\EditDealStage::route('/{record}/edit'),
        ];
    }
}
