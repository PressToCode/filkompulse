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
        $a = User::where('name', 'filkompulse')->first()->verified_user()->first()->VerifiedID;
        $events = [
            [
                'verifiedUserID' => $a,
                'title' => 'PORSIMABA 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-31',
                'location_type' => 'Offline',
                'location' => 'Filkom G1.5',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'SCHOTIVAL 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-31',
                'location_type' => 'Online',
                'location' => 'Zoom Meetings',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'LEGISLATIVE ACADEMY 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-31',
                'location_type' => 'Offline',
                'location' => 'Filkom F3.11',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Future of Technology Conference',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-11-15 09:00:00',
                'location_type' => 'Online',
                'location' => 'Google Meet',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Healthcare Innovations Forum',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-10-05 14:30:00',
                'location_type' => 'Offline',
                'location' => 'University Auditorium',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Tech Expo: The Future of Innovation',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-09-21 10:00:00',
                'location_type' => 'Offline',
                'location' => 'Tech Park Hall A',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Innovation Summit 2024',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-10-30 13:00:00',
                'location_type' => 'Online',
                'location' => 'Microsoft Teams',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Leadership Excellence Conference',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-11-20 08:00:00',
                'location_type' => 'Offline',
                'location' => 'Business Center Main Hall',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Creative Arts Festival: Celebrating Culture',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-10 17:00:00',
                'location_type' => 'Offline',
                'location' => 'Cultural Center',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'GreenTech Forum: Sustainability Solutions',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-05 09:30:00',
                'location_type' => 'Online',
                'location' => 'WebEx',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'AI Innovations: The Next Frontier',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-11-25 11:00:00',
                'location_type' => 'Offline',
                'location' => 'AI Labs Conference Hall',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Mathematical Olympiad Challenge',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-12-12 08:30:00',
                'location_type' => 'Offline',
                'location' => 'Math Department Room 202',
            ],
            [
                'verifiedUserID' => $a,
                'title' => 'Cybersecurity Awareness Summit',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'date' => '2024-10-10 14:00:00',
                'location_type' => 'Online',
                'location' => 'Zoom Webinars',
            ]            
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
