<?php
namespace App\Repositories;

use App\Models\User;

interface AuthInterface
{
    public function register(array $data): User;
    public function login(array $credentials): array;
    public function logout(): void;
}
