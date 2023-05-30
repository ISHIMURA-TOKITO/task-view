<?php

namespace Database\Factories;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $situations = [
            '未着手',
            '対応中',
            '完了',
        ];

        return [
            'folder_id' => null,
            'name' => null,
            'limid' => Carbon::Parse($this->faker->dateTimeBetween('-3 week', '+2 week')),
            'situation' => $this->faker->randomElement($situations),
        ];
    }

    /**
     * Set definitions for development users.
     */
    public function setFolders(int $folder_id, string $name): TaskFactory
    {
        return $this->state(fn (array $attributed) => [
            'folder_id' => $folder_id,
            'name' => $name,
        ]);
    }
}
