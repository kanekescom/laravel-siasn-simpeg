<?php

return [

    'name' => 'SISASN SIMPEG',

    'chunk_data' => 500,

    'truncate_model_before_pull' => true,

    'filament' => [

        'id' => 'siasn-simpeg',

        'path' => 'siasn/simpeg',

        'topbar' => true,

        'brandLogo' => null,

        'favicon' => null,

        'colors' => [
            'primary' => \Filament\Support\Colors\Color::Amber,
        ],

        'navigationGroups' => [
            'Pegawai',
            'PNS',
            'Riwayat',
            'KP',
            'Pemberhentian',
            'Pengadaan',
            'Referensi',
            'Tools',
        ],

    ],

];
