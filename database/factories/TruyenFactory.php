<?php

namespace Database\Factories;

use App\Models\Truyen;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruyenFactory extends Factory
{
    protected $model = Truyen::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tentruyen' => $this->faker->sentence,
            'mota' => $this->faker->sentence,
            'tacgia' => 'HAK',
            'slug_truyen' => $this->faker->slug,
            'kichhoat' => 1,
            'iddanhmuc' => 1,
            'idtheloai' => 1,
            'hinhanh' => 'usericon-73.png',
            'tags' => 'truyen,hay,rat,hay,ratlahya,rat hay',
        ];
    }
}
