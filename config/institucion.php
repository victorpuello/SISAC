<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 14/09/2018
 * Time: 2:52 PM
 */
return[
    'escala' => [
        'min' => 0,
    ],
    'fondos' => [
        0 => 'primary',
        1 => 'secondary',
        2 => 'tertiary',
        3 => 'quaternary'
    ],
    // esta variable define si la planilla sera multilogro o monologro
    'indicadores' => [
        // Valores acomulativo - Seguimiento
        'modoPlanilla'=> 'acomulativo',
        // El número de notas es uno (1) si el valor es acomulativo
        // Y (n) si el valor es seguimiento
        'numeroNotas' => '1',
        'numeroIndicadores' => '12',
        'categorias'=> [
            '0' => ['name' => 'cognitivo','porcentaje' => 0.5],
            '1' => ['name' => 'procedimental','porcentaje' => 0.4],
            '2' => ['name' => 'actitudinal','porcentaje' => 0.1],
        ],
    ],
    'SIE' => [
        'preescolar' => [
            'areas' => [
                '15' => ['porcentaje' => 0.16,'asignaturas' => [
                    '22' => 1,
                ]],
                '14' => ['porcentaje' => 0.16,'asignaturas' => [
                    '23' => 1,
                ]],
                '13' => ['porcentaje' => 0.16,'asignaturas' => [
                    '24' => 1,
                ]],
                '12' => ['porcentaje' => 0.16,'asignaturas' => [
                    '25' => 1,
                ]],
                '11' => ['porcentaje' => 0.16,'asignaturas' => [
                    '26' => 1,
                ]],
                '10' => ['porcentaje' => 0.2,'asignaturas' => [
                    '27' => 1,
                ]]
            ]
        ],
        'primaria' => [
            'areas' => [
            '2' => [
                'porcentaje' => 0.12,
                'asignaturas' => [
                    '8' => 1,
                ]
            ],
            '3' => [
                'porcentaje' => 0.04,
                'asignaturas' => [
                    '9' => 1,
                ]
            ],
            '1' => ['porcentaje' => 0.16, 'asignaturas' => [
                '11' => 1,
            ]],
            '4' => ['porcentaje' => 0.04, 'asignaturas' => [
                '12' => 1,
            ]],
            '5' => ['porcentaje' => 0.08, 'asignaturas' => [
                '13' => 1,
            ]],
            '6' => ['porcentaje' => 0.04, 'asignaturas' => [
                '14' => 1,
            ]],
            '7' => ['porcentaje' => 0.2, 'asignaturas' => [
                '15' => 1,
            ]],
            '17' => ['porcentaje' => 0.08, 'asignaturas' => [
                '16' => 1,
            ]],
            '8' => ['porcentaje' => 0.2, 'asignaturas' => [
                '17' => 1,
            ]],
            '9' => ['porcentaje' => 0.04, 'asignaturas' => [
                '21' => 1,
            ]]
        ]],
        //Grados 5-6-7
        'secundaria1' => [
            'areas' => [
            '2' => [
                'porcentaje' => 0.12,
                'asignaturas' => [
                    '8' => 1,
                ]
            ],
            '3' => [
                'porcentaje' => 0.04,
                'asignaturas' => [
                    '9' => 1,
                ]
            ],
            '1' => ['porcentaje' => 0.16, 'asignaturas' => [
                '11' => 1,
            ]],
            '4' => ['porcentaje' => 0.04, 'asignaturas' => [
                '12' => 1,
            ]],
            '5' => ['porcentaje' => 0.08, 'asignaturas' => [
                '13' => 1,
            ]],
            '6' => ['porcentaje' => 0.04, 'asignaturas' => [
                '14' => 1,
            ]],
            '7' => ['porcentaje' => 0.2, 'asignaturas' => [
                '15' => 1,
            ]],
            '17' => ['porcentaje' => 0.08, 'asignaturas' => [
                '16' => 1,
            ]],
            '8' => ['porcentaje' => 0.2, 'asignaturas' => [
                '17' => 1,
            ]],
            '9' => ['porcentaje' => 0.04, 'asignaturas' => [
                '21' => 1,
            ]]
        ]],
        //Grados 8-9
        'secundaria2' => [
            'areas' => [
            '2' => ['porcentaje' => 0.1667,   'asignaturas' => [
                '8' => 1,
            ]],
            '3' => ['porcentaje' => 0.03333,
                'asignaturas' => [
                    '9' => 1,
                ]
            ],
            '1' => ['porcentaje' => 0.10002, 'asignaturas' => [
                '11' => 0.6,
            ]],
                '18' => ['porcentaje' => 0.03333, 'asignaturas' => [
                    '10' => 1,
                ]],
                '19' => ['porcentaje' => 0.03333, 'asignaturas' => [
                    '2' => 1,
                ]],
            '4' => ['porcentaje' => 0.03333,'asignaturas' => [
                '12' => 1,
            ]],
            '5' => ['porcentaje' => 0.06667, 'asignaturas' => [
                '13' => 1,
            ]],
            '6' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '14' => 1,
            ]],
            '7' => ['porcentaje' => 0.1667, 'asignaturas' => [
                '15' => 1,
            ]],
            '17' => ['porcentaje' => 0.1, 'asignaturas' => [
                '16' => 1,
            ]],
            '8' => ['porcentaje' => 0.1667, 'asignaturas' => [
                '17' => 1,
            ]],
            '9' => ['porcentaje' => 0.06667, 'asignaturas' => [
                '21' => 1,
            ]]
        ]],
        'media' => [
            'areas' => [
            '2' => ['porcentaje' => 0.1333,
                'asignaturas' => [
                '8' => 0.5,
                '4' => 0.5,
            ]],
            '3' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '9' => 1,
            ]],
            '1' => ['porcentaje' => 0.3, 'asignaturas' => [
                '1' => 1,
            ]],
            '4' => ['porcentaje' => 0.03333,'asignaturas' => [
                '12' => 1,
            ]],
            '5' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '13' => 1,
            ]],
            '6' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '14' => 1,
            ]],
            '7' => ['porcentaje' => 0.1333, 'asignaturas' => [
                '15' => 1,
            ]],
            '17' => ['porcentaje' => 0.1, 'asignaturas' => [
                '16' => 1,
            ]],
            '8' => ['porcentaje' => 0.1666, 'asignaturas' => [
                '17' => 1,
            ]],
            '9' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '21' => 1,
            ]],
            '18' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '10' => 1,
            ]],
            '19' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '2' => 1,
            ]],
            '20' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '6' => 1,
            ]],
            '21' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '5' => 1,
            ]],
            '22' => ['porcentaje' => 0.03333, 'asignaturas' => [
                '18' => 1,
            ]]
        ]],
    ]
];
