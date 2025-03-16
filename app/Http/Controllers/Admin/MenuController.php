<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule; // Import Rule


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::topLevel()->with('allChildren')->orderBy('order')->get(); // Get top level with their childeren
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = Menu::topLevel()->get(); // Get top-level menus for the parent dropdown.
        return view('admin.menus.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'is_active' => 'boolean',
            'url' => 'nullable|string|max:255', // Validate URL
        ]);
        $data['is_active'] = $request->boolean('is_active', false);

        $menu = Menu::create($data);
         // Update the order to be the last
         $menu->order = Menu::where('parent_id', $menu->parent_id)->max('order') + 1;
         $menu->save();

        return redirect()->route('admin.menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::topLevel()->get(); // For the parent dropdown.
        return view('admin.menus.edit', compact('menu', 'menus'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => [
                'nullable',
                'exists:menus,id',
                Rule::notIn([$menu->id]), // Prevent selecting itself as parent

            ],
            'is_active' => 'boolean',
             'url' => 'nullable|string|max:255', // Validate URL
        ]);

        $data['is_active'] = $request->boolean('is_active', false);

        // Prevent circular dependencies.  A menu cannot be its own parent or descendant.
        if ($this->isCircularDependency($menu, $data['parent_id'])) {
            return back()->withErrors(['parent_id' => 'Circular dependency detected.  Cannot set the parent to a child menu.']);
        }


        $menu->update($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu updated successfully.');
    }



    public function destroy(Menu $menu)
    {

        // Recursively delete children (if you want cascading deletes)
        $this->deleteChildren($menu);
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu deleted successfully.');
    }


    protected function deleteChildren(Menu $menu) {
        foreach ($menu->children as $child) {
            $this->deleteChildren($child); // Recursive call
            $child->delete();
        }
    }

    public function updateOrder(Request $request)
    {
      //  DB::beginTransaction(); // Use a transaction for data integrity.

        try {
            $this->updateMenuOrderRecursive($request->menu_order);
          //  DB::commit();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
          //  DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    protected function updateMenuOrderRecursive($menuOrder, $parentId = null)
    {
        foreach ($menuOrder as $index => $menuItem) {
            $menu = Menu::findOrFail($menuItem['id']);
            $menu->order = $index;
            $menu->parent_id = $parentId;
            $menu->save();

            if (isset($menuItem['children']) && is_array($menuItem['children'])) {
                $this->updateMenuOrderRecursive($menuItem['children'], $menu->id);
            }
        }
    }


    protected function isCircularDependency(Menu $menu, $newParentId)
    {
        if (!$newParentId) {
            return false; // No parent, no dependency
        }

        if ($newParentId == $menu->id) {
            return true; // Cannot be its own parent
        }

        $currentParentId = $newParentId;
        while ($currentParentId) {
            $parent = Menu::find($currentParentId);
            if (!$parent) {
                break; // Parent not found, stop checking
            }
            if ($parent->id == $menu->id) {
                return true; // Found the original menu in the parent chain
            }
            $currentParentId = $parent->parent_id;
        }

        return false;
    }
}