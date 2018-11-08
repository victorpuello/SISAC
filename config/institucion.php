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
        'modoPlanilla'=> 'seguimiento',
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
];