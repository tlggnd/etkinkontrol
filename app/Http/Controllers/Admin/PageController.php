<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create(Menu $menu)
    {
        return view('admin.pages.create', compact('menu'));
    }

    public function store(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->content;
        $menu->pages()->save($page);  // Sayfayı menü ile ilişkilendiriyoruz

        return redirect()->route('admin.menus.show', $menu->id)->with('success', 'Sayfa oluşturuldu.');
    }
}
