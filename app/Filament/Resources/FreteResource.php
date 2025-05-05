<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Frete;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FreteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FreteResource\RelationManagers;
use App\Filament\Resources\FreteResource\RelationManagers\EtapasRelationManager;

class FreteResource extends Resource
{
    protected static ?string $model = Frete::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_rastreio')
                ->label('Código de Rastreio')
                ->readOnly()
                ->default('Código Gerado Automaticamente')
                    ->required(),
                Forms\Components\TextInput::make('status')
                ->readOnly()
                ->default('Status padrão (Em Trânsito)')
                    ->required(),
                Forms\Components\TextInput::make('origem')
                    ->required(),
                Forms\Components\TextInput::make('destino')
                    ->required(),
                Forms\Components\Select::make('remetente_id')
                ->label('Remetente')
                ->relationship('remetente', 'nome')
                    ->required(),
                Forms\Components\Select::make('destinatario_id')
                ->label('Destinatário')
                    ->required()
                    ->relationship('destinatario', 'nome'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('origem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destino')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_rastreio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remetente.nome')
                ->label('Remetente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('destinatario.nome')
                ->label('Destinatário')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Data de Criação')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->label('Data da última atualização')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                
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
            EtapasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFretes::route('/'),
            'create' => Pages\CreateFrete::route('/create'),
            'view' => Pages\ViewFrete::route('/{record}'),
            
        ];
    }
}
