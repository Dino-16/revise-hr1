<?php

return [
    'class_aliases' => [
        'Livewire' => 'Livewire\\Livewire',
    ],

    'temporary_file_upload' => [
        'disk' => null,        
        'directory' => 'livewire-tmp',
        'rules' => ['required', 'file', 'max:12288'], // 12MB Max
    ],
];
