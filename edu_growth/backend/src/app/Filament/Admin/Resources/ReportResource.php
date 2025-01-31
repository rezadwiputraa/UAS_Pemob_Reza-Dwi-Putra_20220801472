<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReportResource\Pages;
use App\Models\Report;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Hasil Pengembangan Diri';

    protected static ?int $navigationSort = -5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('category')->required(),
                TextInput::make('name')->required(),
                Select::make('client_id')
                    ->relationship('client', 'name')
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'name_course')
                    ->required(),
                Textarea::make('description'),
                DateTimePicker::make('tanggal_jam'),
                Select::make('pembelajaran')
                    ->options([
                        'Online' => 'Online',
                        'Offline' => 'Offline',
                    ])->default('On Progress'),
                Select::make('status')
                    ->options([
                        'On Progress' => 'On Progress',
                        'Finished' => 'Finished',
                    ])->default('On Progress'),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name'),
                TextColumn::make('category'),
                TextColumn::make('client.name')->label('Client'),
                TextColumn::make('course.name')->label('Course'),
                TextColumn::make('description'),
                TextColumn::make('tanggal_jam')
                    ->label('Jadwal Pelatihan')
                    ->dateTime('d/m/Y H:i'),
                TextColumn::make('pembelajaran'),
                TextColumn::make('status'),
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}