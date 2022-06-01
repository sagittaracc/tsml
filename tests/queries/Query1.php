<?php
return [
<<<QUERY
Root
    Item1 Value1
    Item2
        SubItem21 Value1, Value2, Value3
        SubItem22
            SubSubItem221 Value1
            SubSubItem222 Value2
    Item3
    Item4
        SubItem41 Value1, Value2, Value3
        SubItem42 1.2
        SubItem43 true
        SubItem44 false
    Item5
        SubItem51 string1, string2
QUERY,
[
    'Root' => [
        'Item1' => 'Value1',
        'Item2' => [
            'SubItem21' => ['Value1', 'Value2', 'Value3'],
            'SubItem22' => [
                'SubSubItem221' => 'Value1',
                'SubSubItem222' => 'Value2',
            ],
        ],
        'Item3' => [],
        'Item4' => [
            'SubItem41' => ['Value1', 'Value2', 'Value3'],
            'SubItem42' => 1.2,
            'SubItem43' => true,
            'SubItem44' => false,
        ],
        'Item5' => [
            'SubItem51' => ['string1', 'string2'],
        ],
    ]
]
];