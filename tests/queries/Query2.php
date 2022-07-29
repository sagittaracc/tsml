<?php
return [
<<<QUERY
Root
    Item1 0
    Item2
        SubItem21 0
        SubItem22 null
        SubItem23
            SubItem231
QUERY,
[
    'Root' => [
        'Item1' => 0,
        'Item2' => [
            'SubItem21' => 0,
            'SubItem22' => 'null',
            'SubItem23' => [
                'SubItem231' => [],
            ]
        ],
    ]
]
];