<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Support\DefaultSchemas;
use App\Support\SubscriptionTiers;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Brand identity')
                ->description('Shape how this house appears across internal tools and public VIP moments.')
                ->icon(Heroicon::OutlinedBuildingStorefront)
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Brand name')
                        ->placeholder('Vanta Atelier')
                        ->prefixIcon(Heroicon::OutlinedSparkles)
                        ->required()
                        ->maxLength(255),
                    TextInput::make('slug')
                        ->label('Public slug')
                        ->placeholder('vanta-atelier')
                        ->helperText('Used for clean internal references and future public brand URLs.')
                        ->prefixIcon(Heroicon::OutlinedLink)
                        ->required()
                        ->alphaDash()
                        ->unique(ignoreRecord: true),
                    Select::make('category')
                        ->label('Business type')
                        ->options(DefaultSchemas::categories())
                        ->default('general')
                        ->required()
                        ->helperText('Used to suggest the right default request fields.'),
                    TextInput::make('primary_color')
                        ->label('Primary accent')
                        ->placeholder('#BFA46F')
                        ->helperText('Hex color used to tint this brand lens in Filament.')
                        ->prefixIcon(Heroicon::OutlinedSwatch)
                        ->maxLength(20),
                    TextInput::make('accent_color')
                        ->label('Secondary accent')
                        ->placeholder('#111111')
                        ->prefixIcon(Heroicon::OutlinedSwatch)
                        ->maxLength(20),
                    Textarea::make('description')
                        ->label('Brand note')
                        ->placeholder('Summarize the brand tone, service promise, and client experience.')
                        ->rows(5)
                        ->columnSpanFull(),
                    Toggle::make('is_active')
                        ->label('Active brand')
                        ->helperText('Inactive brands stay in the archive but are kept out of daily workflows.')
                        ->default(true),
                ]),
            Section::make('Client request fields')
                ->description('Start from a preset, then add, remove, or relabel fields for this brand.')
                ->icon(Heroicon::OutlinedClipboardDocumentList)
                ->schema([
                    Repeater::make('form_schema')
                        ->label('Dynamic fields')
                        ->addActionLabel('Add custom field')
                        ->reorderableWithButtons()
                        ->columns(2)
                        ->default(DefaultSchemas::general())
                        ->schema([
                            TextInput::make('label')
                                ->label('Field label')
                                ->placeholder('Special request')
                                ->required(),
                            TextInput::make('variable_name')
                                ->label('Variable name')
                                ->placeholder('special_request')
                                ->alphaDash()
                                ->required(),
                            Select::make('type')
                                ->label('Field type')
                                ->options([
                                    'text' => 'Text',
                                    'number' => 'Number',
                                    'date' => 'Date',
                                    'select' => 'Select',
                                ])
                                ->default('text')
                                ->required(),
                            Toggle::make('is_required')
                                ->label('Required'),
                            TagsInput::make('options')
                                ->label('Select options')
                                ->placeholder('Add an option')
                                ->helperText('Only used when the field type is Select.')
                                ->columnSpanFull(),
                        ]),
                ]),
            Section::make('SLA, billing, and card stock')
                ->description('Manage the manual retainer tier, capacity guard, subscription window, and physical card inventory.')
                ->icon(Heroicon::OutlinedShieldCheck)
                ->columns(2)
                ->schema([
                    Select::make('subscription_tier')
                        ->label('Retainer tier')
                        ->options(SubscriptionTiers::options())
                        ->default('tier_1')
                        ->live()
                        ->required()
                        ->helperText('Controls capacity, insight access, and retention positioning.'),
                    Select::make('subscription_status')
                        ->label('Subscription status')
                        ->options([
                            'active' => 'Active',
                            'trial' => 'Trial',
                            'past_due' => 'Past due',
                            'paused' => 'Paused',
                        ])
                        ->default('active')
                        ->required(),
                    TextInput::make('vip_capacity')
                        ->label('VIP capacity')
                        ->numeric()
                        ->minValue(1)
                        ->default(fn ($get): int => SubscriptionTiers::capacityFor($get('subscription_tier') ?: 'tier_1') ?? 999999)
                        ->helperText('Tier I: 50, Tier II: 250, Tier III can be set high or handled manually.'),
                    TextInput::make('card_stock_remaining')
                        ->label('Metal card stock')
                        ->numeric()
                        ->minValue(0)
                        ->default(0)
                        ->helperText('Dashboard warns the brand when this drops below 5.'),
                    TextInput::make('data_retention_days')
                        ->label('Data retention days')
                        ->numeric()
                        ->minValue(1)
                        ->default(fn ($get): int => SubscriptionTiers::retentionDaysFor($get('subscription_tier') ?: 'tier_1') ?? 3650),
                    DatePicker::make('subscription_end_date')
                        ->label('Subscription end date')
                        ->helperText('Manual billing date used for the SLA/security subscription view.'),
                ]),
        ])->columns(1);
    }
}
