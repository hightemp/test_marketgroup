<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Faker\Factory as Faker;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create {name?} {email?} {password?} {--start-date=} {--end-date=} {--vacation-set=} {--role=}';
    protected $description = '';

    public function handle()
    {
        $faker = Faker::create();

        $name = $this->argument('name') ?? $faker->name;
        $email = $this->argument('email') ?? $faker->email;
        $password = $this->argument('password') ?? $faker->password;
        $startDate = $this->option('start-date') ?? null;
        $endDate = $this->option('end-date') ?? null;
        $vacationSet = $this->option('vacation-set') ?? $faker->boolean;
        $role = $this->option('role') ?? $faker->randomElement(['employee', 'boss']);

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'vacation_set' => $vacationSet,
            'role' => $role
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'vacation_set' => 'nullable|boolean',
            'role' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->start_date = $startDate;
        $user->end_date = $endDate;
        $user->vacation_set = $vacationSet;
        $user->role = $role;
        $user->save();

        $this->info('User created successfully!');
    }
}
