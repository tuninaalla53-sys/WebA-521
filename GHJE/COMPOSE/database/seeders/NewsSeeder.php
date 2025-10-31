<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'Welcome to Our News Portal',
                'short_text' => 'This is a demo news item showing the capabilities of our news management system.',
                'article' => 'This is the full article content for the welcome news. Here you can write detailed information about your news story. The system supports rich text content and image uploads for each news item.',
            ],
            [
                'title' => 'New Features Released',
                'short_text' => 'We are excited to announce new features in our platform including enhanced image support.',
                'article' => 'The latest update brings several improvements to our news management system. Users can now easily upload images, edit news content, and manage their publications through a user-friendly interface.',
            ],
            [
                'title' => 'How to Use the System',
                'short_text' => 'Learn how to create and manage news articles in our platform with this quick guide.',
                'article' => 'To create a new news article, click the "Add News" button and fill out the form. You can add a header, short text, full article content, and upload an image. The system will automatically handle the storage and display of your content.',
            ]
        ];

        foreach ($news as $item) {
            News::create($item);
        }

        $this->command->info('✅ Demo news created successfully!');
    }
}