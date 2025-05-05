<?php

namespace App\Filament\Resources\FreteResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Enums\FreteStatus;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Database\Eloquent\Model;

class EtapasRelationManager extends RelationManager
{
    protected static string $relationship = 'etapas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('tipo_etapa')
                    ->label('Tipo da Etapa')
                    ->options(FreteStatus::tonameValueArray())
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('descricao')
            ->columns([
                Tables\Columns\TextColumn::make('descricao'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->visible(function(){
                    $frete = $this->getOwnerRecord();
                    return $frete->status !== FreteStatus::ENTREGUE;
                })
                ->after(function(Model $etapa){
                   $tipoEtapa = $this->mountedTableActionsData[0]['tipo_etapa'];
                   $novoFreteStatus = FreteStatus::fromName($tipoEtapa);

                   $etapa->frete->update(['status' => $novoFreteStatus]);
                   return redirect(request()->header('Referer'));

                }),
            ])
            ->actions([
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

public function isReadOnly(): bool
{
    return false;
}

}
