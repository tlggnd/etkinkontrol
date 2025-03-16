<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; // Str::slug() için


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_color' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $imagePath = $request->file('image')->store('sliders', 'public');

        $slider = Slider::create([
            'image' => $imagePath,
            'title' => $request->title,
            'title_active' => $request->has('title_active'),
            'subtitle' => $request->subtitle,
            'subtitle_active' => $request->has('subtitle_active'),
            'button_text' => $request->button_text,
            'button_color' => $request->button_color,
            'button_link' => $request->button_link,
            'button_active' => $request->has('button_active'),
            'order' => Slider::max('order') + 1, // Otomatik sıralama
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla oluşturuldu.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_color' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
        ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        if ($request->hasFile('image')) {
             // Eski resmi sil
            if (Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $imagePath = $request->file('image')->store('sliders', 'public');
            $slider->image = $imagePath; // Yeni resmi kaydet
        }

        $slider->title = $request->title;
        $slider->title_active = $request->has('title_active');
        $slider->subtitle = $request->subtitle;
        $slider->subtitle_active = $request->has('subtitle_active');
        $slider->button_text = $request->button_text;
        $slider->button_color = $request->button_color;
        $slider->button_link = $request->button_link;
        $slider->button_active = $request->has('button_active');
        //'order' alanını güncelleme.  Sıralama değişmeyecekse elleme.
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Slider $slider)
    {
        // Resmi sil
        if (Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla silindi.');
    }

    // Sıralamayı güncelle
    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|array',
            'order.*' => 'integer|exists:sliders,id', // sliders tablosunda var mı kontrol et
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }


        try {
            foreach ($request->order as $index => $sliderId) {
                $slider = Slider::findOrFail($sliderId);
                $slider->order = $index + 1;
                $slider->save();
            }
            return response()->json(['success' => true, 'message' => 'Sıralama güncellendi.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Sıralama güncellenirken bir hata oluştu: ' . $e->getMessage()], 500);
        }
    }
}