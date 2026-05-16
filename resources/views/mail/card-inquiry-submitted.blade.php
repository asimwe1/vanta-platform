<x-mail::message>
# {{ $senderCopy ? 'We received your APHEZIS request' : 'New APHEZIS card request' }}

@if ($senderCopy)
Hello {{ $inquiry->contact_name }},

This is a copy of the request you sent to APHEZIS. Our team will review the details and follow up with the next step.
@else
A new card {{ $inquiry->intent }} was submitted from the Vanta platform.
@endif

<x-mail::panel>
**Company:** {{ $inquiry->company_name }}  
**Contact:** {{ $inquiry->contact_name }}  
**Email:** {{ $inquiry->email }}  
**Phone:** {{ $inquiry->phone ?: 'Not provided' }}  
**Request type:** {{ str($inquiry->intent)->headline() }}  
**Card design:** {{ \App\Support\CardDesigns::options()[$inquiry->design_type] ?? str($inquiry->design_type)->headline() }}  
**Quantity:** {{ number_format($inquiry->quantity) }}
</x-mail::panel>

@if (filled($inquiry->notes))
**Notes**

{{ $inquiry->notes }}
@endif

Thanks,<br>
APHEZIS
</x-mail::message>
