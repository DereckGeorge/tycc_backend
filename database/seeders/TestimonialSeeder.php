<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Carbon\Carbon;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'name' => 'Amina Hassan',
                'role' => 'Founder & CEO',
                'company' => 'TechSolutions Tanzania',
                'testimonial' => 'TYCC\'s Youth Business Incubator transformed my tech startup idea into a thriving business. The mentorship and networking opportunities were invaluable in securing our first major clients. The program provided not just business knowledge, but also the confidence and connections needed to succeed in the competitive tech industry.',
                'avatar' => 'testimonials/amina-hassan.jpg',
                'rating' => 5,
                'program_id' => 1, // Youth Business Incubator
                'status' => 'active',
                'featured' => true,
                'video_testimonial' => null,
                'linkedin_profile' => 'https://linkedin.com/in/amina-hassan-tz',
                'created_at' => Carbon::parse('2024-01-10'),
                'updated_at' => Carbon::parse('2024-01-10'),
            ],
            [
                'name' => 'John Mwalimu',
                'role' => 'Co-founder',
                'company' => 'GreenAgri Innovations',
                'testimonial' => 'The Digital Skills program equipped me with the knowledge to scale my agricultural business online. Within 6 months, we increased our revenue by 300% through e-commerce platforms. The practical approach and hands-on training made all the difference in our digital transformation journey.',
                'avatar' => 'testimonials/john-mwalimu.jpg',
                'rating' => 5,
                'program_id' => 2, // Digital Skills for Entrepreneurs
                'status' => 'active',
                'featured' => true,
                'video_testimonial' => 'testimonials/videos/john-mwalimu.mp4',
                'linkedin_profile' => 'https://linkedin.com/in/john-mwalimu',
                'created_at' => Carbon::parse('2024-01-12'),
                'updated_at' => Carbon::parse('2024-01-12'),
            ],
            [
                'name' => 'Grace Kimaro',
                'role' => 'Managing Director',
                'company' => 'Kimaro Fashion House',
                'testimonial' => 'The Women in Business Track gave me the confidence and skills to expand my fashion business across East Africa. The support network I built continues to be instrumental in my success. The program addressed unique challenges women face in business and provided practical solutions.',
                'avatar' => 'testimonials/grace-kimaro.jpg',
                'rating' => 5,
                'program_id' => 3, // Women in Business Track
                'status' => 'active',
                'featured' => true,
                'video_testimonial' => null,
                'linkedin_profile' => 'https://linkedin.com/in/grace-kimaro',
                'created_at' => Carbon::parse('2024-01-14'),
                'updated_at' => Carbon::parse('2024-01-14'),
            ],
            [
                'name' => 'David Mollel',
                'role' => 'Founder',
                'company' => 'EduTech Africa',
                'testimonial' => 'TYCC\'s programs opened doors I never knew existed. The connections I made at the Youth Business Summit led to partnerships that transformed my education technology startup. The networking opportunities and investor connections were game-changing for our business.',
                'avatar' => 'testimonials/david-mollel.jpg',
                'rating' => 5,
                'program_id' => 4, // Youth Business Summit
                'status' => 'active',
                'featured' => false,
                'video_testimonial' => 'testimonials/videos/david-mollel.mp4',
                'linkedin_profile' => 'https://linkedin.com/in/david-mollel',
                'created_at' => Carbon::parse('2024-01-16'),
                'updated_at' => Carbon::parse('2024-01-16'),
            ],
            [
                'name' => 'Fatuma Said',
                'role' => 'Export Manager',
                'company' => 'Spice Route Trading',
                'testimonial' => 'The AfCFTA Access Program prepared my spice trading business for continental expansion. We now export to 8 African countries, thanks to the market insights and trade facilitation support. The program provided practical knowledge about export procedures and market opportunities.',
                'avatar' => 'testimonials/fatuma-said.jpg',
                'rating' => 5,
                'program_id' => 5, // AfCFTA Access Program
                'status' => 'active',
                'featured' => false,
                'video_testimonial' => null,
                'linkedin_profile' => 'https://linkedin.com/in/fatuma-said',
                'created_at' => Carbon::parse('2024-01-18'),
                'updated_at' => Carbon::parse('2024-01-18'),
            ],
            [
                'name' => 'Peter Mwanza',
                'role' => 'CEO',
                'company' => 'Solar Power Solutions',
                'testimonial' => 'The mentorship I received through TYCC was instrumental in scaling my renewable energy business. The program connected me with industry experts who guided me through the challenges of growing a tech-enabled business in the energy sector.',
                'avatar' => 'testimonials/peter-mwanza.jpg',
                'rating' => 5,
                'program_id' => 1, // Youth Business Incubator
                'status' => 'active',
                'featured' => false,
                'video_testimonial' => null,
                'linkedin_profile' => null,
                'created_at' => Carbon::parse('2024-01-20'),
                'updated_at' => Carbon::parse('2024-01-20'),
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
