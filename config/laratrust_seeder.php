<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'pengurus' => [
            'pengurus' => 'c,r,u,d',
            'anggota' => 'r',
            'pengumuman' => 'r',
            'tarif_air' => 'r',
            'buku_air' => 'r',
            'keluhan' => 'r',
            'anggaran_listrik' => 'r',
            'instalasi' => 'r',
            'instalasi_alat' => 'r',
            'profile' => 'r,u'
        ],
        'admin' => [
            'anggota' => 'c,r,u,d',
            'pengumuman' => 'c,r,u,d',
            'tarif_air' => 'c,r,u,d',
            'buku_air' => 'c,r,u,d',
            'keluhan' => 'r,u',
            'anggaran_listrik' => 'c,r,u,d',
            'instalasi' => 'c,r,u',
            'instalasi_alat' => 'c,r,u',
            'profile' => 'r,u'
        ],
        'anggota' => [
            'instalasi_alat' => 'r,u',
            'keluhan' => 'c,r,u',
            'buku_air' => 'c,r,u,d',
            'profile' => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
