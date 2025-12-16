<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin BookZone',
            'email' => 'admin@bookzone.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@bookzone.com',
            'password' => bcrypt('user123'),
            'role' => 'user',
        ]);

        // Create Genres
        \App\Models\Genre::create([
            'name' => 'Fiction',
            'description' => 'Karya sastra yang berisi cerita imajinatif yang tidak berdasarkan fakta nyata.',
        ]);

        \App\Models\Genre::create([
            'name' => 'Romance',
            'description' => 'Cerita yang berfokus pada hubungan romantis dan emosional antar karakter.',
        ]);

        \App\Models\Genre::create([
            'name' => 'Thriller',
            'description' => 'Cerita yang penuh ketegangan, misteri, dan suspense yang menarik perhatian pembaca.',
        ]);

        \App\Models\Genre::create([
            'name' => 'Fantasy',
            'description' => 'Cerita dengan elemen magis, dunia fantasi, dan makhluk supernatural.',
        ]);

        \App\Models\Genre::create([
            'name' => 'Non-Fiction',
            'description' => 'Buku yang berdasarkan fakta nyata, informasi, dan pengetahuan.',
        ]);
    }
}
