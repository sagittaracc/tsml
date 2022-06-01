<?php
return [
<<<QUERY
Query1
    f1 af1
    f2
        mod1 1, 2, 3
        mod2
            submod 1
            another true
    f3
    f4
        mod1
QUERY,
[
    'Query1' => [
        'f1' => 'af1',
        'f2' => [
            'mod1' => [1,2,3],
            'mod2' => [
                'submod' => 1,
                'another' => 'true',
            ],
        ],
        'f3' => [],
        'f4' => [
            'mod1' => [],
        ]
    ]
]
];