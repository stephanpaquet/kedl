<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq', ['faqs' => Faq::all()]);
    }

    public function blog()
    {
        $blogs = DB::connection('wordpress')
            ->select('
                SELECT * FROM wp_posts
                LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
                LEFT JOIN wp_term_taxonomy ON (wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id)
                WHERE post_type = "post"
                AND wp_term_taxonomy.term_id = ' . config('wordpress.category_ids.blog') . '
            ');

        return view('pages.blog', ['blogs' => $blogs]);
    }

    public function price()
    {
        return view('pages.prices', ['prices' => Faq::all()]);
    }

    public function policy()
    {
        return view('pages.policy');
    }
}
