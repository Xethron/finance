<?php

use App\Category;
use Finance\Database\Models\Products\Product;
use Finance\Database\Models\Products\ProductBrand;
use Finance\Database\Models\Products\ProductCategory;
use Finance\Database\Models\Products\ProductType;
use Finance\Database\Models\Products\ProductVariant;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('en_ZA');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Dairy',
                'types' => [
                    [
                        'name' => 'Milk',
                        'variants' => [
                            [
                                'name' => 'Full Creme Long Life',
                            ],
                            [
                                'name' => 'Full Creme Fresh',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Creme',
                        'variants' => [
                            [
                                'name' => 'Desert Creme',
                            ],
                            [
                                'name' => 'Wipping Creme',
                            ],
                        ],
                    ],
                ]
            ],
            [
                'name' => 'Nuts',
                'types' => [
                    [
                        'name' => 'Almond',
                        'variants' => [
                            [
                                'name' => 'Roasted',
                            ],
                            [
                                'name' => 'Raw',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Walnuts',
                        'variants' => [
                            [
                                'name' => 'Roasted',
                            ],
                            [
                                'name' => 'Raw',
                            ],
                        ],
                    ]
                ],
            ],
            [
                'name' => 'Flour',
                'types' => [
                    [
                        'name' => 'Nut',
                        'variants' => [
                            [
                                'name' => 'Almond',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Coconut',
                        'variants' => [
                            [
                                'name' => 'Coconut',
                            ],
                        ],
                    ]
                ],
            ],
            [
                'name' => 'Hot Drinks',
                'types' => [
                    [
                        'name' => 'Chocolate',
                        'variants' => [
                            [
                                'name' => 'Hot Chocolate',
                            ],
                            [
                                'name' => 'Milo',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Tea',
                        'variants' => [
                            [
                                'name' => 'Rooibos',
                            ],
                            [
                                'name' => 'Green Tea',
                            ],
                        ],
                    ]
                ],
            ],
            [
                'name' => 'Spices',
                'types' => [
                    [
                        'name' => 'Salt',
                        'variants' => [
                            [
                                'name' => 'Pink Salt',
                            ],
                            [
                                'name' => 'Table Salt',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Pepper',
                        'variants' => [
                            [
                                'name' => 'Black Pepper',
                            ],
                            [
                                'name' => 'Rainbow Pepper',
                            ],
                        ],
                    ]
                ],
            ],
        ];

        foreach (range(1, 20) as $value) {
            ProductBrand::create(['name' => $this->faker->company . ' ' . $value]);
        }

        foreach ($categories as $category) {
            $types = $category['types'];
            unset($category['types']);
            $category = ProductCategory::create($category);
            foreach ($types as $type) {
                $variants = $type['variants'];
                unset($type['variants']);
                $type = $category->types()->save(new ProductType($type));
                foreach ($variants as $variant) {
                    $variant = $type->variants()->save(new ProductVariant($variant));
                    foreach (range(1, rand(1, 5)) as $item) {
                        $variant->products()->save(new Product([
                            'name'           => $this->faker->word,
                            'brand_id'       => rand(1, 20),
                            'barcode'        => rand(2000000000000, 9000000000000),
                            'amount'         => rand(1, 500),
                            'amount_type_id' => rand(1, 2),
                            'quantity'       => rand(1, 6),
                        ]));
                    }
                }
            }
        }
    }
}
