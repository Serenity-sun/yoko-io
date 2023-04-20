<?php

/**
 * Запрос первого сервиса
 */
it('book-1 service', function () {
    $serviceData = [
        'data' => [
            [
                'name' => 'Война и мир',
                'description' => 'роман-эпопея Льва Николаевича Толстого, описывающий русское общество в эпоху войн против Наполеона в 1805—1812 годах.',
                'createdAt' => '2022-06-30'
            ],
            [
                'name' => 'Ревизор',
                'description' => 'комедия в пяти действиях, написанная Н. В. Гоголем в 1835 г.',
                'createdAt' => '2022-05-11'
            ],
            [
                'name' => 'Горе от ума',
                'description' => 'комедия в стихах Александра Сергеевича Грибоедова. Она сочетает в себе элементы классицизма и романтизма, а также имеет мотивы сатиры.',
                'createdAt' => '2022-05-11'
            ]
        ]
    ];

    $response = $this->post('/api/books', $serviceData);

    expect($response->status())->toBe(200)
        ->and($response->json())->toBeArray()
        ->and($response->json())->toHaveCount(3)
        ->and($response->json()[0])->toHaveKeys(['name', 'description', 'createdAt']);
});

/**
 * Запрос второго сервиса
 */
it('book-2 service', function () {
    $serviceData = [
        [
            'title' => 'Финансит',
            'descr' => 'Это книга о человеке, который прежде всего является Финансистом- могучим тигром в мире беззащитных овец и хищных волков.',
            'author' => 'Т. Драйзер'
        ],
        [
            'title' => 'Таинственный остров',
            'descr' => 'В ней повествуется о событиях, происходивших на вымышленном острове, куда забросило на воздушном шаре несколько человек, бежавших из Америки в результате Гражданской войны.',
            'author' => 'Жюль Верн'
        ],
        [
            'title' => 'Портрет Дориана Грея',
            'descr' => 'Тонкий эстет и романтик становится безжалостным преступником. Попытка сохранить свою необычайную красоту и молодость оборачивается провалом. ',
            'author' => 'Оскар Уайльд'
        ]
    ];

    $response = $this->post('/api/books', $serviceData);

    expect($response->status())->toBe(200)
        ->and($response->json())->toBeArray()
        ->and($response->json())->toHaveCount(3)
        ->and($response->json()[0])->toHaveKeys(['name', 'description', 'author']);

});
