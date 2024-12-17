<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\EventHasCategories;
use App\Models\Keranjang;
use App\Models\KeranjangHasEvent;
use App\Models\Link;
use App\Models\Reminder;
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
        // 'name',
        // 'email',
        // 'password',
        $users = [
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('tester101'),
            ],
            [
                'name' => 'filkompulse',
                'email' => 'adminfilkompulse@gmail.com',
                'password' => Hash::make('filkompulse101'),
                'email_verified_at' => Carbon::now(),
            ]
        ];

        foreach ($users as $user) {
            $createdUser = User::create($user);

            // 'user_id', (FK taken from user)
            // Dynamically generate keranjang for each user
            Keranjang::create([
                'user_id' => $createdUser->id,
            ]);
        }

        // 'user_id', (FK taken from user)
        // 'verified_type',
        $verifiedUsers = [
            [
                'user_id' => User::where('name', 'filkompulse')->first()->id,
                'verified_type' => 'administrator',
            ]
        ];

        foreach ($verifiedUsers as $user) {
            Verified_user::create($user);
        }

        // 'verifiedUserID', (FK taken from user)
        // 'title',
        // 'description',
        // 'date',
        // 'location_type',
        // 'location',
        // Using filkompulse's ID as verifiedUserID
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

        // 'eventsID',
        // 'userID',
        // 'reminderDate',
        $totalUser = User::count();
        $totalEvent = Event::count();

        for ($i = 0; $i < 10; $i++) {
            $reminders = [                
                'eventsID' => rand(1, $totalEvent),
                'user_id' => rand(1, $totalUser),
                'reminderDate' => Carbon::now()->addDays(rand(1, 100)),
            ];

            Reminder::create($reminders);
        }

        // 'keranjangID',
        // 'eventsID',
        $totalKeranjang = Keranjang::count();

        for($i = 0; $i < $totalKeranjang; $i++) {
            for($n = 0; $n < 5; $n++) {
                $keranjangItem = [
                    'keranjangID' => ($i+1),
                    'eventsID' => rand(1, $totalEvent),
                ];

                KeranjangHasEvent::create($keranjangItem);
            }
        }

        // 'categoryName',
        // 'categoryDescription',
        $categories = [
            [
                'categoryName' => 'Technology',
                'categoryDescription' => 'Events for Technology Enthusiasts!'
            ],
            [
                'categoryName' => 'Health',
                'categoryDescription' => 'Events related to Health and Wellness.'
            ],
            [
                'categoryName' => 'Art',
                'categoryDescription' => 'Explore creativity and artistic expressions.'
            ],
            [
                'categoryName' => 'Sports',
                'categoryDescription' => 'Events for sports lovers and athletes.'
            ],
            [
                'categoryName' => 'Education',
                'categoryDescription' => 'Events that promote learning and development.'
            ],
            [
                'categoryName' => 'Business',
                'categoryDescription' => 'Networking and growth opportunities for business professionals.'
            ],
            [
                'categoryName' => 'Entertainment',
                'categoryDescription' => 'Fun and entertainment-focused events.'
            ],
            [
                'categoryName' => 'Food & Drink',
                'categoryDescription' => 'Culinary experiences and beverage tastings.'
            ],
            [
                'categoryName' => 'Music',
                'categoryDescription' => 'Concerts, festivals, and musical performances.'
            ],
            [
                'categoryName' => 'Science',
                'categoryDescription' => 'Explore scientific discoveries and advancements.'
            ],
            [
                'categoryName' => 'Environment',
                'categoryDescription' => 'Events focused on sustainability and environmental issues.'
            ],
            [
                'categoryName' => 'Fashion',
                'categoryDescription' => 'Showcases of style, design, and fashion trends.'
            ],
            [
                'categoryName' => 'Literature',
                'categoryDescription' => 'Book launches, readings, and literary discussions.'
            ],
            [
                'categoryName' => 'Travel',
                'categoryDescription' => 'Explore destinations and travel experiences.'
            ],
            [
                'categoryName' => 'Charity',
                'categoryDescription' => 'Fundraising and awareness events for various causes.'
            ],
            [
                'categoryName' => 'Fitness',
                'categoryDescription' => 'Workouts, training sessions, and fitness challenges.'
            ],
            [
                'categoryName' => 'Photography',
                'categoryDescription' => 'Exhibitions, workshops, and photography meetups.'
            ],
            [
                'categoryName' => 'Film',
                'categoryDescription' => 'Movie screenings, film festivals, and cinema events.'
            ],
            [
                'categoryName' => 'Networking',
                'categoryDescription' => 'Meet new people and expand your professional circle.'
            ],
            [
                'categoryName' => 'Family',
                'categoryDescription' => 'Family-friendly events and activities for all ages.'
            ],
        ];

        foreach($categories as $category) {
            Categorie::create($category);
        }

        // Randomize Category
        // 'events_ID',
        // 'categories_ID',
        $totalCategory = Categorie::count();

        for($i = 0; $i < $totalEvent; $i++) {
            for($n = 0; $n < 3; $n++) {
                $eventCategory = [
                    'events_ID' => ($i+1),
                    'categories_ID' => rand(1, $totalCategory),
                ];

                EventHasCategories::create($eventCategory);
            }
        }

        // 'events_id',
        // 'URL',
        for($i = 0; $i < $totalEvent; $i++) {
            for($n = 0; $n < rand(0,2); $n++) {
                $eventLink = [
                    'events_id' => ($i+1),
                    'URL' => \Faker\Factory::create()->url(),
                ];

                Link::create($eventLink);
            }
        }
    }
}
