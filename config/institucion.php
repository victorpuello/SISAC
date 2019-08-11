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
        'max' => 5,
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
                'Dimensión Comunicativa' => ['porcentaje' => 0.16],
                'Dimensión Ética y valores' => ['porcentaje' => 0.16],
                'Dimensión Socio-afectiva' => ['porcentaje' => 0.16],
                'Dimensión Estética' => ['porcentaje' => 0.16],
                'Dimensión Corporal' => ['porcentaje' => 0.16],
                'Dimensión Cognitiva' => ['porcentaje' => 0.2]
            ]
        ],
        'primaria' => [
            'Ciencias Sociales' => ['porcentaje' => 0.12],
            'Artistica' => ['porcentaje' => 0.04],
            'Ciencias Naturales' => ['porcentaje' => 0.16],
            'Ética y valores' => ['porcentaje' => 0.04],
            'Educación Física' => ['porcentaje' => 0.08],
            'Religión' => ['porcentaje' => 0.04],
            'Lengua Castellana' => ['porcentaje' => 0.2],
            'Idioma extranjero - Ingles' => ['porcentaje' => 0.08],
            'Matemáticas' => ['porcentaje' => 0.2],
            'Tecnología e Informática' => ['porcentaje' => 0.04]
        ],
        'secundaria' => [
            'Ciencias Sociales' => ['porcentaje' => 0.1667],
            'Artistica' => ['porcentaje' => 0.03333],
            'Ciencias Naturales' => ['porcentaje' => 0.1667],
            'Ética y valores' => ['porcentaje' => 0.03333],
            'Educación Física' => ['porcentaje' => 0.06667],
            'Religión' => ['porcentaje' => 0.03333],
            'Lengua Castellana' => ['porcentaje' => 0.1667],
            'Idioma extranjero - Ingles' => ['porcentaje' => 0.1],
            'Matemáticas' => ['porcentaje' => 0.1667],
            'Tecnología e Informática' => ['porcentaje' => 0.06667]
        ],
        'media' => [
            'Ciencias Sociales' => ['porcentaje' => 0.1333],
            'Artistica' => ['porcentaje' => 0.03333],
            'Ciencias Naturales' => ['porcentaje' => 0.3],
            'Ética y valores' => ['porcentaje' => 0.03333],
            'Educación Física' => ['porcentaje' => 0.03333],
            'Religión' => ['porcentaje' => 0.03333],
            'Lengua Castellana' => ['porcentaje' => 0.1333],
            'Idioma extranjero - Ingles' => ['porcentaje' => 0.1],
            'Matemáticas' => ['porcentaje' => 0.1666],
            'Tecnología e Informática' => ['porcentaje' => 0.03333]
        ],
    ]
];
