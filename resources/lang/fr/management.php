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
            'all' => 'Tout',
            'work' => 'Travail',
            'inactive' => 'Inactif',
            'sick_leave' => 'Congé de maladie',
            'holiday' => 'Vacaces',
            'maternity' => 'Maternité',
            'paternity' => 'Paternité',
        ],
        'role' => [
            0 => 'INACTIVE',
            1 => 'ACTIVE',
        ],
        'contact' => [
            'all' => 'Tout',
            'low' => 'Meugler',
            'medium' => 'Moyen',
            'high' => 'Haut',
            'archived' => 'Archivés',
        ],
        'contact_status' => [
            'low' => 'Meugler',
            'medium' => 'Moyen',
            'high' => 'Haut',
            'archived' => 'Archivés',
        ],
        'thread' => [
            'all' => 'Tout',
            'locked' => 'Fermé',
            'unlocked' => 'Ouvert'
        ],
        'thread_status' => [
            'locked' => 'Fermé',
            'unlocked' => 'Ouvert',
            'without_status' => 'Sans statut'
        ],
        'thread_published' => [
            'draft' => 'Brouillon',
            'published' => 'Publié',
            'programmed' => 'Programmé'
        ],
    ],

    'priority' => [
        0 => 'Low',
        1 => 'Medium',
        2 => 'High'
    ],
];
