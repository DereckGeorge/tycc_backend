<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource\RelationManagers;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->options([
                                'financial_institution' => 'Financial Institution',
                                'international_organization' => 'International Organization',
                                'business_association' => 'Business Association',
                                'foundation' => 'Foundation',
                                'government_agency' => 'Government Agency',
                                'corporate_foundation' => 'Corporate Foundation',
                                'academic_institution' => 'Academic Institution',
                            ])
                            ->required(),
                        Forms\Components\FileUpload::make('logo'),
                        Forms\Components\TextInput::make('website')
                            ->url(),
                        Forms\Components\TextInput::make('partnership_since')
                            ->required(),
                        Forms\Components\Select::make('partnership_type')
                            ->options([
                                'Strategic' => 'Strategic',
                                'Implementation' => 'Implementation',
                                'Corporate' => 'Corporate',
                                'Academic' => 'Academic',
                            ]),
                        Forms\Components\Toggle::make('featured')
                            ->default(false),
                        Forms\Components\Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->default('active')
                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required(),
                        Forms\Components\Textarea::make('partnership_details')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('contact_person'),
                        Forms\Components\TextInput::make('contact_email')
                            ->email(),
                        Forms\Components\TagsInput::make('services_provided'),
                        Forms\Components\TagsInput::make('sectors_focus'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'financial_institution' => 'success',
                        'international_organization' => 'info',
                        'business_association' => 'warning',
                        'foundation' => 'danger',
                        'government_agency' => 'primary',
                        'corporate_foundation' => 'purple',
                        'academic_institution' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('partnership_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('partnership_since')
                    ->sortable(),
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
