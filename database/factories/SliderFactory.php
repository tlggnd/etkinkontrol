<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'sliders/' . $this->faker->image('public/storage/sliders', 640, 480, null, false), // Rastgele resim
            'title' => $this->faker->sentence(3), // 3 kelimelik rastgele başlık
            'title_active' => $this->faker->boolean(80), // %80 olasılıkla aktif
            'subtitle' => $this->faker->sentence(5), // 5 kelimelik rastgele alt başlık
            'subtitle_active' => $this->faker->boolean(70), // %70 olasılıkla aktif
            'button_text' => $this->faker->word, // Rastgele kelime
            'button_color' => $this->faker->hexColor, // Rastgele hex renk kodu
            'button_link' => $this->faker->url, // Rastgele URL
            'button_active' => $this->faker->boolean(60), // %60 olasılıkla aktif
            'order' => $this->faker->numberBetween(1, 100), // 1 ile 100 arasında rastgele sıra
        ];
    }
}