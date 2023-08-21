<?php

namespace App\Http\Requests\VersionOne;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShoppingBasketItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method === 'PUT'){
            return [
                'shoppingBasketId' => 'required|exists:shopping_baskets,id',
                'productId' => 'required|exists:products,id',
                'amount' => 'required|numeric|gt:0',
            ];
        } else {
            //PATCH
            return [
                'amount' => 'required|numeric',
            ];
        }
    }

    protected function prepareForValidation()
    {
        if($this->shoppingBasketId && $this->productId){
            $this->merge([
                'shopping_basket_id' => $this->shoppingBasketId,
                'product_id' => $this->productId,
            ]);
        }
    }
}
