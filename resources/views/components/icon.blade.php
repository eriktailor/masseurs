@props([
    'name', 
    'class' => '',
    'strokeWidth' => '1.5'
])

@php
    $path = public_path('/icons/'.$name.'.svg');
    $svgContent = file_exists($path) ? file_get_contents($path) : 'Icon not found';
    $customAttributes = ['class' => $class, 'stroke-width' => $strokeWidth];

    if ($svgContent !== 'Icon not found') {
        $svgContent = preg_replace_callback('/<svg([^>]+)>/', function ($matches) use ($customAttributes, $attributes) {

            // merge custom attributes with any additional 
            // attributes provided in the blade component call
            $allAttributes = $attributes->merge($customAttributes)->getAttributes();
            $attributesString = collect($allAttributes)->map(function($value, $key) {
                return $key.'="'.$value.'"';
            })->join(' ');

            return '<svg ' . $attributesString . ' ' . $matches[1] . '>';
        }, $svgContent);
    }
@endphp

{!! $svgContent !!}