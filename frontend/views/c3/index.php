<?php
use kongoon\c3js\C3JS;
$this->title = 'C3JS Chart';
?>
<h1><?=$this->title?></h1>

<?=C3JS::widget([
    'options' => [
        'data' => [
            'x' => 'x',
            'columns' => [
                ['x', '2016-01-01', '2016-02-01', '2016-03-01', '2016-04-01', '2016-05-01', '2016-06-01'],
                ['data1', 30, 200, 100, 400, 150, 250],
                ['data2', 50, 20, 10, 40, 15, 25]
            ],
            'types' => [
                'data1' => 'bar',
                'data2' => 'bar'
            ],
        ],

        'axis' => [
            'y' => [
                'label' => [
                    'text' => 'Y Label',
                    'position' => 'outer-middle',
                ]
            ],
            'x' => [
                'type' => 'timeseries',
                'tick' => [
                    'format' => '%Y-%m-%d'
                ],
                'label' => [
                    'text' => 'X Label',
                    'position' => 'outer-middle',
                ]
            ]
        ]
    ],

])?>
