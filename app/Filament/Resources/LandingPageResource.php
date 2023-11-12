<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageResource\Pages;
use App\Filament\Resources\LandingPageResource\RelationManagers;
use App\Models\LandingPage;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class LandingPageResource extends Resource
{
    protected static ?string $model = LandingPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('content')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('content')
                                    ->image()
                                    ->maxSize(1024)
                                    ->optimize('webp')
                                    ->resize(65)
                                    ->directory('content-landing'),
                                Forms\Components\TextInput::make('link')
                                    ->required(),

                            ])
                    ]),
                Forms\Components\Toggle::make('isActive')
                    ->required(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content')->view('filament.tables.columns.landing_page.content'),
                ToggleColumn::make('isActive'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        for ($i = 0; $i < count($record->content); $i++) {
                            Storage::delete($record->content[$i]['content']);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            foreach ($records as $record) {
                                for ($i = 0; $i < count($record->content); $i++) {
                                    Storage::delete($record->content[$i]['content']);
                                }
                            }
                        }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListLandingPages::route('/'),
            'create' => Pages\CreateLandingPage::route('/create'),
            'edit' => Pages\EditLandingPage::route('/{record}/edit'),
        ];
    }
}
