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
            array('imageID' => '1','events_id' => '1','imageURL' => 'https://fastly.picsum.photos/id/683/800/800.jpg?hmac=jtA_NLPnGtz2QolqLUzucJVQ6iG1fLMGQzAdAekJlwE','created_at' => '2024-12-18 06:46:06','updated_at' => '2024-12-18 06:46:06'),
            array('imageID' => '2','events_id' => '1','imageURL' => 'https://fastly.picsum.photos/id/535/800/800.jpg?hmac=s9bN4ZI7nrbML3ogbmq4fEYjon1YJLOIGDn42WnT4B8','created_at' => '2024-12-18 06:46:10','updated_at' => '2024-12-18 06:46:10'),
            array('imageID' => '3','events_id' => '1','imageURL' => 'https://fastly.picsum.photos/id/1002/800/800.jpg?hmac=w5WYkd_hKLk97oPLg9mQmLOevuYbTjwuhq61OnTBDV0','created_at' => '2024-12-18 06:46:14','updated_at' => '2024-12-18 06:46:14'),
            array('imageID' => '4','events_id' => '2','imageURL' => 'https://fastly.picsum.photos/id/1026/800/800.jpg?hmac=I9hOyAD_ai-uccoEGwhI7KgQ6jqYEnS1z886LNmZ6Is','created_at' => '2024-12-18 06:46:20','updated_at' => '2024-12-18 06:46:20'),
            array('imageID' => '5','events_id' => '2','imageURL' => 'https://fastly.picsum.photos/id/249/800/800.jpg?hmac=OC1geQqkuHHyxS4beXGdQf1SeCoi42HYGBZeIaLsegQ','created_at' => '2024-12-18 06:46:24','updated_at' => '2024-12-18 06:46:24'),
            array('imageID' => '6','events_id' => '3','imageURL' => 'https://fastly.picsum.photos/id/1041/800/800.jpg?hmac=AWJbBGp8gLlc__FITLvyhTFxpaAwM5tziHtkedXBLlk','created_at' => '2024-12-18 06:46:29','updated_at' => '2024-12-18 06:46:29'),
            array('imageID' => '7','events_id' => '3','imageURL' => 'https://fastly.picsum.photos/id/947/800/800.jpg?hmac=CQ30bss5AcDKpIs8w8iq_7vimTbJ3yYQ0zdJvOJMuc0','created_at' => '2024-12-18 06:46:40','updated_at' => '2024-12-18 06:46:40'),
            array('imageID' => '8','events_id' => '3','imageURL' => 'https://fastly.picsum.photos/id/35/800/800.jpg?hmac=f6jWj0-PtkrlWsWvmfdvt8rta2ad_lSSMZQZiblUEnw','created_at' => '2024-12-18 06:46:45','updated_at' => '2024-12-18 06:46:45'),
            array('imageID' => '9','events_id' => '4','imageURL' => 'https://fastly.picsum.photos/id/863/800/800.jpg?hmac=xUSyb9hE9wmmMe_CvZCbryUxkLyDVZreHQgQBDNsgbk','created_at' => '2024-12-18 06:46:46','updated_at' => '2024-12-18 06:46:46'),
            array('imageID' => '10','events_id' => '5','imageURL' => 'https://fastly.picsum.photos/id/261/800/800.jpg?hmac=-HwbCSu21Hsu6ZpO9xBJHgJQLv0GBCGPw84SSssT-JI','created_at' => '2024-12-18 06:46:50','updated_at' => '2024-12-18 06:46:50'),
            array('imageID' => '11','events_id' => '5','imageURL' => 'https://fastly.picsum.photos/id/291/800/800.jpg?hmac=rZN4a_VPbWvTU6rOcidWhFzHliUaFDvPMyiYD_ctqDw','created_at' => '2024-12-18 06:46:51','updated_at' => '2024-12-18 06:46:51'),
            array('imageID' => '12','events_id' => '6','imageURL' => 'https://fastly.picsum.photos/id/985/800/800.jpg?hmac=DfRt99HFbMJ96DlN-poOhruWYRsexESE94ilLC3g1rU','created_at' => '2024-12-18 06:46:58','updated_at' => '2024-12-18 06:46:58'),
            array('imageID' => '13','events_id' => '6','imageURL' => 'https://fastly.picsum.photos/id/471/800/800.jpg?hmac=hv2sKX68IXj6cGKKLLomBegrMbqd7n87bNyf1Hhfve8','created_at' => '2024-12-18 06:47:01','updated_at' => '2024-12-18 06:47:01'),
            array('imageID' => '14','events_id' => '7','imageURL' => 'https://fastly.picsum.photos/id/913/800/800.jpg?hmac=6wG6TO-G86S_k1Hh5sy2iTmAbrAMHzPuIKbeDPqXa84','created_at' => '2024-12-18 06:47:09','updated_at' => '2024-12-18 06:47:09'),
            array('imageID' => '15','events_id' => '7','imageURL' => 'https://fastly.picsum.photos/id/610/800/800.jpg?hmac=ksOmwCoPA5SpPhmims4D-T2hQ_IqGBHPc5PpI8RP4B0','created_at' => '2024-12-18 06:47:14','updated_at' => '2024-12-18 06:47:14'),
            array('imageID' => '16','events_id' => '8','imageURL' => 'https://fastly.picsum.photos/id/906/800/800.jpg?hmac=rtKQDZpDvfCttdQ-gQcKqc1aIOtgZWxHsTwIrTo711w','created_at' => '2024-12-18 06:47:18','updated_at' => '2024-12-18 06:47:18'),
            array('imageID' => '17','events_id' => '9','imageURL' => 'https://fastly.picsum.photos/id/328/800/800.jpg?hmac=Mbw9eEotyrn2_HMyARREN2qwLbzshzTojMxjGY8Mgww','created_at' => '2024-12-18 06:47:28','updated_at' => '2024-12-18 06:47:28'),
            array('imageID' => '18','events_id' => '10','imageURL' => 'https://fastly.picsum.photos/id/945/800/800.jpg?hmac=6zHY15B6rXH1eJPFJ1qbTD-BMc1xjAs-WeY5m0DJ674','created_at' => '2024-12-18 06:47:29','updated_at' => '2024-12-18 06:47:29'),
            array('imageID' => '19','events_id' => '10','imageURL' => 'https://fastly.picsum.photos/id/360/800/800.jpg?hmac=k0Ww4l9q1dWANRFHnG6mjABa_OAF2qTD1V-iwtZJ0vU','created_at' => '2024-12-18 06:50:20','updated_at' => '2024-12-18 06:50:20'),
            array('imageID' => '20','events_id' => '11','imageURL' => 'https://fastly.picsum.photos/id/388/800/800.jpg?hmac=RvXKUf547tEUyM5z8-Ycr3jJilSkuKJF8tdCAVHvwng','created_at' => '2024-12-18 06:50:22','updated_at' => '2024-12-18 06:50:22'),
            array('imageID' => '21','events_id' => '12','imageURL' => 'https://fastly.picsum.photos/id/919/800/800.jpg?hmac=OMWCk7EA_ZalOjGxXsl6mQsN6b0sSbmt5flKOBov9a0','created_at' => '2024-12-18 06:50:22','updated_at' => '2024-12-18 06:50:22'),
            array('imageID' => '22','events_id' => '13','imageURL' => 'https://fastly.picsum.photos/id/531/800/800.jpg?hmac=C6QUKwmhz7b7MwUgIMGMLOyOvBZrLUUZl4kcRVCnmP4','created_at' => '2024-12-18 06:50:26','updated_at' => '2024-12-18 06:50:26'),
            array('imageID' => '23','events_id' => '13','imageURL' => 'https://fastly.picsum.photos/id/121/800/800.jpg?hmac=SyeNzsEdljolCmkd9cRCjz3HfR_Wy4WUSQzE_cGTk64','created_at' => '2024-12-18 06:50:30','updated_at' => '2024-12-18 06:50:30'),
            array('imageID' => '24','events_id' => '13','imageURL' => 'https://fastly.picsum.photos/id/665/800/800.jpg?hmac=qcvOsZb0w2h5DwCVhS7URwPppQOwogmyOZb12LAkwVI','created_at' => '2024-12-18 06:50:35','updated_at' => '2024-12-18 06:50:35'),
            array('imageID' => '25','events_id' => '14','imageURL' => 'https://fastly.picsum.photos/id/600/800/800.jpg?hmac=i2rFYbVQjSQPxrUfwctLI1RScA02W8TxbxgDyZ5AxSs','created_at' => '2024-12-18 06:50:38','updated_at' => '2024-12-18 06:50:38'),
            array('imageID' => '26','events_id' => '14','imageURL' => 'https://fastly.picsum.photos/id/406/800/800.jpg?hmac=iUJLruEYSl8wg1VZyY8VyeNvPLys48GkYfEbpGm3ag8','created_at' => '2024-12-18 06:51:04','updated_at' => '2024-12-18 06:51:04'),
            array('imageID' => '27','events_id' => '15','imageURL' => 'https://fastly.picsum.photos/id/26/800/800.jpg?hmac=PYkPMXUjyaLCx1vbei0Dip3lKRUcrzRI59oou0AZYb8','created_at' => '2024-12-18 06:51:06','updated_at' => '2024-12-18 06:51:06'),
            array('imageID' => '28','events_id' => '15','imageURL' => 'https://fastly.picsum.photos/id/602/800/800.jpg?hmac=QvdMSblzwJUgQkXqfZw4k7W3LR8N7pu4ig5HZYKZdLs','created_at' => '2024-12-18 06:51:10','updated_at' => '2024-12-18 06:51:10'),
            array('imageID' => '29','events_id' => '16','imageURL' => 'https://fastly.picsum.photos/id/802/800/800.jpg?hmac=7Df7GiRjMmS2bq4Jbxd4TWH9_x6yfDZs3tA7RvsZYXg','created_at' => '2024-12-18 06:51:15','updated_at' => '2024-12-18 06:51:15'),
            array('imageID' => '30','events_id' => '16','imageURL' => 'https://fastly.picsum.photos/id/804/800/800.jpg?hmac=O3JEk7q-wsI3zhbnB-0eNcI8IM_ArxzCUpmKHyQ43us','created_at' => '2024-12-18 06:51:19','updated_at' => '2024-12-18 06:51:19'),
            array('imageID' => '31','events_id' => '17','imageURL' => 'https://fastly.picsum.photos/id/172/800/800.jpg?hmac=3RkaUTVCPGjn4vtDvWXEqtsPYb6nlUX7-FToCTVUOw0','created_at' => '2024-12-18 06:51:33','updated_at' => '2024-12-18 06:51:33'),
            array('imageID' => '32','events_id' => '18','imageURL' => 'https://fastly.picsum.photos/id/237/800/800.jpg?hmac=vCdYL_CRxqCGRhpbwB6Q2uD9BMcs7wHZ0hb28qxtrYE','created_at' => '2024-12-18 06:51:36','updated_at' => '2024-12-18 06:51:36'),
            array('imageID' => '33','events_id' => '19','imageURL' => 'https://fastly.picsum.photos/id/654/800/800.jpg?hmac=gi-ImBCSXApw0arnugXoCa9IJ2qcmdxleEjzIcUNHfw','created_at' => '2024-12-18 06:51:44','updated_at' => '2024-12-18 06:51:44'),
            array('imageID' => '34','events_id' => '19','imageURL' => 'https://fastly.picsum.photos/id/444/800/800.jpg?hmac=ZKSfxIoZazO0h6Jvy-Z1ZadSQnM3EbOZ8xLX17ORCsM','created_at' => '2024-12-18 06:51:47','updated_at' => '2024-12-18 06:51:47'),
            array('imageID' => '35','events_id' => '25','imageURL' => 'https://fastly.picsum.photos/id/1068/800/800.jpg?hmac=pHIcxEo-Ys4Na8yzVZaL6s0bZxGjcE9h7aPI5JwrMks','created_at' => '2024-12-18 06:54:19','updated_at' => '2024-12-18 06:54:19'),
            array('imageID' => '36','events_id' => '25','imageURL' => 'https://fastly.picsum.photos/id/235/800/800.jpg?hmac=vOc_qlXHSeJ-3OjHs4BxOgHOb0uD9dx1oHlltGyiyI8','created_at' => '2024-12-18 06:54:25','updated_at' => '2024-12-18 06:54:25'),
            array('imageID' => '37','events_id' => '26','imageURL' => 'https://fastly.picsum.photos/id/158/800/800.jpg?hmac=k3dLY5YwkOX6FSokcFNRuWRahLcmXwpxgmC-eMj-wQA','created_at' => '2024-12-18 06:54:30','updated_at' => '2024-12-18 06:54:30'),
            array('imageID' => '38','events_id' => '26','imageURL' => 'https://fastly.picsum.photos/id/722/800/800.jpg?hmac=Y8RnWwTn-UVoogRjGMrMAI-zMZ-6pXElm7AAa2uHMYA','created_at' => '2024-12-18 06:54:34','updated_at' => '2024-12-18 06:54:34'),
            array('imageID' => '39','events_id' => '26','imageURL' => 'https://fastly.picsum.photos/id/149/800/800.jpg?hmac=keOH26ffH4xJoAgS1dtFxTLc9ueqDO04qGhWXC_H5dI','created_at' => '2024-12-18 06:54:40','updated_at' => '2024-12-18 06:54:40'),
            array('imageID' => '40','events_id' => '27','imageURL' => 'https://fastly.picsum.photos/id/932/800/800.jpg?hmac=WHmcFwRnX7erP7IPFUYFL2E-5EaPeAdVTCBnUFL_RuQ','created_at' => '2024-12-18 06:54:51','updated_at' => '2024-12-18 06:54:51'),
            array('imageID' => '41','events_id' => '27','imageURL' => 'https://fastly.picsum.photos/id/135/800/800.jpg?hmac=UxAMRqcH_2c4eE5FaQNgNYNBxwIaBaVZVoYfpJB9tno','created_at' => '2024-12-18 06:54:56','updated_at' => '2024-12-18 06:54:56'),
            array('imageID' => '42','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/667/800/800.jpg?hmac=MG_9C3h_3MQ6rSxg4I5Q-TGmMSMYWWfQwD1A7RCSG3o','created_at' => '2024-12-18 06:55:21','updated_at' => '2024-12-18 06:55:21'),
            array('imageID' => '43','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/10/800/800.jpg?hmac=SaapDzK-vdMhnDRoUKZjiLf320I9R3i5E4MZ8kBgPMk','created_at' => '2024-12-18 06:55:26','updated_at' => '2024-12-18 06:55:26'),
            array('imageID' => '44','events_id' => '29','imageURL' => 'https://fastly.picsum.photos/id/266/800/800.jpg?hmac=hplPGgFtsDenc0tJ7KFHOxNBaYCFiLlW4HebHTWZcl0','created_at' => '2024-12-18 06:55:32','updated_at' => '2024-12-18 06:55:32'),
            array('imageID' => '45','events_id' => '25','imageURL' => 'https://fastly.picsum.photos/id/1078/800/800.jpg?hmac=310MYYiZ4XzYhekssAyVhnw02DKebeVWPMgu5M0dMwA','created_at' => '2024-12-18 06:57:33','updated_at' => '2024-12-18 06:57:33'),
            array('imageID' => '47','events_id' => '26','imageURL' => 'https://fastly.picsum.photos/id/1056/800/800.jpg?hmac=D2H3C6B-aHc3PpF9XjBAW70crZjmnrt2uaB817nb-BA','created_at' => '2024-12-18 06:57:56','updated_at' => '2024-12-18 06:57:56'),
            array('imageID' => '48','events_id' => '27','imageURL' => 'https://fastly.picsum.photos/id/1042/800/800.jpg?hmac=RonOubFjN6PIXWTbZaI2G4wDE06wkr51z2wNMUgtQyE','created_at' => '2024-12-18 06:57:57','updated_at' => '2024-12-18 06:57:57'),
            array('imageID' => '50','events_id' => '27','imageURL' => 'https://fastly.picsum.photos/id/443/800/800.jpg?hmac=tm1OMZy1c0Noif6qqddiP-MESeFga5da36N-_tQtrrc','created_at' => '2024-12-18 06:58:06','updated_at' => '2024-12-18 06:58:06'),
            array('imageID' => '51','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/898/800/800.jpg?hmac=pUgQR-PzD5FKJJcGunqNZjff4gTm9rjdleGcOuROt6g','created_at' => '2024-12-18 06:58:26','updated_at' => '2024-12-18 06:58:26'),
            array('imageID' => '52','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/530/800/800.jpg?hmac=4Y0guzyql8hlsm7b7O9KKEa9XPG0I9uqcZznpVa4t0Y','created_at' => '2024-12-18 06:58:34','updated_at' => '2024-12-18 06:58:34'),
            array('imageID' => '53','events_id' => '29','imageURL' => 'https://fastly.picsum.photos/id/820/800/800.jpg?hmac=xpD3bbXUcfetVEzy92IFGcVJk67p62T81F8kNs-QLWw','created_at' => '2024-12-18 06:58:35','updated_at' => '2024-12-18 06:58:35'),
            array('imageID' => '54','events_id' => '29','imageURL' => 'https://fastly.picsum.photos/id/211/800/800.jpg?hmac=BX5VpYbHCCKqUjcnMAev-JnCAyhCURE_qsyc_7SAY9A','created_at' => '2024-12-18 06:59:01','updated_at' => '2024-12-18 06:59:01'),
            array('imageID' => '55','events_id' => '30','imageURL' => 'https://fastly.picsum.photos/id/513/800/800.jpg?hmac=MUU19N9GHR0oKyoNAmbP5_4sq6aZnIajp8-Uj9HYLqk','created_at' => '2024-12-18 06:59:03','updated_at' => '2024-12-18 06:59:03'),
            array('imageID' => '57','events_id' => '30','imageURL' => 'https://fastly.picsum.photos/id/465/800/800.jpg?hmac=E6U5VKFIB6PeMmOiunkDCJzTTquu-7XHCkN-Hnud7vA','created_at' => '2024-12-18 06:59:25','updated_at' => '2024-12-18 06:59:25'),
            array('imageID' => '58','events_id' => '31','imageURL' => 'https://fastly.picsum.photos/id/73/800/800.jpg?hmac=OtFy0lbe4IkPsoPdFyfgVeeoYEWD3fYjMp4tagluvdk','created_at' => '2024-12-18 06:59:30','updated_at' => '2024-12-18 06:59:30'),
            array('imageID' => '59','events_id' => '31','imageURL' => 'https://fastly.picsum.photos/id/545/800/800.jpg?hmac=zFvcodIjcgCP1A2w5cr_miGWMJvkGPVj8SXkxBeyVCw','created_at' => '2024-12-18 06:59:32','updated_at' => '2024-12-18 06:59:32'),
            array('imageID' => '60','events_id' => '32','imageURL' => 'https://fastly.picsum.photos/id/538/800/800.jpg?hmac=aU1Nid4kMoFOZNf24s8gmKlSLUGx0M5ETHCctBwCqX0','created_at' => '2024-12-18 06:59:34','updated_at' => '2024-12-18 06:59:34'),
            array('imageID' => '61','events_id' => '32','imageURL' => 'https://fastly.picsum.photos/id/99/800/800.jpg?hmac=pEf8zT33LkULIo8myChunnaS3NWaX7dMU1sB87gyLvA','created_at' => '2024-12-18 06:59:37','updated_at' => '2024-12-18 06:59:37'),
            array('imageID' => '62','events_id' => '33','imageURL' => 'https://fastly.picsum.photos/id/110/800/800.jpg?hmac=NX8_3DpToJgWjVAlvu9DpAPIHp8LhY36hwxWSrwoZi4','created_at' => '2024-12-18 06:59:41','updated_at' => '2024-12-18 06:59:41'),
            array('imageID' => '63','events_id' => '33','imageURL' => 'https://fastly.picsum.photos/id/842/800/800.jpg?hmac=V0Kdv88qg256F311iJNd5xBn5EWJXP7NUACcMILCy9Q','created_at' => '2024-12-18 06:59:41','updated_at' => '2024-12-18 06:59:41'),
            array('imageID' => '64','events_id' => '34','imageURL' => 'https://fastly.picsum.photos/id/142/800/800.jpg?hmac=eXyt1-KM--iTld7JYyjxb_Yst-dSuAKJB8KeLZndh_U','created_at' => '2024-12-18 06:59:43','updated_at' => '2024-12-18 06:59:43'),
            array('imageID' => '65','events_id' => '34','imageURL' => 'https://fastly.picsum.photos/id/787/800/800.jpg?hmac=SB0tV3MHSnUdH6X6uaX_nKaZFa8eGx-6Ymusoyh3SME','created_at' => '2024-12-18 06:59:51','updated_at' => '2024-12-18 06:59:51'),
            array('imageID' => '66','events_id' => '35','imageURL' => 'https://fastly.picsum.photos/id/1043/800/800.jpg?hmac=nVhbrHYQ_FluPDlj5-sdWJeYW-_Q_CHN7uKGFGlRfSo','created_at' => '2024-12-18 06:59:57','updated_at' => '2024-12-18 06:59:57'),
            array('imageID' => '67','events_id' => '36','imageURL' => 'https://fastly.picsum.photos/id/837/800/800.jpg?hmac=LEHBTELQ0B0JqpRAhEBlnhEabKZ81BsKY5yU6NoTJ1c','created_at' => '2024-12-18 06:59:59','updated_at' => '2024-12-18 06:59:59'),
            array('imageID' => '68','events_id' => '25','imageURL' => 'https://fastly.picsum.photos/id/326/800/800.jpg?hmac=Y-pjzarC4VcLSdZznS4vAl8WLkG869ciYg8yo1i0q9g','created_at' => '2024-12-18 07:02:38','updated_at' => '2024-12-18 07:02:38'),
            array('imageID' => '69','events_id' => '25','imageURL' => 'https://fastly.picsum.photos/id/655/800/800.jpg?hmac=8e2mOL9wavdANnZOkUG0KFN7sJ3QaxT5vVi_dthz4QA','created_at' => '2024-12-18 07:02:40','updated_at' => '2024-12-18 07:02:40'),
            array('imageID' => '70','events_id' => '25','imageURL' => 'https://fastly.picsum.photos/id/206/800/800.jpg?hmac=WuRfVy4hNq2d0IplKRlJ18G409Z3DJ9smzQoaI9ixj8','created_at' => '2024-12-18 07:02:46','updated_at' => '2024-12-18 07:02:46'),
            array('imageID' => '71','events_id' => '26','imageURL' => 'https://fastly.picsum.photos/id/507/800/800.jpg?hmac=yuPESIPEXbxp2Q1pvqVWpsHZo_Drbe6PypqUtfU_St0','created_at' => '2024-12-18 07:02:47','updated_at' => '2024-12-18 07:02:47'),
            array('imageID' => '72','events_id' => '26','imageURL' => 'https://fastly.picsum.photos/id/345/800/800.jpg?hmac=LOnoRTt1unXZjHPTbu5lz02WUT_W6bafu7KtEBI--T8','created_at' => '2024-12-18 07:02:50','updated_at' => '2024-12-18 07:02:50'),
            array('imageID' => '73','events_id' => '27','imageURL' => 'https://fastly.picsum.photos/id/830/800/800.jpg?hmac=IbSlWBXAopEBKt0trTsz9QEhlUDjrULd4QXrMCk-APY','created_at' => '2024-12-18 07:02:53','updated_at' => '2024-12-18 07:02:53'),
            array('imageID' => '74','events_id' => '27','imageURL' => 'https://fastly.picsum.photos/id/774/800/800.jpg?hmac=vWhWKPGAYiaruPoUfRi86YCFwgyiEjsusZogjpmKMzk','created_at' => '2024-12-18 07:02:59','updated_at' => '2024-12-18 07:02:59'),
            array('imageID' => '75','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/933/800/800.jpg?hmac=g9F7EdjtrI9fpcS0DpxYUZEEsmV3_sTwIWXwW263Bi0','created_at' => '2024-12-18 07:03:02','updated_at' => '2024-12-18 07:03:02'),
            array('imageID' => '76','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/475/800/800.jpg?hmac=rW00Hw_gFLSj-HykWGPXIem7gCX0cZ1Tkx7S9xCQWEg','created_at' => '2024-12-18 07:03:03','updated_at' => '2024-12-18 07:03:03'),
            array('imageID' => '77','events_id' => '28','imageURL' => 'https://fastly.picsum.photos/id/833/800/800.jpg?hmac=mEA-N-qyxoVYRqsFjnDvl50D0TkFoxjMJ9mSKOK8WZU','created_at' => '2024-12-18 07:03:07','updated_at' => '2024-12-18 07:03:07'),
            array('imageID' => '78','events_id' => '29','imageURL' => 'https://fastly.picsum.photos/id/476/800/800.jpg?hmac=FLw7hWXMB-Qcy0lWTYRuSO6FGk-jCR-9oVlxK_ESU-Y','created_at' => '2024-12-18 07:03:12','updated_at' => '2024-12-18 07:03:12'),
            array('imageID' => '79','events_id' => '29','imageURL' => 'https://fastly.picsum.photos/id/192/800/800.jpg?hmac=jjefSvmwjBKGaTJ8MU9TuYw5cV3RRvK5H3v9Brq3EXQ','created_at' => '2024-12-18 07:03:21','updated_at' => '2024-12-18 07:03:21'),
            array('imageID' => '81','events_id' => '30','imageURL' => 'https://fastly.picsum.photos/id/242/800/800.jpg?hmac=sSR0c1lrdBCLiofRd7HqjAYs9xQsPYnU3JQZ1thqvuI','created_at' => '2024-12-18 07:03:26','updated_at' => '2024-12-18 07:03:26'),
            array('imageID' => '82','events_id' => '31','imageURL' => 'https://fastly.picsum.photos/id/639/800/800.jpg?hmac=s_v5gOELNXfO2muI_4N050OYn1PNe7cXiIyUsj271rU','created_at' => '2024-12-18 07:03:37','updated_at' => '2024-12-18 07:03:37'),
            array('imageID' => '83','events_id' => '32','imageURL' => 'https://fastly.picsum.photos/id/684/800/800.jpg?hmac=FjkJLBhS6eO92azH45vGCBTAnCKpo_U1JNOzUZqhH0s','created_at' => '2024-12-18 07:03:47','updated_at' => '2024-12-18 07:03:47'),
            array('imageID' => '84','events_id' => '33','imageURL' => 'https://fastly.picsum.photos/id/304/800/800.jpg?hmac=2-XG0dSYd60mlPrm0N2n4k0X-aNRqVN1tZbx1yhLAnI','created_at' => '2024-12-18 07:03:49','updated_at' => '2024-12-18 07:03:49'),
            array('imageID' => '85','events_id' => '34','imageURL' => 'https://fastly.picsum.photos/id/643/800/800.jpg?hmac=PAAeULyJBBMZQBBwGeu8Flt6VAeQomJwh1YO9Ab9IIs','created_at' => '2024-12-18 07:04:07','updated_at' => '2024-12-18 07:04:07'),
            array('imageID' => '86','events_id' => '34','imageURL' => 'https://fastly.picsum.photos/id/90/800/800.jpg?hmac=dFOGHgrCALvLFP4WeefquC9FbtLCrK1fl_ICzLRSBAA','created_at' => '2024-12-18 07:04:10','updated_at' => '2024-12-18 07:04:10'),
            array('imageID' => '87','events_id' => '35','imageURL' => 'https://fastly.picsum.photos/id/629/800/800.jpg?hmac=ZafDt5K02lbSxzCFZRGB7D-ZhIVjlDNU6yp9s2JX43g','created_at' => '2024-12-18 07:04:11','updated_at' => '2024-12-18 07:04:11'),
            array('imageID' => '88','events_id' => '35','imageURL' => 'https://fastly.picsum.photos/id/549/800/800.jpg?hmac=E02PWNmOwPSiXu8sxjkcvZ1FrCsTTRI7Q-IUBgUNJsw','created_at' => '2024-12-18 07:04:14','updated_at' => '2024-12-18 07:04:14'),
            array('imageID' => '89','events_id' => '35','imageURL' => 'https://fastly.picsum.photos/id/390/800/800.jpg?hmac=Rqb5S_B1YDRnfI94Isq5VkK_S9ySoyhferkfMSXQmpk','created_at' => '2024-12-18 07:04:15','updated_at' => '2024-12-18 07:04:15'),
            array('imageID' => '90','events_id' => '36','imageURL' => 'https://fastly.picsum.photos/id/983/800/800.jpg?hmac=nhD63wBseT_S7NKILU_XsRSPsKF2rYSkzpailqvAR-g','created_at' => '2024-12-18 07:04:17','updated_at' => '2024-12-18 07:04:17'),
            array('imageID' => '91','events_id' => '37','imageURL' => 'https://fastly.picsum.photos/id/337/800/800.jpg?hmac=KB_5m2B1S_S959W25fClnhdwEHmvjxRJXLMvAxSStxs','created_at' => '2024-12-18 07:04:22','updated_at' => '2024-12-18 07:04:22'),
            array('imageID' => '92','events_id' => '37','imageURL' => 'https://fastly.picsum.photos/id/966/800/800.jpg?hmac=92hmxUBsan1DCvpnd890-5dVO9A5Tjq0GOVbbxFS3gk','created_at' => '2024-12-18 07:04:25','updated_at' => '2024-12-18 07:04:25'),
            array('imageID' => '93','events_id' => '38','imageURL' => 'https://fastly.picsum.photos/id/634/800/800.jpg?hmac=k2afT7WKvZoDlw8BKPoh0tKp2suyM4CTU6T-l57MUqs','created_at' => '2024-12-18 07:04:27','updated_at' => '2024-12-18 07:04:27'),
            array('imageID' => '95','events_id' => '39','imageURL' => 'https://fastly.picsum.photos/id/545/800/800.jpg?hmac=zFvcodIjcgCP1A2w5cr_miGWMJvkGPVj8SXkxBeyVCw','created_at' => '2024-12-18 07:04:37','updated_at' => '2024-12-18 07:04:37'),
            array('imageID' => '96','events_id' => '39','imageURL' => 'https://fastly.picsum.photos/id/336/800/800.jpg?hmac=rYoQLZDtSk6b23iL-sJDkqE3iatGa0oZWq2UF3zDPJI','created_at' => '2024-12-18 07:04:38','updated_at' => '2024-12-18 07:04:38'),
            array('imageID' => '97','events_id' => '39','imageURL' => 'https://fastly.picsum.photos/id/950/800/800.jpg?hmac=70SerzclRVf1o-3s4ASJ-IcAbjjo9SQY-c39urOtLRU','created_at' => '2024-12-18 07:04:39','updated_at' => '2024-12-18 07:04:39'),
            array('imageID' => '99','events_id' => '41','imageURL' => 'https://fastly.picsum.photos/id/384/800/800.jpg?hmac=TEew91c6Nr1mOYq70VMCJuk1_5_7W13GKZjlECCpqWg','created_at' => '2024-12-18 07:04:43','updated_at' => '2024-12-18 07:04:43'),
            array('imageID' => '100','events_id' => '42','imageURL' => 'https://fastly.picsum.photos/id/872/800/800.jpg?hmac=O06y5t2D8wKzFH27WcMB_gBjkpCNa6OG_T7TQBnRx4o','created_at' => '2024-12-18 07:04:44','updated_at' => '2024-12-18 07:04:44'),
            array('imageID' => '101','events_id' => '43','imageURL' => 'https://fastly.picsum.photos/id/74/800/800.jpg?hmac=Yutsm46dgDawaiRdN9msXB--hf1oPGE3wr96b_aSdY0','created_at' => '2024-12-18 07:04:52','updated_at' => '2024-12-18 07:04:52'),
            array('imageID' => '102','events_id' => '43','imageURL' => 'https://fastly.picsum.photos/id/722/800/800.jpg?hmac=Y8RnWwTn-UVoogRjGMrMAI-zMZ-6pXElm7AAa2uHMYA','created_at' => '2024-12-18 07:04:54','updated_at' => '2024-12-18 07:04:54'),
            array('imageID' => '103','events_id' => '20','imageURL' => 'https://fastly.picsum.photos/id/337/800/800.jpg?hmac=KB_5m2B1S_S959W25fClnhdwEHmvjxRJXLMvAxSStxs','created_at' => '2024-12-18 07:04:22','updated_at' => '2024-12-18 07:04:22'),
            array('imageID' => '104','events_id' => '21','imageURL' => 'https://fastly.picsum.photos/id/966/800/800.jpg?hmac=92hmxUBsan1DCvpnd890-5dVO9A5Tjq0GOVbbxFS3gk','created_at' => '2024-12-18 07:04:25','updated_at' => '2024-12-18 07:04:25'),
            array('imageID' => '105','events_id' => '22','imageURL' => 'https://fastly.picsum.photos/id/634/800/800.jpg?hmac=k2afT7WKvZoDlw8BKPoh0tKp2suyM4CTU6T-l57MUqs','created_at' => '2024-12-18 07:04:27','updated_at' => '2024-12-18 07:04:27'),
            array('imageID' => '106','events_id' => '23','imageURL' => 'https://fastly.picsum.photos/id/545/800/800.jpg?hmac=zFvcodIjcgCP1A2w5cr_miGWMJvkGPVj8SXkxBeyVCw','created_at' => '2024-12-18 07:04:37','updated_at' => '2024-12-18 07:04:37'),
            array('imageID' => '107','events_id' => '40','imageURL' => 'https://fastly.picsum.photos/id/545/800/800.jpg?hmac=zFvcodIjcgCP1A2w5cr_miGWMJvkGPVj8SXkxBeyVCw','created_at' => '2024-12-18 07:04:37','updated_at' => '2024-12-18 07:04:37'),
        );

        foreach($images as $image) {
            Image::create([
                'events_id' => $image['events_id'],
                'imageURL' => $image['imageURL'],
            ]);
        }

        // for($i = 1; $i < $totalEvent+1; $i++) {
        //     for($n = 0; $n < rand(1, 3); $n++) {
        //         $finalUrl = \Http::maxRedirects(10)->get('https://picsum.photos/800?random=1')->effectiveUri();
        //         $eventImage = [
        //             'events_id' => $i,
        //             'imageURL' => $finalUrl,
        //         ];

        //         Image::create($eventImage);
        //     }
        // }
    }
}
