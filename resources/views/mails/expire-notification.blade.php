<!DOCTYPE html>
<html>
<head>
    <title>Lejáró Dokumentum</title>
</head>
<body>
    <h1>Lejáró dokumentum: 
        <span style="color:red">
            @if($masseur->expiration_type === 'visa')
                VISA
            @elseif($masseur->expiration_type === 'passport')
                ÚTLEVÉL
            @endif
        </span>
    </h1>
    <p>
        <strong>{{ $masseur->masseur->name }}</strong> ({{ $masseur->masseur->full_name}}) 
        @if($masseur->expiration_type === 'visa')
            visája
        @elseif($masseur->expiration_type === 'passport')
            útlevele
        @endif
    
        le fog járni ekkor:
        @if($masseur->expiration_type === 'visa')
            {{ $masseur->visa_expire }}
        @elseif($masseur->expiration_type === 'passport')
            {{ $masseur->passport_expire }}
        @endif
    </p>
</body>
</html>
