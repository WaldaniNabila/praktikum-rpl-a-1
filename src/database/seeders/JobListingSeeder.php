<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobListing;
use App\Models\Company;
use App\Models\Category;

class JobListingSeeder extends Seeder
{
    public function run(): void
    {
        $techCategory    = Category::where('slug', 'teknologi-it')->first();
        $designCategory  = Category::where('slug', 'desain-kreatif')->first();
        $marketCategory  = Category::where('slug', 'marketing-sales')->first();
        $productCategory = Category::where('slug', 'produk-riset')->first();

        $gojek     = Company::where('name', 'GoJek Indonesia')->first();
        $tokopedia = Company::where('name', 'Tokopedia')->first();
        $shopee    = Company::where('name', 'Shopee Indonesia')->first();
        $bukalapak = Company::where('name', 'Bukalapak')->first();
        $traveloka = Company::where('name', 'Traveloka')->first();

        $jobs = [
            // GoJek
            [
                'company_id'      => $gojek->id,
                'category_id'     => $designCategory->id,
                'title'           => 'UI/UX Designer',
                'description'     => 'Kami mencari UI/UX Designer yang berpengalaman untuk merancang pengalaman pengguna yang luar biasa di aplikasi GoJek.',
                'requirements'    => "- Pengalaman minimal 2 tahun sebagai UI/UX Designer\n- Mahir menggunakan Figma dan Adobe XD\n- Memahami prinsip desain material dan human-centered design\n- Portofolio desain yang kuat",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'hybrid',
                'salary_min'      => 8000000,
                'salary_max'      => 14000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            [
                'company_id'      => $gojek->id,
                'category_id'     => $techCategory->id,
                'title'           => 'Backend Engineer (Go/PHP)',
                'description'     => 'Bergabunglah dengan tim engineering GoJek untuk membangun sistem backend yang scalable dan reliable.',
                'requirements'    => "- Pengalaman minimal 3 tahun sebagai Backend Engineer\n- Mahir dalam bahasa Go atau PHP\n- Berpengalaman dengan microservices dan Docker\n- Familiar dengan MySQL dan Redis",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'remote',
                'salary_min'      => 15000000,
                'salary_max'      => 25000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            // Tokopedia
            [
                'company_id'      => $tokopedia->id,
                'category_id'     => $techCategory->id,
                'title'           => 'Frontend Developer (React)',
                'description'     => 'Tokopedia mencari Frontend Developer yang passionate untuk membangun pengalaman belanja online terbaik.',
                'requirements'    => "- Pengalaman minimal 2 tahun dengan React.js\n- Memahami HTML, CSS, JavaScript secara mendalam\n- Berpengalaman dengan TypeScript\n- Familiar dengan Redux atau Zustand",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'on-site',
                'salary_min'      => 10000000,
                'salary_max'      => 18000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            [
                'company_id'      => $tokopedia->id,
                'category_id'     => $productCategory->id,
                'title'           => 'Product Manager',
                'description'     => 'Kami mencari Product Manager yang berpengalaman untuk memimpin pengembangan produk di Tokopedia.',
                'requirements'    => "- Pengalaman minimal 3 tahun sebagai Product Manager\n- Memahami metodologi Agile dan Scrum\n- Kemampuan analisis data yang kuat\n- Berpengalaman dengan tools seperti Jira dan Confluence",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'hybrid',
                'salary_min'      => 15000000,
                'salary_max'      => 25000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            // Shopee
            [
                'company_id'      => $shopee->id,
                'category_id'     => $techCategory->id,
                'title'           => 'Data Analyst',
                'description'     => 'Shopee mencari Data Analyst untuk menganalisis data bisnis dan memberikan insight yang berharga.',
                'requirements'    => "- Pengalaman minimal 1 tahun sebagai Data Analyst\n- Mahir menggunakan SQL dan Python\n- Berpengalaman dengan tools visualisasi data (Tableau/Power BI)\n- Kemampuan statistik yang baik",
                'location'        => 'Jakarta Pusat',
                'employment_type' => 'full-time',
                'work_type'       => 'hybrid',
                'salary_min'      => 9000000,
                'salary_max'      => 15000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            [
                'company_id'      => $shopee->id,
                'category_id'     => $marketCategory->id,
                'title'           => 'Digital Marketing Specialist',
                'description'     => 'Kami mencari Digital Marketing Specialist untuk mengembangkan strategi pemasaran digital Shopee.',
                'requirements'    => "- Pengalaman minimal 2 tahun di digital marketing\n- Mahir dalam Google Ads dan Meta Ads\n- Memahami SEO dan SEM\n- Kemampuan analisis data marketing",
                'location'        => 'Jakarta Pusat',
                'employment_type' => 'full-time',
                'work_type'       => 'on-site',
                'salary_min'      => 7000000,
                'salary_max'      => 12000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            // Bukalapak
            [
                'company_id'      => $bukalapak->id,
                'category_id'     => $techCategory->id,
                'title'           => 'Mobile Developer (Android)',
                'description'     => 'Bukalapak mencari Mobile Developer Android yang berpengalaman untuk mengembangkan aplikasi mobile.',
                'requirements'    => "- Pengalaman minimal 2 tahun dengan Android development\n- Mahir dalam Kotlin dan Java\n- Memahami arsitektur MVVM\n- Berpengalaman dengan Jetpack Compose",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'hybrid',
                'salary_min'      => 12000000,
                'salary_max'      => 20000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            [
                'company_id'      => $bukalapak->id,
                'category_id'     => $productCategory->id,
                'title'           => 'Business Analyst',
                'description'     => 'Kami mencari Business Analyst untuk membantu pengambilan keputusan bisnis berbasis data.',
                'requirements'    => "- Pengalaman minimal 2 tahun sebagai Business Analyst\n- Kemampuan analisis data yang kuat\n- Mahir menggunakan Excel dan SQL\n- Kemampuan presentasi yang baik",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'on-site',
                'salary_min'      => 8000000,
                'salary_max'      => 14000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            // Traveloka
            [
                'company_id'      => $traveloka->id,
                'category_id'     => $techCategory->id,
                'title'           => 'DevOps Engineer',
                'description'     => 'Traveloka mencari DevOps Engineer untuk mengelola infrastruktur cloud dan CI/CD pipeline.',
                'requirements'    => "- Pengalaman minimal 3 tahun sebagai DevOps Engineer\n- Berpengalaman dengan AWS atau GCP\n- Mahir dalam Docker dan Kubernetes\n- Familiar dengan Terraform dan Ansible",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'remote',
                'salary_min'      => 18000000,
                'salary_max'      => 30000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
            [
                'company_id'      => $traveloka->id,
                'category_id'     => $designCategory->id,
                'title'           => 'Graphic Designer',
                'description'     => 'Traveloka mencari Graphic Designer kreatif untuk membuat konten visual yang menarik.',
                'requirements'    => "- Pengalaman minimal 1 tahun sebagai Graphic Designer\n- Mahir menggunakan Adobe Photoshop dan Illustrator\n- Memiliki portofolio desain yang kuat\n- Kreatif dan memiliki eye for detail",
                'location'        => 'Jakarta Selatan',
                'employment_type' => 'full-time',
                'work_type'       => 'on-site',
                'salary_min'      => 6000000,
                'salary_max'      => 10000000,
                'status'          => 'approved',
                'is_open'         => true,
            ],
        ];

        foreach ($jobs as $job) {
            JobListing::create($job);
        }
    }
}