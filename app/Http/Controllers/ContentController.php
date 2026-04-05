<?php

namespace App\Http\Controllers;

use App\Models\SiteAbout;
use App\Models\SiteHero;
use App\Models\SiteNavbar;
use App\Models\SiteNews;
use App\Models\SitePricing;
use App\Models\SiteService;
use Illuminate\Http\JsonResponse;

class ContentController extends Controller
{
    /**
     * Return API payload matching frontend JSON structure.
     */
    public function index(): JsonResponse
    {
        $navbar = SiteNavbar::query()->first();
        $hero = SiteHero::query()->first();
        $about = SiteAbout::query()->first();
        $services = SiteService::query()->first();
        $news = SiteNews::query()->first();
        $pricing = SitePricing::query()->first();

        return response()->json([
            'navbar' => [
                'brandPrefix' => $navbar?->brand_prefix,
                'brandHighlight' => $navbar?->brand_highlight,
                'brandSuffix' => $navbar?->brand_suffix,
                'phone' => $navbar?->phone,
                'menu' => $navbar?->menu ?? [],
            ],
            'hero' => [
                'slides' => $hero?->slides ?? [],
            ],
            'about' => [
                'sectionTitle' => $about?->section_title,
                'image' => $about?->image,
                'imageAlt' => $about?->image_alt,
                'overlayTitle' => $about?->overlay_title,
                'overlayDescription' => $about?->overlay_description,
                'headline' => $about?->headline,
                'paragraphs' => $about?->paragraphs ?? [],
                'signatureImage' => $about?->signature_image,
                'signatureName' => $about?->signature_name,
            ],
            'services' => [
                'sectionTitle' => $services?->section_title,
                'items' => $services?->items ?? [],
            ],
            'news' => [
                'sectionTitle' => $news?->section_title,
                'items' => $news?->items ?? [],
                'newsletter' => $news?->newsletter ?? (object) [],
                'modal' => $news?->modal ?? (object) [],
            ],
            'pricing' => [
                'sectionTitle' => $pricing?->section_title,
                'plans' => $pricing?->plans ?? [],
            ],
        ]);
    }
}
