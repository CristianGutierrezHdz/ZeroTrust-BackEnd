<?php

namespace Database\Seeders;

use App\Models\SiteAbout;
use App\Models\SiteHero;
use App\Models\SiteNavbar;
use App\Models\SiteNews;
use App\Models\SitePricing;
use App\Models\SiteService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ContentSeeder extends Seeder
{
    /**
     * Seed content tables from the mock JSON source.
     */
    public function run(): void
    {
        $jsonPath = resource_path('json/mock-requets.json');

        if (! File::exists($jsonPath)) {
            return;
        }

        $payload = json_decode(File::get($jsonPath), true);

        if (! is_array($payload)) {
            return;
        }

        SiteNavbar::query()->updateOrCreate(
            ['id' => 1],
            [
                'brand_prefix' => data_get($payload, 'navbar.brandPrefix'),
                'brand_highlight' => data_get($payload, 'navbar.brandHighlight'),
                'brand_suffix' => data_get($payload, 'navbar.brandSuffix'),
                'phone' => data_get($payload, 'navbar.phone'),
                'menu' => data_get($payload, 'navbar.menu', []),
            ]
        );

        SiteHero::query()->updateOrCreate(
            ['id' => 1],
            [
                'slides' => data_get($payload, 'hero.slides', []),
            ]
        );

        SiteAbout::query()->updateOrCreate(
            ['id' => 1],
            [
                'section_title' => data_get($payload, 'about.sectionTitle'),
                'image' => data_get($payload, 'about.image'),
                'image_alt' => data_get($payload, 'about.imageAlt'),
                'overlay_title' => data_get($payload, 'about.overlayTitle'),
                'overlay_description' => data_get($payload, 'about.overlayDescription'),
                'headline' => data_get($payload, 'about.headline'),
                'paragraphs' => data_get($payload, 'about.paragraphs', []),
                'signature_image' => data_get($payload, 'about.signatureImage'),
                'signature_name' => data_get($payload, 'about.signatureName'),
            ]
        );

        SiteService::query()->updateOrCreate(
            ['id' => 1],
            [
                'section_title' => data_get($payload, 'services.sectionTitle'),
                'items' => data_get($payload, 'services.items', []),
            ]
        );

        SiteNews::query()->updateOrCreate(
            ['id' => 1],
            [
                'section_title' => data_get($payload, 'news.sectionTitle'),
                'items' => data_get($payload, 'news.items', []),
                'newsletter' => data_get($payload, 'news.newsletter', []),
                'modal' => data_get($payload, 'news.modal', []),
            ]
        );

        SitePricing::query()->updateOrCreate(
            ['id' => 1],
            [
                'section_title' => data_get($payload, 'pricing.sectionTitle'),
                'plans' => data_get($payload, 'pricing.plans', []),
            ]
        );
    }
}
