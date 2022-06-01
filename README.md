# tsml
The Simplest Markup Language

## Format
```
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
```

## Usage
```php
TSML::parse(<TSML string>);

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
    ]
]
```