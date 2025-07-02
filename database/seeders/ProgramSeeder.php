<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'title' => 'Youth Business Incubator',
                'description' => 'A comprehensive 6-month program that provides young entrepreneurs with mentorship, funding opportunities, and business development support to transform innovative ideas into viable businesses.',
                'full_description' => 'Our flagship program designed to nurture early-stage startups through intensive mentorship, workshops, and access to funding. Participants receive one-on-one coaching, pitch training, market validation support, and networking opportunities with successful entrepreneurs and investors.',
                'category' => 'Incubation',
                'duration' => '6 months',
                'participants' => 150,
                'icon' => 'lightbulb',
                'features' => json_encode(['1-on-1 Mentorship', 'Funding Access', 'Pitch Training', 'Market Validation', 'Networking Events']),
                'requirements' => json_encode(['Age 18-35', 'Business Idea', 'Commitment to Program', 'Basic Business Plan']),
                'next_intake' => '2024-03-01',
                'location' => 'TYCC Innovation Hub, Dar es Salaam',
                'cost' => 'Free',
                'status' => 'active',
                'featured' => true,
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Digital Skills for Entrepreneurs',
                'description' => 'Equipping young business owners with essential digital marketing, e-commerce, and technology skills needed to thrive in the modern business landscape.',
                'full_description' => 'A practical program covering digital marketing, social media management, e-commerce platforms, basic web development, and digital financial services. Perfect for entrepreneurs looking to digitize their operations and reach new markets online.',
                'category' => 'Digital Skills',
                'duration' => '3 months',
                'participants' => 200,
                'icon' => 'laptop',
                'features' => json_encode(['Digital Marketing', 'E-commerce Setup', 'Social Media Management', 'Basic Web Development', 'Digital Payments']),
                'requirements' => json_encode(['Basic Computer Skills', 'Existing Business', 'Internet Access', 'Smartphone/Laptop']),
                'next_intake' => '2024-02-01',
                'location' => 'Online & TYCC Centers',
                'cost' => 'TSh 50,000',
                'status' => 'active',
                'featured' => true,
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Women in Business Track',
                'description' => 'A specialized program designed to empower young women entrepreneurs with leadership skills, networking opportunities, and access to women-focused funding initiatives.',
                'full_description' => 'Addressing unique challenges faced by women entrepreneurs through leadership development, confidence building, work-life balance strategies, and access to women-only funding opportunities and networks.',
                'category' => 'Women Empowerment',
                'duration' => '4 months',
                'participants' => 120,
                'icon' => 'users',
                'features' => json_encode(['Leadership Training', 'Confidence Building', 'Women-only Networks', 'Funding Access', 'Work-life Balance']),
                'requirements' => json_encode(['Female Entrepreneur', 'Age 18-40', 'Business Idea/Existing Business', 'Leadership Potential']),
                'next_intake' => '2024-04-01',
                'location' => 'TYCC Women\'s Center, Dar es Salaam',
                'cost' => 'Free',
                'status' => 'active',
                'featured' => true,
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Youth Business Summit',
                'description' => 'An annual flagship event bringing together young entrepreneurs, investors, and industry leaders for networking, knowledge sharing, and partnership opportunities.',
                'full_description' => 'Tanzania\'s premier youth entrepreneurship event featuring keynote speakers, panel discussions, pitch competitions, exhibition spaces, and extensive networking opportunities. A must-attend event for anyone in the youth business ecosystem.',
                'category' => 'Events',
                'duration' => '3 days',
                'participants' => 500,
                'icon' => 'calendar',
                'features' => json_encode(['Keynote Speakers', 'Panel Discussions', 'Pitch Competition', 'Exhibition', 'Networking']),
                'requirements' => json_encode(['Youth Entrepreneur', 'Registration Required', 'Business Interest', 'Networking Mindset']),
                'next_intake' => '2024-03-15',
                'location' => 'Dar es Salaam Convention Centre',
                'cost' => 'TSh 25,000',
                'status' => 'active',
                'featured' => true,
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'AfCFTA Access Program',
                'description' => 'Preparing young entrepreneurs to leverage opportunities within the African Continental Free Trade Area through market research, trade facilitation, and cross-border business development.',
                'full_description' => 'Specialized training on continental trade opportunities, export/import procedures, market research across African countries, trade finance, and building cross-border business relationships under the AfCFTA framework.',
                'category' => 'Trade',
                'duration' => '5 months',
                'participants' => 80,
                'icon' => 'globe',
                'features' => json_encode(['Trade Procedures', 'Market Research', 'Export Training', 'Trade Finance', 'Cross-border Networks']),
                'requirements' => json_encode(['Existing Business', 'Export Interest', 'Basic Trade Knowledge', 'Commitment to Africa Trade']),
                'next_intake' => '2024-05-01',
                'location' => 'TYCC Trade Center, Dar es Salaam',
                'cost' => 'TSh 100,000',
                'status' => 'active',
                'featured' => true,
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
