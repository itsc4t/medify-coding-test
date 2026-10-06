<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->get();

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:20|unique:categories,kode',
            'nama' => 'required|string|max:255',
        ]);

        Category::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect('/categories');
    }   

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:20|unique:categories,kode,' . $id,
            'nama' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect('/categories');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/categories');
    }

    public function singleView($id)
    {
        $category = Category::with('masterItems')
            ->findOrFail($id);

        return view('categories.single', compact('category'));
    }

    public function exportPdf($id)
    {
        $category = Category::with('masterItems')
            ->findOrFail($id);

        $pdf = Pdf::loadView('categories.pdf', [
            'category' => $category
        ]);

        return $pdf->download(
            'kategori-' . $category->kode . '.pdf'
        );
    }
}