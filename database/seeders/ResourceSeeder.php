<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;
use Carbon\Carbon;

class ResourceSeeder extends Seeder
{
    public function run()
    {
        $resources = [
            [
                'title' => 'TYCC Constitution',
                'description' => 'Official constitution and governance documents of the Tanzania Youth Chamber of Commerce.',
                'type' => 'PDF',
                'category' => 'business_planning',
                'file_path' => 'resources/documents/tycc-constitution.pdf',
                'file_size' => '2621440', // 2.5 MB in bytes
                'file_size_formatted' => '2.5 MB',
                'download_count' => 1250,
                'featured' => true,
                'status' => 'active',
                'access_level' => 'public',
                'tags' => json_encode(['constitution', 'governance', 'legal', 'official']),
                'version' => '2.1',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
            [
                'title' => 'Business Plan Template',
                'description' => 'Comprehensive business plan template specifically designed for young entrepreneurs in Tanzania.',
                'type' => 'PDF',
                'category' => 'business_planning',
                'file_path' => 'resources/templates/business-plan-template.pdf',
                'file_size' => '1887437', // 1.8 MB in bytes
                'file_size_formatted' => '1.8 MB',
                'download_count' => 3400,
                'featured' => true,
                'status' => 'active',
                'access_level' => 'public',
                'tags' => json_encode(['business plan', 'template', 'planning', 'startup']),
                'version' => '3.0',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
            [
                'title' => 'Digital Marketing Guide',
                'description' => 'Complete guide to digital marketing for small businesses, including social media strategies and online advertising.',
                'type' => 'PDF',
                'category' => 'marketing',
                'file_path' => 'resources/guides/digital-marketing-guide.pdf',
                'file_size' => '4404019', // 4.2 MB in bytes
                'file_size_formatted' => '4.2 MB',
                'download_count' => 2100,
                'featured' => true,
                'status' => 'active',
                'access_level' => 'public',
                'tags' => json_encode(['digital marketing', 'social media', 'advertising', 'online marketing']),
                'version' => '1.5',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
            [
                'title' => 'Funding Opportunities Database',
                'description' => 'Comprehensive database of funding opportunities available for young entrepreneurs in Tanzania and East Africa.',
                'type' => 'Excel',
                'category' => 'funding',
                'file_path' => 'resources/databases/funding-opportunities.xlsx',
                'file_size' => '870400', // 850 KB in bytes
                'file_size_formatted' => '850 KB',
                'download_count' => 1800,
                'featured' => false,
                'status' => 'active',
                'access_level' => 'members',
                'tags' => json_encode(['funding', 'grants', 'investors', 'opportunities']),
                'version' => '2024.1',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-15'),
            ],
            [
                'title' => 'Export/Import Procedures Guide',
                'description' => 'Step-by-step guide for young entrepreneurs looking to engage in international trade under AfCFTA.',
                'type' => 'PDF',
                'category' => 'trade',
                'file_path' => 'resources/guides/export-import-guide.pdf',
                'file_size' => '3250586', // 3.1 MB in bytes
                'file_size_formatted' => '3.1 MB',
                'download_count' => 950,
                'featured' => false,
                'status' => 'active',
                'access_level' => 'public',
                'tags' => json_encode(['export', 'import', 'trade', 'AfCFTA', 'procedures']),
                'version' => '1.2',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
            [
                'title' => 'Financial Management Toolkit',
                'description' => 'Essential financial management tools including cash flow templates, budgeting sheets, and financial planning guides.',
                'type' => 'Excel',
                'category' => 'finance',
                'file_path' => 'resources/toolkits/financial-management-toolkit.xlsx',
                'file_size' => '1258291', // 1.2 MB in bytes
                'file_size_formatted' => '1.2 MB',
                'download_count' => 2800,
                'featured' => false,
                'status' => 'active',
                'access_level' => 'public',
                'tags' => json_encode(['finance', 'budgeting', 'cash flow', 'financial planning']),
                'version' => '2.3',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
            [
                'title' => 'Market Research Template',
                'description' => 'Structured template for conducting comprehensive market research and competitor analysis.',
                'type' => 'Word',
                'category' => 'research',
                'file_path' => 'resources/templates/market-research-template.docx',
                'file_size' => '524288', // 512 KB in bytes
                'file_size_formatted' => '512 KB',
                'download_count' => 1650,
                'featured' => false,
                'status' => 'active',
                'access_level' => 'public',
                'tags' => json_encode(['market research', 'competitor analysis', 'template', 'research']),
                'version' => '1.0',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
            [
                'title' => 'Pitch Deck Template',
                'description' => 'Professional pitch deck template for presenting your business to investors and stakeholders.',
                'type' => 'PowerPoint',
                'category' => 'funding',
                'file_path' => 'resources/templates/pitch-deck-template.pptx',
                'file_size' => '2097152', // 2 MB in bytes
                'file_size_formatted' => '2.0 MB',
                'download_count' => 2250,
                'featured' => false,
                'status' => 'active',
                'access_level' => 'members',
                'tags' => json_encode(['pitch deck', 'presentation', 'investors', 'template']),
                'version' => '1.1',
                'language' => 'English',
                'created_at' => Carbon::parse('2024-01-01'),
                'updated_at' => Carbon::parse('2024-01-01'),
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
