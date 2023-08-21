<?php

namespace Tests\Feature\Http\Controller\Api\VersionOne;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\ShoppingBasketItem;
use Tests\TestCase;

class ShoppingBasketItemControllerTest extends TestCase
{

    public function test_index(): void
    {
        $items = ShoppingBasketItem::all();
        $response = $this->getJson('api/v1/shoppingBasketItems');

        $response->assertJson($items->toArray());
    }

    public static function store_amount_data_provider(): array
    {
        return [
            'smaller_amount' => [
                'item' => [
                    'productId' => 1,
                    'shoppingBasketId' => 3,
                    'amount' => 1,
                ],
                'status' => 201,
                'result' => [
                    'data' => 
                    [
                        'shoppingBasketId' => 3,
                        'amount' => 1,
                    ],
                ],
            ],
            'same_amount' => [
                'item' => [
                    'productId' => 2,
                    'shoppingBasketId' => 3,
                    'amount' => 6,
                ],
                'status' => 201,
                'result' => [
                    'data' => 
                    [
                        'shoppingBasketId' => 3,
                        'amount' => 6,
                    ],
                ],
            ],
            'higher_amount' => [
                'item' => [
                    'productId' => 3,
                    'shoppingBasketId' => 3,
                    'amount' => 7,
                ],
                'status' => 400,
                'result' => [
                    'error' => 'amount is higher than product base amount'
                ],
            ],
            'product_already_in_basket' => [
                'item' => [
                    'productId' => 2,
                    'shoppingBasketId' => 3,
                    'amount' => 1,
                ],
                'status' => 400,
                'result' => [
                    'error' => 'product already in basket'
                ],
            ],
        ];
    }

    /**
     * @dataProvider store_amount_data_provider
     */
    public function test_store_validation(array $item, int $status, array $result): void
    {
        $response = $this->postJson('/api/v1/shoppingBasketItems', $item);

        $response->assertStatus($status);
        $response->assertJson($result);
    }
}
