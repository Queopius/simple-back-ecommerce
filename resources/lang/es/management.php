<?php

return [
    'statuses' => [
        'project' => [
            0 => 'Not Started',
            1 => 'In Progress',
            2 => 'Done',
            3 => 'Archived'
        ],

        'collaborator' => [
            'all' => 'Todos',
            'work' => 'Trabajo',
            'inactive' => 'Inactivo',
            'sick_leave' => 'Baja Médica',
            'holiday' => 'Vacaciones',
            'maternity' => 'Maternidad',
            'paternity' => 'Paternidad',
        ],
        'role' => [
            0 => 'INACTIVO',
            1 => 'ACTIVO',
        ],
        'contact' => [
            'all' => 'Todos',
            'low' => 'Bajo',
            'medium' => 'Medio',
            'high' => 'Alto',
            'archived' => 'Archivados',
        ],
        'contact_status' => [
            'low' => 'Bajo',
            'medium' => 'Medio',
            'high' => 'Alto',
            'archived' => 'Archivados',
        ],
        'thread' => [
            'all' => 'Todos',
            'locked' => 'Cerrado',
            'unlocked' => 'Abierto'
        ],
        'thread_status' => [
            'locked' => 'Cerrado',
            'unlocked' => 'Abierto',
            'without_status' => 'Sin Estado'
        ],
        'thread_published' => [
            'draft' => 'Borrador',
            'published' => 'Publicado',
            'programmed' => 'Programado'
        ],
    ],

    'priority' => [
        0 => 'Low',
        1 => 'Medium',
        2 => 'High'
    ],
];
