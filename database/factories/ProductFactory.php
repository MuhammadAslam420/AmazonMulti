<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_name=$this->faker->unique()->words($nb=2,$asText=true);
        $slug=Str::slug($product_name);
        return [
            //
            'name'=>$product_name,
            'slug'=>$slug,
            'short_description'=>$this->faker->text(200),
            'description'=>$this->faker->text(500),
            'price'=>$this->faker->numberBetween(100,1000),
            'SKU'=>'MED'.$this->faker->unique()->numberBetween(1,10000),
            'stock_status'=> 'instock' ,
            'quantity'=>$this->faker->numberBetween(10,100),
            'front_image'=>'product'.$this->faker->numberBetween(1,10).'.jpg',
            'back_image'=>'product'.$this->faker->numberBetween(10,20).'.jpg',
            'user_id'=>$this->faker->numberBetween(1,4),
            'category_id'=>$this->faker->numberBetween(1,5)
        ];

    }
}
