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
        
        $categories = [
            [
                'categoryName' => 'Technology',
                'categoryDescription' => 'Events for Technology Enthusiasts!',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/370/800/800.jpg?hmac=vqhcT8vqo6WLCNnVS5I9EyXcoGfZq-CIwZElgmoFBqg',
            ],
            [
                'categoryName' => 'Health',
                'categoryDescription' => 'Events related to Health and Wellness.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/785/800/800.jpg?hmac=1mL7moXqY6raJuCQRm8bl1rpOzTk1Ax96_ZxOgKkyXA'
            ],
            [
                'categoryName' => 'Art',
                'categoryDescription' => 'Explore creativity and artistic expressions.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/679/800/800.jpg?hmac=RA--3q5VBshieWnPpffPEsGq6bhbAJ5bq6aIjYbiUdE'
            ],
            [
                'categoryName' => 'Sports',
                'categoryDescription' => 'Events for sports lovers and athletes.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/281/800/800.jpg?hmac=It7iAzDsYzX9bOSl-IypW0Nsqcw8LahNcyY8_o6ctpI'
            ],
            [
                'categoryName' => 'Education',
                'categoryDescription' => 'Events that promote learning and development.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/193/800/800.jpg?hmac=xz89pi0VMwkTcb4DGBbXSDteqnan6YRWIsgO9UjGhZ8'
            ],
            [
                'categoryName' => 'Business',
                'categoryDescription' => 'Networking and growth opportunities for business professionals.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/378/800/800.jpg?hmac=ZEKPVTd7s212N5_DsgJxIxWQpHtcRboKyUKihCK4dFk'
            ],
            [
                'categoryName' => 'Entertainment',
                'categoryDescription' => 'Fun and entertainment-focused events.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/590/800/800.jpg?hmac=MlmTzhnCPl7cQky32TVc7wKXAGkc8cumP1Wz3RM1Tp4'
            ],
            [
                'categoryName' => 'Food & Drink',
                'categoryDescription' => 'Culinary experiences and beverage tastings.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/493/800/800.jpg?hmac=BqQ2qtVZuo5i1fMDGEDkJFrZDETXaF8KCleg_FAwuc8'
            ],
            [
                'categoryName' => 'Music',
                'categoryDescription' => 'Concerts, festivals, and musical performances.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/304/800/800.jpg?hmac=2-XG0dSYd60mlPrm0N2n4k0X-aNRqVN1tZbx1yhLAnI'
            ],
            [
                'categoryName' => 'Science',
                'categoryDescription' => 'Explore scientific discoveries and advancements.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/527/800/800.jpg?hmac=Cf_-eLkJOtjlWH1iEAOx4He7Tmr99dOE5T0S1TG-IAA'
            ],
            [
                'categoryName' => 'Environment',
                'categoryDescription' => 'Events focused on sustainability and environmental issues.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/502/800/800.jpg?hmac=uPtl86qrbHFFRvAdfmSGfAbeC8ZkXI1alpchEKRsKWc'
            ],
            
            [
                'categoryName' => 'Fashion',
                'categoryDescription' => 'Showcases of style, design, and fashion trends.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/669/800/800.jpg?hmac=LteqK1ZD8dOyQmRTDNqdC4k6ySuo9zMjdHoh2Z2AbdU'
            ],
            [
                'categoryName' => 'Literature',
                'categoryDescription' => 'Book launches, readings, and literary discussions.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/464/800/800.jpg?hmac=BgAeD7n6fWbIc3eiLk67ZODcnFk978bC0v_dbdrB150'
            ],
            [
                'categoryName' => 'Travel',
                'categoryDescription' => 'Explore destinations and travel experiences.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/364/800/800.jpg?hmac=h8EKENjiZvaLJK9tmZB-XldQdHyzhKJ-Sfje_27Fdsk'
            ],
            [
                'categoryName' => 'Charity',
                'categoryDescription' => 'Fundraising and awareness events for various causes.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/660/800/800.jpg?hmac=wTq-4i0fti0Zbhvu56qhZ4NJvSt3OHCZV4evPpkQlm4'
            ],
            [
                'categoryName' => 'Fitness',
                'categoryDescription' => 'Workouts, training sessions, and fitness challenges.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/331/800/800.jpg?hmac=Ldjoeh94rIR-7DUcGd6VZNzSQh-My7zbrRTnVqyVcb4'
            ],
            [
                'categoryName' => 'Photography',
                'categoryDescription' => 'Exhibitions, workshops, and photography meetups.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/91/800/800.jpg?hmac=QRUzJX9f5neDgqHRRp2WIB7jIRLVL9gFDzJ993hBwHk'
            ],
            [
                'categoryName' => 'Film',
                'categoryDescription' => 'Movie screenings, film festivals, and cinema events.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/250/800/800.jpg?hmac=esK-vVpv5wxAO70TrMRPbACT5XTj9bsYj81FI_kmN8U'
            ],
            [
                'categoryName' => 'Networking',
                'categoryDescription' => 'Meet new people and expand your professional circle.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/348/800/800.jpg?hmac=4TQ734NVYZH_hFhW7dzRWVg13h5GF9LmODfE4m_hE1E'
            ],
            [
                'categoryName' => 'Family',
                'categoryDescription' => 'Family-friendly events and activities for all ages.',
                'categoryImageURL' => 'https://fastly.picsum.photos/id/822/800/800.jpg?hmac=irKGw0VjQbrDf4H-cxdcIG9ncU-J7JGJrYX6EjDZpxs'
            ],
        ];

        foreach($categories as $category) {
            Categorie::create($category);
            sleep(1);
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

        $images = array(
            array('imageID' => '8','events_id' => '4','imageURL' => 'https://fastly.picsum.photos/id/341/800/800.jpg?hmac=qscfVESEx9NkiyMfflxv66PMCbxOeI15nAETOcwEzw8','created_at' => '2024-12-18 06:24:32','updated_at' => '2024-12-18 06:24:32'),
            array('imageID' => '19','events_id' => '9','imageURL' => 'https://fastly.picsum.photos/id/976/800/800.jpg?hmac=8Cs5XoELZ4EMM8PZS1iVbEZUnRjtP-SHZWI6g0Rbh7U','created_at' => '2024-12-18 06:25:26','updated_at' => '2024-12-18 06:25:26'),
            array('imageID' => '69','events_id' => '36','imageURL' => 'https://fastly.picsum.photos/id/958/800/800.jpg?hmac=RmOB-ZsSX_fSj6pysuN8heR66NRTM6rNFrUWimQ-WH4','created_at' => '2024-12-18 06:29:03','updated_at' => '2024-12-18 06:29:03'),
            array('imageID' => '13','events_id' => '6','imageURL' => 'https://fastly.picsum.photos/id/95/800/800.jpg?hmac=Y2N7tLr-ioyunZVnLpKLlOkssOlUzFyeBS7QeLSI-Yw','created_at' => '2024-12-18 06:25:09','updated_at' => '2024-12-18 06:25:09'),
            array('imageID' => '68','events_id' => '36','imageURL' => 'https://fastly.picsum.photos/id/944/800/800.jpg?hmac=HoALoH287w519jU0V_xnkXBZKr1UKHD_mLTmT6NJpfk','created_at' => '2024-12-18 06:28:58','updated_at' => '2024-12-18 06:28:58'),
            array('imageID' => '70','events_id' => '36','imageURL' => 'https://fastly.picsum.photos/id/941/800/800.jpg?hmac=OOQIWkHUC919SbCEbia8kGRCqjWezVfqsIAPiSO2Z0Y','created_at' => '2024-12-18 06:29:05','updated_at' => '2024-12-18 06:29:05'),
            array('imageID' => '25','events_id' => '13','imageURL' => 'https://fastly.picsum.photos/id/916/800/800.jpg?hmac=bGX1ANR8PkrQr7Vo5dpryzah37iHQEYHqLXXfm9Jgqk','created_at' => '2024-12-18 06:25:39','updated_at' => '2024-12-18 06:25:39'),
            array('imageID' => '71','events_id' => '37','imageURL' => 'https://fastly.picsum.photos/id/916/800/800.jpg?hmac=bGX1ANR8PkrQr7Vo5dpryzah37iHQEYHqLXXfm9Jgqk','created_at' => '2024-12-18 06:29:09','updated_at' => '2024-12-18 06:29:09'),
            array('imageID' => '78','events_id' => '40','imageURL' => 'https://fastly.picsum.photos/id/916/800/800.jpg?hmac=bGX1ANR8PkrQr7Vo5dpryzah37iHQEYHqLXXfm9Jgqk','created_at' => '2024-12-18 06:29:37','updated_at' => '2024-12-18 06:29:37'),
            array('imageID' => '76','events_id' => '39','imageURL' => 'https://fastly.picsum.photos/id/912/800/800.jpg?hmac=b4vsGu44_E8s9aABvkRZLIjZP81WYwWLynWFja51QPs','created_at' => '2024-12-18 06:29:31','updated_at' => '2024-12-18 06:29:31'),
            array('imageID' => '11','events_id' => '5','imageURL' => 'https://fastly.picsum.photos/id/906/800/800.jpg?hmac=rtKQDZpDvfCttdQ-gQcKqc1aIOtgZWxHsTwIrTo711w','created_at' => '2024-12-18 06:25:01','updated_at' => '2024-12-18 06:25:01'),
            array('imageID' => '2','events_id' => '1','imageURL' => 'https://fastly.picsum.photos/id/905/800/800.jpg?hmac=clwAwSdmBxvMykcLJRBI-2lhkpIJqKo8LAOSM8RUnF8','created_at' => '2024-12-18 06:24:03','updated_at' => '2024-12-18 06:24:03'),
            array('imageID' => '22','events_id' => '11','imageURL' => 'https://fastly.picsum.photos/id/901/800/800.jpg?hmac=PtFy0YtCORVlHsAff3t_lTqvgW8QnJhsurqKZqt8PG0','created_at' => '2024-12-18 06:25:33','updated_at' => '2024-12-18 06:25:33'),
            array('imageID' => '4','events_id' => '2','imageURL' => 'https://fastly.picsum.photos/id/887/800/800.jpg?hmac=cJ_HgWHAQS-Kvb5kwQhTp8wR-vzGYR4XZG__n7fYbXQ','created_at' => '2024-12-18 06:24:10','updated_at' => '2024-12-18 06:24:10'),
            array('imageID' => '77','events_id' => '40','imageURL' => 'https://fastly.picsum.photos/id/883/800/800.jpg?hmac=wcIIs1-lWdr_F6sN90Vkqa1FeO1SMLv4XLm018ATZ38','created_at' => '2024-12-18 06:29:32','updated_at' => '2024-12-18 06:29:32'),
            array('imageID' => '54','events_id' => '29','imageURL' => 'https://fastly.picsum.photos/id/841/800/800.jpg?hmac=pO4c1PjykbjMDYoB3WADZoXerPN4lY1aC0fADu6CEwc','created_at' => '2024-12-18 06:27:57','updated_at' => '2024-12-18 06:27:57'),
            array('imageID' => '29','events_id' => '15','imageURL' => 'https://fastly.picsum.photos/id/838/800/800.jpg?hmac=Wy7iG_Kda6TDODDjKfb7qBAwzySFSCLSvdr9NFECgm8','created_at' => '2024-12-18 06:26:19','updated_at' => '2024-12-18 06:26:19'),
            array('imageID' => '31','events_id' => '16','imageURL' => 'https://fastly.picsum.photos/id/836/800/800.jpg?hmac=ZnhHmkRwfM5S8z-wN6lSyzqP_IbVqwRjwW9Wm9Ds4c4','created_at' => '2024-12-18 06:26:32','updated_at' => '2024-12-18 06:26:32'),
            array('imageID' => '21','events_id' => '11','imageURL' => 'https://fastly.picsum.photos/id/810/800/800.jpg?hmac=WttVBgxr6YhxbnIR1Bx29oQU6zgWWWo4QCNohZ2IFsY','created_at' => '2024-12-18 06:25:31','updated_at' => '2024-12-18 06:25:31'),
            array('imageID' => '7','events_id' => '4','imageURL' => 'https://fastly.picsum.photos/id/806/800/800.jpg?hmac=WFX55lc6DtMP204-TuDLmd2o51kSbpFMxYHaAskYMQw','created_at' => '2024-12-18 06:24:23','updated_at' => '2024-12-18 06:24:23'),
            array('imageID' => '80','events_id' => '42','imageURL' => 'https://fastly.picsum.photos/id/802/800/800.jpg?hmac=7Df7GiRjMmS2bq4Jbxd4TWH9_x6yfDZs3tA7RvsZYXg','created_at' => '2024-12-18 06:29:46','updated_at' => '2024-12-18 06:29:46'),
            array('imageID' => '66','events_id' => '35','imageURL' => 'https://fastly.picsum.photos/id/799/800/800.jpg?hmac=DPkT5YqJNgZpXAL9eVIs0lSI2uK01oIYa1kdhwZrbMw','created_at' => '2024-12-18 06:28:52','updated_at' => '2024-12-18 06:28:52'),
            array('imageID' => '15','events_id' => '7','imageURL' => 'https://fastly.picsum.photos/id/782/800/800.jpg?hmac=IA4rWI9zGxdmYuEUFdNA0swJ2zO0ZLJADKHMuTESjac','created_at' => '2024-12-18 06:25:17','updated_at' => '2024-12-18 06:25:17'),
            array('imageID' => '46','events_id' => '23','imageURL' => 'https://fastly.picsum.photos/id/773/800/800.jpg?hmac=NShi2T-_otHi7Go4rldw6bYhgum4kIZp9Ty-vxOCYCA','created_at' => '2024-12-18 06:27:30','updated_at' => '2024-12-18 06:27:30'),
            array('imageID' => '30','events_id' => '15','imageURL' => 'https://fastly.picsum.photos/id/76/800/800.jpg?hmac=DWwdcBhZyauyesNCeKO30UrTDWwg8HDvFli7H2ZrcfA','created_at' => '2024-12-18 06:26:26','updated_at' => '2024-12-18 06:26:26')
        );

        foreach($images as $image) {
            Image::create([
                'events_id' => $image['events_id'],
                'imageURL' => $image['imageURL'],
            ]);
        }

        // for($i = 1; $i < $totalEvent+1; $i++) {
        //     for($n = 0; $n < rand(1, 3); $n++) {
        //         $finalUrl = Http::maxRedirects(10)->get('https://picsum.photos/800?random=1')->effectiveUri();
        //         $eventImage = [
        //             'events_id' => $i,
        //             'imageURL' => $finalUrl,
        //         ];

        //         Image::create($eventImage);
        //     }
        // }
    }
}
