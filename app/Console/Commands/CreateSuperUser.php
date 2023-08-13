<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;
use function Laravel\Prompts\confirm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Enums\Roles;

class CreateSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-super-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'What is your name?',
            placeholder: 'E.g. Alpha Bravo',
            default: 'Super User',
            required: 'Name is required.',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null
            }
        );

        $email = text(
            label: 'What is your email?',
            placeholder: 'E.g. admin@mnada.com',
            required: 'Email is required.',
        );

        $password = password(
            label: 'What is your password?',
            placeholder: 'E.g. password',
            required: 'Password is required.',
            validate: fn (string $value) => match (true) {
                strlen($value) < 8 => 'The password must be at least 8 characters.',
                default => null
            }
        );

        $confirmed = confirm('Are you sure you want to create this user?', default: true,  yes: 'I accept', no: 'I decline');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole(Role::findByName(Roles::SUPER_ADMIN->value));

        $this->info('User created successfully.');

        return Command::SUCCESS;
    }
}
