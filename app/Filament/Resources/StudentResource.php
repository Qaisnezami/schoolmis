<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Section;
use App\Models\Student;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Settings';


    public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
           
        }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->rules(['max:20'])
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required(),
                Select::make('class_id')
                    ->live()
                    ->relationship('classes', 'name')
                    ->required(),
                Select::make('section_id')
                    ->options(function (Get $get) {
                        $class_id = $get('class_id');
                        if ($class_id) {
                            return Section::where('class_id', $class_id)->pluck('name', 'id')->toArray();
                        }
                    })
                    ->label('Section')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                
                TextColumn::make('classes.name')
                ->badge(),
                TextColumn::make('section.name')
                ->badge(),
            ])
            ->filters([
                SelectFilter::make('class_id')
                    ->label('Class')
                    ->multiple()
                    ->preload()
                    ->relationship('classes','name'),
                SelectFilter::make('section_id')
                ->relationship('section','name')
                ->multiple()
                ->preload()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
