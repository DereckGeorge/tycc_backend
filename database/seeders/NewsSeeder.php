<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $newsArticles = [
            [
                'title' => 'TYCC Launches New Digital Innovation Hub',
                'excerpt' => 'A state-of-the-art facility equipped with modern technology to support young entrepreneurs in developing digital solutions for local and regional markets.',
                'content' => 'The Tanzania Youth Chamber of Commerce has officially launched its Digital Innovation Hub, a cutting-edge facility designed to nurture the next generation of tech entrepreneurs. The hub features modern workspaces, high-speed internet, 3D printing capabilities, and access to mentorship from industry experts.

Located in the heart of Dar es Salaam, the 2,000 square meter facility includes co-working spaces, meeting rooms, a fabrication lab, and a demo theater for pitch presentations. The hub is equipped with the latest technology including high-performance computers, software development tools, and prototyping equipment.

"This innovation hub represents our commitment to supporting Tanzania\'s digital transformation," said the TYCC Director. "We believe that by providing young entrepreneurs with access to world-class facilities and mentorship, we can accelerate the growth of the tech ecosystem in Tanzania."

The hub will host various programs including coding bootcamps, startup accelerators, and tech talks featuring industry leaders. It will also serve as a venue for networking events and collaboration between entrepreneurs, investors, and established businesses.

Applications for workspace membership are now open, with priority given to early-stage tech startups and entrepreneurs working on innovative solutions for local challenges.',
                'category' => 'Innovation',
                'date' => '2024-01-20',
                'image' => 'news/innovation-hub-launch.jpg',
                'slug' => 'tycc-launches-digital-innovation-hub',
                'author' => 'TYCC Communications Team',
                'status' => 'published',
                'featured' => true,
                'views' => 1250,
                'meta_description' => 'TYCC launches state-of-the-art Digital Innovation Hub to support young tech entrepreneurs in Tanzania.',
                'tags' => json_encode(['innovation', 'technology', 'entrepreneurship', 'startup']),
                'created_at' => Carbon::parse('2024-01-20'),
                'updated_at' => Carbon::parse('2024-01-20'),
            ],
            [
                'title' => '50 Young Entrepreneurs Graduate from Business Incubator',
                'excerpt' => 'The latest cohort of the Youth Business Incubator program celebrates successful completion, with 80% of participants launching viable businesses.',
                'content' => 'In a ceremony held at the Dar es Salaam Convention Centre, 50 young entrepreneurs graduated from TYCC\'s flagship Youth Business Incubator program. The graduates represent diverse sectors including agriculture, technology, manufacturing, and services.

The six-month intensive program provided participants with comprehensive business training, one-on-one mentorship, and access to funding opportunities. Of the 50 graduates, 40 have successfully launched their businesses, with a combined capital of over $500,000 raised from various sources.

"The transformation we\'ve witnessed in these young entrepreneurs is remarkable," said the Program Director. "They came to us with ideas and dreams, and they\'re leaving as confident business owners ready to make their mark in the market."

Success stories from the cohort include a mobile app development company that has already secured three major clients, an organic farming venture that supplies to five major supermarket chains, and a fashion design business that has expanded to three locations.

The program\'s success rate continues to exceed expectations, with 85% of all graduates from previous cohorts still operating their businesses after two years. This success has attracted attention from international development partners, leading to increased funding for future cohorts.

Applications for the next cohort open in February 2024, with the program set to accommodate 60 participants.',
                'category' => 'Programs',
                'date' => '2024-01-18',
                'image' => 'news/incubator-graduation.jpg',
                'slug' => '50-entrepreneurs-graduate-business-incubator',
                'author' => 'Sarah Johnson',
                'status' => 'published',
                'featured' => true,
                'views' => 2100,
                'meta_description' => '50 young entrepreneurs successfully graduate from TYCC Business Incubator program with 80% launching viable businesses.',
                'tags' => json_encode(['graduation', 'incubator', 'success', 'entrepreneurship']),
                'created_at' => Carbon::parse('2024-01-18'),
                'updated_at' => Carbon::parse('2024-01-18'),
            ],
            [
                'title' => 'Partnership with African Development Bank Announced',
                'excerpt' => 'TYCC signs MOU with AfDB to provide $2M in funding support for youth-led businesses across Tanzania over the next three years.',
                'content' => 'The Tanzania Youth Chamber of Commerce has entered into a strategic partnership with the African Development Bank to enhance access to finance for young entrepreneurs. This partnership will provide crucial funding and technical assistance to promising youth-led businesses.

The Memorandum of Understanding, signed at the AfDB headquarters in Abidjan, establishes a $2 million fund specifically dedicated to supporting youth entrepreneurship in Tanzania. The fund will be disbursed over three years, targeting startups and small businesses led by entrepreneurs aged 18-35.

"This partnership aligns perfectly with our mission to empower young Africans through entrepreneurship," said the AfDB Vice President for Private Sector Development. "Tanzania has shown remarkable potential in youth innovation, and we\'re excited to support the next generation of business leaders."

The funding will be available through various mechanisms including grants for early-stage startups, low-interest loans for established businesses, and equity investments for high-growth potential companies. Additionally, the partnership includes technical assistance programs covering business development, financial management, and market access.

Priority sectors for funding include agriculture and agribusiness, renewable energy, digital technology, healthcare, and manufacturing. The partnership also emphasizes support for women-led businesses, with at least 40% of funding allocated to female entrepreneurs.

TYCC will serve as the implementing partner, responsible for identifying and vetting potential beneficiaries, providing ongoing support, and monitoring the impact of investments. The first call for applications is expected to open in March 2024.',
                'category' => 'Partnerships',
                'date' => '2024-01-15',
                'image' => 'news/afdb-partnership.jpg',
                'slug' => 'partnership-african-development-bank',
                'author' => 'Michael Temba',
                'status' => 'published',
                'featured' => true,
                'views' => 1800,
                'meta_description' => 'TYCC partners with African Development Bank for $2M youth entrepreneurship fund in Tanzania.',
                'tags' => json_encode(['partnership', 'funding', 'AfDB', 'development']),
                'created_at' => Carbon::parse('2024-01-15'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Women in Business Track Records 95% Success Rate',
                'excerpt' => 'The specialized program for women entrepreneurs achieves remarkable results with participants reporting significant business growth and expansion.',
                'content' => 'TYCC\'s Women in Business Track has achieved a 95% success rate, with participants reporting an average revenue increase of 250% within six months of program completion. The program has become a model for women\'s entrepreneurship development across East Africa.

The four-month intensive program addresses unique challenges faced by women entrepreneurs, including access to finance, work-life balance, confidence building, and networking. Since its launch in 2022, the program has supported over 300 women entrepreneurs across various sectors.

"The Women in Business Track has been transformative for our participants," said the Program Coordinator. "We\'ve seen women who started with small home-based businesses expand to multiple locations and employ dozens of people."

Key success factors include the program\'s holistic approach, combining business skills training with personal development, mentorship from successful women entrepreneurs, and access to women-only funding opportunities. The program also provides ongoing support through alumni networks and quarterly check-ins.

Notable success stories include a catering business that grew from serving 20 customers per week to catering for major corporate events, a fashion designer who now exports to three African countries, and a tech entrepreneur who developed a mobile app that has been downloaded over 100,000 times.

The program\'s success has attracted international recognition, with delegations from Kenya, Uganda, and Rwanda visiting to learn about the model. Plans are underway to expand the program to other regions of Tanzania and potentially franchise the model to other countries.

The next cohort begins in April 2024, with applications opening in February.',
                'category' => 'Women Empowerment',
                'date' => '2024-01-12',
                'image' => 'news/women-business-success.jpg',
                'slug' => 'women-business-track-success-rate',
                'author' => 'Grace Mwangi',
                'status' => 'published',
                'featured' => false,
                'views' => 1650,
                'meta_description' => 'TYCC Women in Business Track achieves 95% success rate with 250% average revenue increase for participants.',
                'tags' => json_encode(['women', 'empowerment', 'success', 'business growth']),
                'created_at' => Carbon::parse('2024-01-12'),
                'updated_at' => Carbon::parse('2024-01-12'),
            ],
            [
                'title' => 'Annual Youth Business Summit 2024 Registration Opens',
                'excerpt' => 'Join 500+ young entrepreneurs, investors, and industry leaders at Tanzania\'s premier youth business event scheduled for March 15-17, 2024.',
                'content' => 'Registration is now open for the Annual Youth Business Summit 2024, TYCC\'s flagship event that brings together the brightest minds in youth entrepreneurship. The three-day summit will feature keynote speakers, panel discussions, pitch competitions, and networking opportunities.

This year\'s theme, "Building Resilient Businesses for Africa\'s Future," reflects the focus on creating sustainable enterprises that can thrive in challenging economic environments. The summit expects to attract over 500 participants from across East Africa.

Confirmed speakers include successful entrepreneurs, investors, policy makers, and development partners. Highlights include a keynote address by a prominent African tech entrepreneur, panel discussions on accessing finance and scaling businesses, and masterclasses on digital marketing and export strategies.

The summit will also feature the annual pitch competition, where 20 selected startups will compete for prizes totaling $50,000. Winners will also receive mentorship opportunities and potential investment from participating venture capital firms.

"The Youth Business Summit has become the must-attend event for anyone serious about youth entrepreneurship in Tanzania," said the Event Director. "It\'s where deals are made, partnerships are formed, and the future of business is shaped."

New this year is the Innovation Showcase, where participants can experience the latest technologies and solutions developed by young entrepreneurs. The showcase will feature virtual reality demonstrations, fintech solutions, and sustainable technology innovations.

Early bird registration is available until February 15, 2024, with discounted rates for students and TYCC members. The summit will be held at the Dar es Salaam Convention Centre, with accommodation packages available at partner hotels.',
                'category' => 'Events',
                'date' => '2024-01-10',
                'image' => 'news/summit-registration.jpg',
                'slug' => 'youth-business-summit-2024-registration',
                'author' => 'David Mwalimu',
                'status' => 'published',
                'featured' => false,
                'views' => 2800,
                'meta_description' => 'Register now for Youth Business Summit 2024 - Tanzania\'s premier entrepreneurship event March 15-17.',
                'tags' => json_encode(['summit', 'event', 'registration', 'networking']),
                'created_at' => Carbon::parse('2024-01-10'),
                'updated_at' => Carbon::parse('2024-01-10'),
            ],
            [
                'title' => 'TYCC Members Secure $500K in Funding This Quarter',
                'excerpt' => 'Young entrepreneurs from TYCC programs successfully raise significant funding from local and international investors.',
                'content' => 'Members of the Tanzania Youth Chamber of Commerce have collectively raised over $500,000 in funding during the first quarter of 2024, demonstrating the growing investor confidence in youth-led businesses.

The funding came from various sources including angel investors, venture capital firms, development finance institutions, and government grants. Notable investments include a $150,000 Series A round for a fintech startup, $100,000 in grant funding for a renewable energy company, and multiple smaller investments ranging from $10,000 to $50,000.

"This achievement reflects the quality of businesses emerging from our programs and the growing maturity of Tanzania\'s startup ecosystem," said the TYCC Executive Director. "Our members are not just creating businesses; they\'re building scalable solutions to real problems."

The funded businesses span various sectors including financial technology, agriculture, healthcare, education, and renewable energy. Many of these startups are addressing critical challenges in Tanzania while creating employment opportunities for other young people.

Success factors contributing to this funding success include comprehensive business training provided through TYCC programs, ongoing mentorship support, and connections to investor networks. The organization has also been working to educate investors about opportunities in youth-led businesses.

Several funded startups have already begun expanding their operations, with plans to enter new markets and hire additional staff. The success is expected to attract more investors to the Tanzanian startup ecosystem and inspire other young entrepreneurs to pursue their business ideas.

TYCC continues to support its members through investor readiness programs, pitch training, and connections to funding opportunities. The organization maintains relationships with over 50 investors and funding organizations.',
                'category' => 'Success Stories',
                'date' => '2024-01-08',
                'image' => 'news/funding-success.jpg',
                'slug' => 'members-secure-funding-quarter',
                'author' => 'Finance Team',
                'status' => 'published',
                'featured' => false,
                'views' => 1950,
                'meta_description' => 'TYCC members raise over $500K in funding this quarter, showing growing investor confidence in youth businesses.',
                'tags' => json_encode(['funding', 'investment', 'success', 'startups']),
                'created_at' => Carbon::parse('2024-01-08'),
                'updated_at' => Carbon::parse('2024-01-08'),
            ],
        ];

        foreach ($newsArticles as $article) {
            News::create($article);
        }
    }
}
