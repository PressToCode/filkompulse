<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Verified_user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('tester101'),
            ],
            [
                'name' => 'filkompulse',
                'email' => 'filkompulse@gmail.com',
                'password' => Hash::make('filkompulse101'),
                'email_verified_at' => Carbon::now(),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $verifiedUsers = [
            [
                'user_id' => User::where('name', 'filkompulse')->first()->id,
                'verified_type' => 'administrator',
            ]
        ];

        foreach ($verifiedUsers as $user) {
            Verified_user::create($user);
        }

        // 'verifiedUserID',
        // 'title',
        // 'description',
        // 'date',
        // 'location_type',
        // 'location',
        $a = User::where('name', 'filkompulse')->first();
        \Log::info($a);
        $b = $a->verified_user()->first();
        \Log::info($b);
        $c = $b->VerifiedID;
        \Log::info($c);
        $events = [
            [
                'verifiedUserID' => $c,
                'title' => 'PORSIMABA 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-31',
                'location_type' => 'Offline',
                'location' => 'Filkom G1.5',
            ],
            [
                'verifiedUserID' => $c,
                'title' => 'SCHOTIVAL 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-31',
                'location_type' => 'Online',
                'location' => 'Zoom Meetings',
            ],
            [
                'verifiedUserID' => $c,
                'title' => 'LEGISLATIVE ACADEMY 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-31',
                'location_type' => 'Offline',
                'location' => 'Filkom F3.11',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
