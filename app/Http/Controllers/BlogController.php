<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Setting;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('active', true)->orderBy('published_at', 'desc')->paginate(9);
        $meta_title = Setting::where('key', 'blog_meta_title')->value('value') ?? 'المدونة';
        $meta_description = Setting::where('key', 'blog_meta_description')->value('value') ?? 'اقرأ أحدث المقالات والنصائح في مجال المقاولات والبناء.';
        $meta_keywords = collect($posts->pluck('title')->take(5))->implode(', ');

        return view('blog.index', compact('posts', 'meta_title', 'meta_description', 'meta_keywords'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('active', true)->where('slug', $slug)->first();
        if (! $post) {
            return redirect()->route('blog.index')->with('error', 'عذراً، المقال المطلوب غير موجود.');
        }
        $meta_title = $post->meta_title ?: $post->title;
        $meta_description = $post->meta_description ?: Str::limit(strip_tags($post->content ?? ''), 160);
        $meta_keywords = $post->title;

        return view('blog.show', compact('post', 'meta_title', 'meta_description', 'meta_keywords'));
    }
}
