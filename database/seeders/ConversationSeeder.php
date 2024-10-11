<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 10 cuộc trò chuyện
        Conversation::factory()
            ->count(10)
            ->create()
            ->each(function ($conversation) {
                // Tạo 3 người dùng và gán họ vào cuộc trò chuyện
                $users = User::factory()->count(3)->create();
                $conversation->users()->attach($users->pluck('id'));  // Gán user vào conversation

                // Tạo 10 tin nhắn cho cuộc trò chuyện, với user_id ngẫu nhiên trong những người tham gia
                Messages::factory()->count(10)->create([
                    'conversation_id' => $conversation->id,
                    'user_id' => $users->random()->id,  // Chọn ngẫu nhiên người dùng từ những người đã tham gia
                ]);
            });
    }
}
