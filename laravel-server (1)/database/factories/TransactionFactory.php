<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Recipient;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userid' => User::factory(), // Create a user using the User factory
            // 'recipient_id' => Recipient::factory(), // Create a recipient using the Recipient factory
            'crypto_type' => $this->faker->randomElement(['bitcoin', 'ethereum', 'litecoin']), // Random crypto type
            'amount' => $this->faker->numberBetween(1, 100), // Random amount between 1 and 100
            'crypto_amount' => $this->faker->randomFloat(8, 0.0001, 1), // Random crypto amount with 8 decimals
            'recipient_address' => $this->faker->address, // Random recipient address
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']), // Random status
            'transaction_reference' => 'txn_' . Str::random(10), // Unique transaction reference starting with 'txn_'
            'date' => $this->faker->dateTimeThisYear(), // Random date within this year
        ];
    }
}
