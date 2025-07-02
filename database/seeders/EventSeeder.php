<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => 'Youth Business Summit 2024',
                'description' => 'Tanzania\'s premier youth entrepreneurship event featuring keynote speakers, panel discussions, and networking opportunities.',
                'full_description' => 'Join over 500 young entrepreneurs, investors, and industry leaders for three days of learning, networking, and collaboration. The summit features world-class speakers, interactive workshops, pitch competitions, and extensive networking opportunities.',
                'date' => '2024-03-15',
                'end_date' => '2024-03-17',
                'time' => '09:00:00',
                'end_time' => '18:00:00',
                'location' => 'Dar es Salaam Convention Centre',
                'address' => 'Shaaban Robert Street, Dar es Salaam, Tanzania',
                'attendees_limit' => 500,
                'registered_attendees' => 245,
                'price' => 25000,
                'currency' => 'TSh',
                'category' => 'Summit',
                'featured' => true,
                'registration_open' => true,
                'registration_deadline' => '2024-03-10',
                'image' => 'events/youth-summit-2024.jpg',
                'agenda' => json_encode([
                    'Day 1' => ['Opening Ceremony', 'Keynote Address', 'Panel: Future of Entrepreneurship', 'Networking Lunch'],
                    'Day 2' => ['Workshops', 'Pitch Competition', 'Investor Meetings', 'Gala Dinner'],
                    'Day 3' => ['Masterclasses', 'Awards Ceremony', 'Closing Remarks', 'Networking Reception']
                ]),
                'speakers' => json_encode([
                    ['name' => 'Dr. Sarah Mwangi', 'title' => 'Tech Entrepreneur', 'company' => 'Innovation Labs'],
                    ['name' => 'James Ochieng', 'title' => 'Venture Capitalist', 'company' => 'Africa Growth Fund'],
                    ['name' => 'Amina Kone', 'title' => 'Policy Expert', 'company' => 'African Union']
                ]),
                'sponsors' => json_encode(['African Development Bank', 'Mastercard Foundation', 'UNDP Tanzania']),
                'requirements' => json_encode(['Valid ID', 'Business Interest', 'Networking Mindset']),
                'status' => 'upcoming',
                'created_at' => Carbon::parse('2024-01-10'),
                'updated_at' => Carbon::parse('2024-01-10'),
            ],
            [
                'title' => 'Digital Marketing Workshop',
                'description' => 'Hands-on workshop covering social media marketing, content creation, and online advertising strategies.',
                'full_description' => 'Learn practical digital marketing skills that will help you grow your business online. This intensive workshop covers social media strategy, content marketing, email marketing, and paid advertising across various platforms.',
                'date' => '2024-02-20',
                'end_date' => '2024-02-20',
                'time' => '14:00:00',
                'end_time' => '17:00:00',
                'location' => 'TYCC Innovation Hub',
                'address' => '123 Business District, Dar es Salaam',
                'attendees_limit' => 50,
                'registered_attendees' => 32,
                'price' => 0,
                'currency' => 'TSh',
                'category' => 'Workshop',
                'featured' => true,
                'registration_open' => true,
                'registration_deadline' => '2024-02-18',
                'image' => 'events/digital-marketing-workshop.jpg',
                'agenda' => json_encode([
                    '14:00-14:30' => 'Registration & Welcome',
                    '14:30-15:30' => 'Social Media Strategy',
                    '15:30-15:45' => 'Break',
                    '15:45-16:45' => 'Content Creation & Advertising',
                    '16:45-17:00' => 'Q&A & Networking'
                ]),
                'speakers' => json_encode([
                    ['name' => 'John Temba', 'title' => 'Digital Marketing Expert', 'company' => 'Digital Solutions Ltd']
                ]),
                'sponsors' => json_encode(['Google for Startups', 'Facebook Business']),
                'requirements' => json_encode(['Laptop/Smartphone', 'Basic Computer Skills', 'Existing Business']),
                'status' => 'upcoming',
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Women Entrepreneurs Networking Evening',
                'description' => 'Exclusive networking event for women entrepreneurs to share experiences and build business connections.',
                'full_description' => 'An intimate evening designed specifically for women entrepreneurs to connect, share experiences, and build meaningful business relationships. The event includes panel discussions, networking sessions, and mentorship opportunities.',
                'date' => '2024-02-28',
                'end_date' => '2024-02-28',
                'time' => '18:00:00',
                'end_time' => '21:00:00',
                'location' => 'TYCC Women\'s Center',
                'address' => '456 Empowerment Avenue, Dar es Salaam',
                'attendees_limit' => 80,
                'registered_attendees' => 65,
                'price' => 10000,
                'currency' => 'TSh',
                'category' => 'Networking',
                'featured' => true,
                'registration_open' => true,
                'registration_deadline' => '2024-02-25',
                'image' => 'events/women-networking.jpg',
                'agenda' => json_encode([
                    '18:00-18:30' => 'Registration & Welcome Drinks',
                    '18:30-19:30' => 'Panel: Women in Leadership',
                    '19:30-20:30' => 'Networking Dinner',
                    '20:30-21:00' => 'Mentorship Speed Dating'
                ]),
                'speakers' => json_encode([
                    ['name' => 'Grace Mwangi', 'title' => 'Business Consultant', 'company' => 'Women in Business'],
                    ['name' => 'Fatuma Ali', 'title' => 'Serial Entrepreneur', 'company' => 'Multiple Ventures']
                ]),
                'sponsors' => json_encode(['UN Women', 'Women\'s Development Fund']),
                'requirements' => json_encode(['Women Entrepreneurs Only', 'Business Registration', 'Networking Interest']),
                'status' => 'upcoming',
                'created_at' => Carbon::parse('2024-01-20'),
                'updated_at' => Carbon::parse('2024-01-20'),
            ],
            [
                'title' => 'Pitch Competition: Tech Startups',
                'description' => 'Monthly pitch competition for technology startups with cash prizes and mentorship opportunities.',
                'full_description' => 'Compete with other tech startups for cash prizes, investment opportunities, and mentorship from industry experts. This monthly competition provides a platform for early-stage tech companies to showcase their innovations.',
                'date' => '2024-03-05',
                'end_date' => '2024-03-05',
                'time' => '10:00:00',
                'end_time' => '16:00:00',
                'location' => 'TYCC Innovation Hub',
                'address' => '123 Business District, Dar es Salaam',
                'attendees_limit' => 100,
                'registered_attendees' => 78,
                'price' => 0,
                'currency' => 'TSh',
                'category' => 'Competition',
                'featured' => false,
                'registration_open' => true,
                'registration_deadline' => '2024-03-01',
                'image' => 'events/pitch-competition.jpg',
                'agenda' => json_encode([
                    '10:00-10:30' => 'Registration & Networking',
                    '10:30-12:00' => 'Pitch Presentations (Round 1)',
                    '12:00-13:00' => 'Lunch Break',
                    '13:00-14:30' => 'Pitch Presentations (Round 2)',
                    '14:30-15:30' => 'Judges Deliberation',
                    '15:30-16:00' => 'Awards & Closing'
                ]),
                'speakers' => json_encode([
                    ['name' => 'Michael Ouma', 'title' => 'Tech Investor', 'company' => 'TechVenture Capital'],
                    ['name' => 'Linda Mwangi', 'title' => 'Startup Mentor', 'company' => 'Innovation Hub']
                ]),
                'sponsors' => json_encode(['TechVenture Capital', 'Innovation Labs', 'Startup Grind']),
                'requirements' => json_encode(['Tech Startup', 'Pitch Deck', 'Demo Ready']),
                'status' => 'upcoming',
                'created_at' => Carbon::parse('2024-02-01'),
                'updated_at' => Carbon::parse('2024-02-01'),
            ],
            [
                'title' => 'Export Training Seminar',
                'description' => 'Learn about export procedures, documentation, and opportunities under the AfCFTA framework.',
                'full_description' => 'Comprehensive training on export procedures, documentation requirements, and market opportunities across Africa under the African Continental Free Trade Area framework. Perfect for businesses looking to expand internationally.',
                'date' => '2024-03-12',
                'end_date' => '2024-03-12',
                'time' => '09:00:00',
                'end_time' => '13:00:00',
                'location' => 'TYCC Trade Center',
                'address' => '789 Trade Avenue, Dar es Salaam',
                'attendees_limit' => 60,
                'registered_attendees' => 45,
                'price' => 15000,
                'currency' => 'TSh',
                'category' => 'Training',
                'featured' => false,
                'registration_open' => true,
                'registration_deadline' => '2024-03-08',
                'image' => 'events/export-training.jpg',
                'agenda' => json_encode([
                    '09:00-09:30' => 'Registration & Welcome',
                    '09:30-10:30' => 'AfCFTA Overview & Opportunities',
                    '10:30-10:45' => 'Break',
                    '10:45-11:45' => 'Export Documentation & Procedures',
                    '11:45-12:45' => 'Market Research & Entry Strategies',
                    '12:45-13:00' => 'Q&A & Closing'
                ]),
                'speakers' => json_encode([
                    ['name' => 'Grace Mollel', 'title' => 'Trade Specialist', 'company' => 'Tanzania Trade Development Authority'],
                    ['name' => 'Ahmed Hassan', 'title' => 'Export Consultant', 'company' => 'Africa Trade Solutions']
                ]),
                'sponsors' => json_encode(['Tanzania Trade Development Authority', 'African Union']),
                'requirements' => json_encode(['Existing Business', 'Export Interest', 'Basic Trade Knowledge']),
                'status' => 'upcoming',
                'created_at' => Carbon::parse('2024-02-05'),
                'updated_at' => Carbon::parse('2024-02-05'),
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
