<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('knowledge_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('slug');
            $table->string('icon')->default('fa-book');
            $table->string('color')->default('#47b2e4');
            $table->text('description')->nullable();
            $table->text('examples')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['company_id', 'is_active']);
            $table->index(['company_id', 'slug']);
            $table->unique(['company_id', 'slug']);
        });

        // Seed default knowledge types for existing companies
        $this->seedDefaultKnowledgeTypes();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_types');
    }

    /**
     * Seed default knowledge types for all companies
     */
    private function seedDefaultKnowledgeTypes(): void
    {
        $defaultTypes = [
            [
                'name' => 'Onboarding Knowledge',
                'slug' => 'onboarding-knowledge',
                'icon' => 'fa-user-plus',
                'color' => '#3498db',
                'description' => 'Share what you wish you knew when you first started. Help new team members get up to speed faster with practical tips and essential information.',
                'examples' => json_encode([
                    'First week survival guide',
                    'Essential tools and setup',
                    'Common beginner questions'
                ]),
                'order' => 1
            ],
            [
                'name' => 'Mistakes & Lessons Learned',
                'slug' => 'mistakes-lessons-learned',
                'icon' => 'fa-lightbulb',
                'color' => '#e74c3c',
                'description' => 'Document mistakes you\'ve made so others can avoid them. Share the lessons you learned and how you resolved the issues.',
                'examples' => json_encode([
                    'Common coding errors',
                    'Project pitfalls to avoid',
                    'Communication mistakes'
                ]),
                'order' => 2
            ],
            [
                'name' => 'Operational Knowledge',
                'slug' => 'operational-knowledge',
                'icon' => 'fa-cogs',
                'color' => '#2ecc71',
                'description' => 'Document specific tasks, processes, and workflows. Make it easy for others to replicate what you do with detailed step-by-step guides.',
                'examples' => json_encode([
                    'How to deploy applications',
                    'Database backup procedures',
                    'Client onboarding process'
                ]),
                'order' => 3
            ],
            [
                'name' => 'Critical & Strategic Knowledge',
                'slug' => 'critical-strategic-knowledge',
                'icon' => 'fa-trophy',
                'color' => '#f39c12',
                'description' => 'Share career-defining moments, strategic decisions, and important lessons. Inspire others with stories of growth and achievement.',
                'examples' => json_encode([
                    'How I got promoted',
                    'Major project success story',
                    'Career turning points'
                ]),
                'order' => 4
            ]
        ];

        // Get all companies
        $companies = DB::table('companies')->get();

        foreach ($companies as $company) {
            foreach ($defaultTypes as $type) {
                DB::table('knowledge_types')->insert([
                    'company_id' => $company->id,
                    'name' => $type['name'],
                    'slug' => $type['slug'],
                    'icon' => $type['icon'],
                    'color' => $type['color'],
                    'description' => $type['description'],
                    'examples' => $type['examples'],
                    'order' => $type['order'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
};
