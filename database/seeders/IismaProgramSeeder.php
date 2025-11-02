<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programs;
use Carbon\Carbon;

class IismaProgramSeeder extends Seeder
{
    public function run(): void
    {
        Programs::updateOrCreate(
            ['code' => 'IISMA'],
            [
                'name' => 'IISMA Program',
                'title' => 'Indonesian International Student Mobility Awards (IISMA)',
                'description' => 'Indonesian International Student Mobility Awards (IISMA) is the Government of Indonesia scholarship scheme to fund Indonesian students for mobility program at top universities overseas.

This scholarship program aims to make international education more accessible, providing financial support to deserving students pursuing studies abroad.

IISMA provides opportunities for Indonesian students to experience world-class education at partner universities around the globe, enhancing their academic portfolio and international exposure.',
                'type' => 'iisma',
                'duration' => '1-2 Semesters',
                'requirements' => 'General Requirements:
• Active Indonesian university student (minimum semester 3)
• Minimum GPA of 3.0 (on a 4.0 scale)
• English proficiency certificate (TOEFL/IELTS)
• Academic transcript in English
• Valid passport
• Recent photograph with white background
• Recommendation letter from academic supervisor
• Study plan and motivation letter
• Acceptance letter from partner university (if applicable)

Additional Documents:
• Certificate of enrollment from home university
• Proof of language proficiency
• Medical certificate
• Statement letter from parents/guardians',
                'image' => null,
                'status' => 'published',
                'is_active' => true,
                'open_date' => Carbon::now()->addDays(7),
                'close_date' => Carbon::now()->addMonths(3),
                'created_by' => 1,
                'updated_by' => 1,
            ]
        );
    }
}

