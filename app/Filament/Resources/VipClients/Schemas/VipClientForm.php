<?php

namespace App\Filament\Resources\VipClients\Schemas;

use App\Models\Brand;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class VipClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Client identity')
                ->description('Keep the public-facing profile precise, polished, and easy for the concierge team to trust.')
                ->icon(Heroicon::OutlinedUserCircle)
                ->columns(2)
                ->schema([
                    Select::make('brand_id')
                        ->label('Brand house')
                        ->options(fn () => Brand::query()->orderBy('name')->pluck('name', 'id'))
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('full_name')
                        ->label('Full name')
                        ->placeholder('Amina Ruzindana')
                        ->prefixIcon(Heroicon::OutlinedIdentification)
                        ->required()
                        ->maxLength(255),
                    TextInput::make('slug')
                        ->label('Public profile slug')
                        ->placeholder('amina-ruzindana')
                        ->helperText('This powers the shareable VIP profile URL.')
                        ->prefixIcon(Heroicon::OutlinedLink)
                        ->required()
                        ->alphaDash()
                        ->unique(ignoreRecord: true),
                    TextInput::make('membership_code')
                        ->label('Membership code')
                        ->placeholder('VIP-1048')
                        ->prefixIcon(Heroicon::OutlinedKey)
                        ->required()
                        ->unique(ignoreRecord: true),
                ]),
            Section::make('Concierge access')
                ->description('Contact details and service readiness for private follow-up.')
                ->icon(Heroicon::OutlinedEnvelope)
                ->columns(2)
                ->schema([
                    TextInput::make('email')
                        ->label('Email address')
                        ->placeholder('client@example.com')
                        ->prefixIcon(Heroicon::OutlinedEnvelope)
                        ->email(),
                    TextInput::make('phone')
                        ->label('Phone number')
                        ->placeholder('+250 7XX XXX XXX')
                        ->prefixIcon(Heroicon::OutlinedPhone)
                        ->tel(),
                    Toggle::make('is_active')
                        ->label('Profile is active')
                        ->helperText('Only active profiles are available on public VIP URLs.')
                        ->default(true),
                ]),
            Section::make('Private service notes')
                ->description('Write the context that makes the experience feel personal.')
                ->icon(Heroicon::OutlinedClipboardDocumentList)
                ->schema([
                    Textarea::make('notes')
                        ->label('Concierge notes')
                        ->placeholder('Preferences, visit context, gifting notes, or private service instructions.')
                        ->rows(6)
                        ->columnSpanFull(),
                ]),
        ])->columns(1);
    }
}
