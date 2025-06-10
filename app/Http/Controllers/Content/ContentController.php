<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class ContentController extends Controller
{
    /**
     * Display the main content management page.
     */
    // public function index()
    // {
    //     $content = Content::where('content_type', Content::TYPE_HERO)->first();
    //     return view('contents.hero', compact('content'));
    // }

    /**
     * Display the hero section configuration page.
     */
    public function hero()
    {
        $content = Content::where('content_type', Content::TYPE_HERO)->first();
        return view('contents.hero', compact('content'));
    }

    /**
     * Display the province section configuration page.
     */
    public function province()
    {
        $content = Content::where('content_type', Content::TYPE_PROVINCE)->first();
        return view('contents.province', compact('content'));
    }

    /**
     * Display the host services section configuration page.
     */
    public function host()
    {
        $content = Content::where('content_type', Content::TYPE_HOST)->first();
        return view('contents.host', compact('content'));
    }

    /**
     * Display the benefits section configuration page.
     */
    public function benefits()
    {
        $content = Content::where('content_type', Content::TYPE_BENEFITS)->first();
        return view('contents.benefits', compact('content'));
    }

    /**
     * Display the features section configuration page.
     */
    public function features()
    {
        $content = Content::where('content_type', Content::TYPE_FEATURES)->first();
        return view('contents.features', compact('content'));
    }

    /**
     * Display the FAQ section configuration page.
     */
    public function faq()
    {
        $content = Content::where('content_type', Content::TYPE_FAQ)->first();
        return view('contents.faq', compact('content'));
    }



    public function storeHero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'button_text' => 'required|string|max:50',
            'button_url' => 'required|url',
            'background_image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'hotels_count' => 'required|string',
            'bookings_count' => 'required|string',
            'revenue_generated' => 'required|string',
            'customer_satisfaction' => 'required|string',
            'secondary_button_text' => 'nullable|string|max:50',
            'secondary_button_url' => 'nullable|url',
            'show_statistics' => 'boolean',
            'enable_parallax' => 'boolean',
            'text_alignment' => 'required|string|in:left,center,right',
            'overlay_opacity' => 'required|string|in:0,0.3,0.5,0.7',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contentData = [
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'secondary_button_text' => $request->secondary_button_text,
            'secondary_button_url' => $request->secondary_button_url,
            'statistics' => [
                'hotels_count' => $request->hotels_count,
                'bookings_count' => $request->bookings_count,
                'revenue_generated' => $request->revenue_generated,
                'customer_satisfaction' => $request->customer_satisfaction,
            ],
            'settings' => [
                'is_active' => $request->boolean('is_active', true),
                'show_statistics' => $request->boolean('show_statistics', true),
                'enable_parallax' => $request->boolean('enable_parallax', false),
                'text_alignment' => $request->text_alignment,
                'overlay_opacity' => $request->overlay_opacity,
            ]
        ];


        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('hero', 'public');
            $contentData['background_image'] = $path;
        }

        $content = Content::updateOrCreate(
            ['content_type' => Content::TYPE_HERO],
            [
                'title' => $request->title,
                'content_data' => $contentData,
                'slug' => 'hero',
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'is_active' => $request->boolean('is_active', true),
                'order' => 0
            ]
        );

        return redirect()->route('contents.hero')
            ->with('success', 'Hero content saved successfully.');
    }

    /**
     * Store or update province content.
     */
    public function storeProvince(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'provinces' => 'required|array',
            'provinces.*.name' => 'required|string|max:255',
            'provinces.*.description' => 'required|string',
            'provinces.*.image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $content = Content::updateOrCreate(
            ['content_type' => Content::TYPE_PROVINCE],
            [
                'title' => $request->title,
                'content_data' => [
                    'description' => $request->description,
                    'provinces' => $request->provinces,
                    'is_active' => $request->boolean('is_active', true),
                ],
                'slug' => 'provinces',
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'is_active' => $request->boolean('is_active', true),
                'order' => 0
            ]
        );

        return redirect()->route('contents.province')
            ->with('success', 'Province content saved successfully.');
    }

    /**
     * Store or update host content.
     */
    public function storeHost(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'services' => 'required|array',
            'services.*.title' => 'required|string|max:255',
            'services.*.description' => 'required|string',
            'services.*.icon' => 'required|string',
            'is_active' => 'boolean',
        ])->validate();
       
        $content = Content::updateOrCreate(
            ['content_type' => Content::TYPE_HOST],
            [
                'title' => $request->title,
                'content_data' => [
                    'description' => $request->description,
                    'host' => $request->host,
                    'is_active' => $request->boolean('is_active', true),
                ],
                'slug' => 'host',
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'is_active' => $request->boolean('is_active', true),
                'order' => 0
            ]
        );
        return redirect()->route('contents.host')
            ->with('success', 'Host content saved successfully.');
    }

    /**
     * Store or update benefits content.
     */
    public function storeBenefits(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_title' => 'required|string|max:255',
            'benefit_1_title' => 'required|string|max:255',
            'benefit_1_description' => 'required|string',
            'benefit_2_title' => 'required|string|max:255',
            'benefit_2_description' => 'required|string',
            'benefit_3_title' => 'required|string|max:255',
            'benefit_3_description' => 'required|string',
            'benefit_4_title' => 'required|string|max:255',
            'benefit_4_description' => 'required|string',
            'is_active' => 'boolean',
            'show_icons' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $benefitsData = [
            'section_title' => $request->section_title,
            'benefits' => [
                [
                    'title' => $request->benefit_1_title,
                    'description' => $request->benefit_1_description,
                ],
                [
                    'title' => $request->benefit_2_title,
                    'description' => $request->benefit_2_description,
                ],
                [
                    'title' => $request->benefit_3_title,
                    'description' => $request->benefit_3_description,
                ],
                [
                    'title' => $request->benefit_4_title,
                    'description' => $request->benefit_4_description,
                ],
            ],
            'settings' => [
                'is_active' => $request->boolean('is_active', true),
                'show_icons' => $request->boolean('show_icons', true),
            ],
        ];

        $content = Content::updateOrCreate(
            ['content_type' => Content::TYPE_BENEFITS],
            [
                'title' => $request->section_title,
                'content_data' => $benefitsData,
                'slug' => 'benefits',
                'meta_title' => $request->section_title,
                'meta_description' => 'Benefits for hosts on our platform',
                'is_active' => $request->boolean('is_active', true),
                'order' => 0
            ]
        );

        return redirect()->route('contents.benefits')
            ->with('success', 'Benefits content saved successfully.');
    }

    /**
     * Store or update features content.
     */
    public function storeFeatures(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'required|string',
            'features.*.icon' => 'required|string',
            'is_active' => 'boolean',
        ])->validate();

        $content = Content::updateOrCreate(
            ['content_type' => Content::TYPE_FEATURES],
            [
                'title' => $request->title,
                'content_data' => [
                    'description' => $request->description,
                    'features' => $request->features,
                    'is_active' => $request->boolean('is_active', true),
                ],
                'slug' => 'features',
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'is_active' => $request->boolean('is_active', true),
                'order' => 0
            ]
        );

        return redirect()->route('contents.features')
            ->with('success', 'Features content saved successfully.');
    }

    /**
     * Store or update FAQ content.
     */
    public function storeFaq(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'faqs' => 'required|array',
            'faqs.*.question' => 'required|string|max:255',
            'faqs.*.answer' => 'required|string',
            'is_active' => 'boolean',
        ])->validate();
        
        $content = Content::updateOrCreate(
            ['content_type' => Content::TYPE_FAQ],
            [
                'title' => $request->title,
                'content_data' => [
                    'description' => $request->description,
                    'faqs' => $request->faqs,
                    'is_active' => $request->boolean('is_active', true),
                ],
                'slug' => 'faq',
                'meta_title' => $request->title,
                'meta_description' => $request->description,
                'is_active' => $request->boolean('is_active', true),
                'order' => 0
            ]
        );

        return redirect()->route('contents.faq')
            ->with('success', 'FAQ content saved successfully.');
    }
}
