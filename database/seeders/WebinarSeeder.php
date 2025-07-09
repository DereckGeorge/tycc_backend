<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Webinar;
use Carbon\Carbon;

class WebinarSeeder extends Seeder
{
    public function run()
    {
        $webinars = [
            [
                'title' => 'Building Resilient Businesses in Challenging Times',
                'description' => 'Learn strategies for building businesses that can withstand economic uncertainties and market volatility.',
                'full_description' => 'Join us for an insightful webinar on strategies for building resilient businesses that can thrive even in challenging economic conditions. Topics include risk management, diversification strategies, cash flow management, and adaptive business models.',
                'duration' => '45 minutes',
                'date' => '2024-01-15',
                'time' => '15:00:00',
                'speaker' => 'Dr. Sarah Mwangi, Business Consultant',
                'speaker_bio' => 'Dr. Sarah Mwangi is a renowned business consultant with over 15 years of experience helping businesses navigate challenging markets. She holds a PhD in Business Strategy and has worked with over 200 companies across East Africa.',
                'video_url' => 'webinars/videos/resilient-business.mp4',
                'thumbnail' => 'webinars/thumbnails/resilient-business.jpg',
                'category' => 'business',
                'views' => 1200,
                'featured' => true,
                'status' => 'published',
                'registration_required' => false,
                'max_attendees' => 500,
                'registered_attendees' => 0,
                'tags' => json_encode(['resilience', 'business strategy', 'risk management', 'adaptation']),
                'resources' => json_encode([
                    'slides' => 'webinars/resources/resilient-businesses-slides.pdf',
                    'worksheet' => 'webinars/resources/resilience-assessment.pdf'
                ]),
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Digital Marketing Mastery',
                'description' => 'Learn effective digital marketing strategies for small businesses.',
                'full_description' => 'Master the art of digital marketing with practical steps for digitizing your business operations and reaching customers online.',
                'duration' => '60 minutes',
                'date' => '2024-01-05',
                'time' => '14:00:00',
                'speaker' => 'John Temba, Digital Marketing Expert',
                'speaker_bio' => 'John Temba is a digital marketing expert and founder of Digital Solutions Ltd. He has helped over 300 small businesses successfully transition to digital platforms and has been recognized as a leading digital transformation consultant in East Africa.',
                'video_url' => 'webinars/videos/digital-marketing.mp4',
                'thumbnail' => 'webinars/thumbnails/digital-marketing.jpg',
                'category' => 'marketing',
                'views' => 2100,
                'featured' => true,
                'status' => 'published',
                'registration_required' => false,
                'max_attendees' => 1000,
                'registered_attendees' => 0,
                'tags' => json_encode(['digital transformation', 'online marketing', 'e-commerce', 'technology']),
                'resources' => json_encode([
                    'slides' => 'webinars/resources/digital-transformation-slides.pdf',
                    'checklist' => 'webinars/resources/digital-readiness-checklist.pdf',
                    'tools_list' => 'webinars/resources/recommended-digital-tools.pdf'
                ]),
                'created_at' => Carbon::parse('2024-01-05'),
                'updated_at' => Carbon::parse('2024-01-05'),
            ],
            [
                'title' => 'Accessing International Markets through AfCFTA',
                'description' => 'Understanding opportunities and requirements for expanding your business across African markets.',
                'full_description' => 'Explore the opportunities presented by the African Continental Free Trade Area (AfCFTA) for young entrepreneurs. This webinar covers market research strategies, export procedures, trade finance options, and success stories from businesses that have successfully expanded across African markets.',
                'duration' => '50 minutes',
                'date' => '2023-11-28',
                'time' => '16:00:00',
                'speaker' => 'Grace Mollel, Trade Specialist',
                'speaker_bio' => 'Grace Mollel is a trade specialist with the Tanzania Trade Development Authority. She has over 10 years of experience in international trade and has been instrumental in helping Tanzanian businesses access regional and international markets.',
                'video_url' => 'webinars/videos/afcfta-opportunities.mp4',
                'thumbnail' => 'webinars/thumbnails/afcfta-opportunities.jpg',
                'category' => 'business',
                'views' => 850,
                'featured' => false,
                'status' => 'published',
                'registration_required' => true,
                'max_attendees' => 300,
                'registered_attendees' => 0,
                'tags' => json_encode(['AfCFTA', 'international trade', 'export', 'market expansion']),
                'resources' => json_encode([
                    'slides' => 'webinars/resources/afcfta-presentation.pdf',
                    'market_guide' => 'webinars/resources/african-markets-guide.pdf',
                    'export_checklist' => 'webinars/resources/export-readiness-checklist.pdf'
                ]),
                'created_at' => Carbon::parse('2023-11-28'),
                'updated_at' => Carbon::parse('2023-11-28'),
            ],
            [
                'title' => 'Fundraising Strategies for Startups',
                'description' => 'Comprehensive guide to raising capital for your startup, from angel investors to venture capital.',
                'full_description' => 'Learn the fundamentals of startup fundraising including how to prepare for investment, different types of funding available, how to approach investors, and what investors look for in startups. This webinar includes real case studies and practical tips from successful entrepreneurs.',
                'duration' => '55 minutes',
                'date' => '2023-10-25',
                'time' => '14:30:00',
                'speaker' => 'Michael Ouma, Venture Capitalist',
                'speaker_bio' => 'Michael Ouma is a partner at TechVenture Capital, one of East Africa\'s leading venture capital firms. He has been involved in over 50 startup investments and has extensive experience in evaluating and supporting early-stage companies.',
                'video_url' => 'webinars/videos/fundraising-strategies.mp4',
                'thumbnail' => 'webinars/thumbnails/fundraising-strategies.jpg',
                'category' => 'finance',
                'views' => 1850,
                'featured' => false,
                'status' => 'published',
                'registration_required' => true,
                'max_attendees' => 400,
                'registered_attendees' => 0,
                'tags' => json_encode(['fundraising', 'investment', 'venture capital', 'angel investors']),
                'resources' => json_encode([
                    'slides' => 'webinars/resources/fundraising-presentation.pdf',
                    'pitch_template' => 'webinars/resources/investor-pitch-template.pptx',
                    'due_diligence' => 'webinars/resources/due-diligence-checklist.pdf'
                ]),
                'created_at' => Carbon::parse('2023-10-25'),
                'updated_at' => Carbon::parse('2023-10-25'),
            ],
        ];

        foreach ($webinars as $webinar) {
            Webinar::create($webinar);
        }
    }
}
