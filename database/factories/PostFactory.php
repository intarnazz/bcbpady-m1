<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $title = $this->faker->realText((rand(10,40)));#Заполнение колонки title данными из faker в диапазоне 10 - 40 слов
        $short_title = mb_strlen($title)>30 ? mb_substr($title, 0, 30) . '...' : $title;#Укороченный title создаётся при выполнении условия тернарного оператора
        $created = $this->faker->dateTimeBetween('-30 days', '-1 days');#Колонка created - создан, заполняется датой между -1 и -30 днём
        return [
            'title' => $title,
            'short_title' => $short_title,
            'author_id' => rand(1,4),
            'descr' => $this->faker->realText(rand(100,500)),#заполнение описания данными из faker
            'created_at' => $created,
            'updated_at' => $created,
        ];
    }
}
