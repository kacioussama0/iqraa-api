<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\LatestNews;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

        $statistics = [
            [
                'name' => 'student',
                'goal' => 1320,
                'icon' => 'fa-graduation-cap'
            ],


            [
                'name' => 'classroom',
                'goal' => 14,
                'icon' => 'fa-screen-users'
            ],
            [
                'name' => 'teacher',
                'goal' => 35,
                'icon' => 'fa-chalkboard-teacher'
            ],
            [
                'name' => 'administrative_staff',
                'goal' => 5,
                'icon' => 'fa-users'
            ],
            [
                'name' => 'security_guard',
                'goal' => 1,
                'icon' => 'fa-shield'
            ]
        ];

        $modules = [
            [
                'name' => 'arabic',
                'icon' => 'fa-language',
                'color' => 'warning-emphasis'
            ],
            [
                'name' => 'islamic_education',
                'icon' => 'fa-mosque',
                'color' => 'primary'
            ],
            [
                'name' => 'quran',
                'icon' => 'fa-book',
                'color' => 'primary'
            ],
            [
                'name' => 'reading',
                'icon' => 'fa-book-open-reader',
                'color' => 'warning-emphasis'
            ],
            [
                'name' => 'converstion_expression',
                'icon' => 'fa-comments',
                'color' => 'warning-emphasis'
            ]

        ];

        $countries =  ['iq','sy','lb','jo','ps','ye','sd','eg','ly','tn','dz','ma','mr','pk','af','tr','al','xk','ng','sn','gn','so','er','bd','ba','in','cn','br','fr','ch','sa','es','it','km','mk'];

        $news = LatestNews::latest()->limit(5)->get();

        return view('index',compact('statistics', 'modules', 'countries','news'));
    }

    public function about()
    {
        return view('who');
    }

    public function gallery()
    {
        $categories = \App\Models\Category::where('type','images')->has('images')->orderBy('created_at', 'desc')->get();
        return view('gallery',compact('categories'));
    }

    public function faqs()
    {
        $faqs = Faq::orderBy('created_at', 'asc')->get();
        return view('faqs', compact('faqs'));

    }

    public function contact()
    {
        $contacts = [
            [
                'icon' => 'fa-brands fa-whatsapp',
                'text' => '+(41) 79 781 08 39',
                'link' => 'tel:+41797810839',
            ],
            [
                'icon' => 'fa-duotone fa-envelope',
                'text' => 'Madrassa@fcigeneve.ch',
                'link' => 'mailto:Madrassa@fcigeneve.ch',
            ],
            [
                'icon' => 'fa-duotone fa-location-dot',
                'text' => 'Chemin Colladon 34, 1209 Genève',
                'link' => 'https://rb.gy/2ua5cv',
            ],
        ];


        return view('contact',compact('contacts'));
    }

    public function sendContact()
    {

        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if( \App\Models\Message::create($validatedData) ) {
            return redirect()->back()->with('success', __('contact.success'));
        } else {
            return redirect()->back()->with('error', __('contact.error'));
        }

    }

    public function registrations()
    {
        return view('registrations');
    }
}
