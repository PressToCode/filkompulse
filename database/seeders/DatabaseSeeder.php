<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\EventHasCategories;
use App\Models\Image;
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
use \Faker\Factory as Faker;
use Illuminate\Support\Facades\Http;

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

        for($i = 0; $i < 30; $i++) {
            $events = [
                'verifiedUserID' => $a,
                'title' => Faker::create()->sentences(rand(1, 3), true),
                'description' => Faker::create()->paragraphs(rand(1, 2), true),
                'date' => Faker::create()->dateTimeBetween('now', '+1 year'),
                'location_type' => rand(0, 1) ? 'Offline' : 'Online',
                'location' => Faker::create()->address(),
            ];

            Event::create($events);
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
        // Technology: 370
        // Health: 785
        // Art: 679
        // Sport: 281
        // Education: 193
        // Business: 378
        // Entertainment: 590
        // F&B: 493
        // Music: 304
        // Science: 527
        // Environment: 502
        // Fashion: 669
        // Literature: 464
        // Travel: 364
        // Charity: 660
        // Fitness: 331
        // Photography: 91
        // Film: 250
        // Networking: 348
        // Family: 822
        $id = [370, 785, 679, 281, 193, 
            378, 590, 493, 304, 527, 
            502, 669, 464, 364, 660,
            331, 91, 250, 348, 822];

        $categories = [
            [
                'categoryName' => 'Technology',
                'categoryDescription' => 'Events for Technology Enthusiasts!',
                'categoryImageURL' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[0].'/800')->effectiveUri(),
            ],
            [
                'categoryName' => 'Health',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[1].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Art',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[2].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Sports',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[3].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Education',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[4].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Business',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[5].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Entertainment',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[6].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Food & Drink',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[7].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Music',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[8].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Science',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[9].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Environment',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[10].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Fashion',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[11].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Literature',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[12].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Travel',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[13].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Charity',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[14].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Fitness',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[15].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Photography',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[16].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Film',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[17].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Networking',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[18].'/800')->effectiveUri()
            ],
            [
                'categoryName' => 'Family',
                'categoryDescription' => Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/id/'.$id[19].'/800')->effectiveUri()
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
                    'URL' => Faker::create()->url(),
                ];

                Link::create($eventLink);
            }
        }

        // https://picsum.photos/800?random=1
        // 'events_id',
        // 'imageURL',
        for($i = 1; $i < $totalEvent+1; $i++) {
            for($n = 0; $n < rand(1, 3); $n++) {
                $finalUrl = Http::withoutVerifying()->withOptions(["verify"=>false])->maxRedirects(10)->get('https://picsum.photos/800?random=1')->effectiveUri();
                $eventImage = [
                    'events_id' => $i,
                    'imageURL' => $finalUrl,
                ];

                Image::create($eventImage);
            }
        }
    }
}
