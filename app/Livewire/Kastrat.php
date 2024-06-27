<?php

namespace App\Livewire;

use App\Models\Kastrat as ModelsKastrat;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Kastrat extends Component
{

    #[Validate('required', message: 'Judul harus diisi')]
    #[Validate('max:255', message: 'Judul tidak boleh lebih dari 255 karakter')]
    public $judul;

    #[Validate('max:255', message: 'Keterangan tidak boleh lebih dari 255 karakter')]
    public $keterangan;

    #[Validate('required', message: 'File harus diisi')]
    public $file;

    public function store()
    {
        $validateData = $this->validate();
        
        $file = $this->file[0];
        
        $filename = auth()->user()->name . "-file-" . uniqid() . '.' . $file["extension"];

        $filePath = Storage::putFileAs('public/file', new File($file['path']), $filename);
        
        ModelsKastrat::create([
            "judul" => $validateData['judul'],
            "keterangan" => $validateData['keterangan'],
            "file" => $filePath
        ]);

        
        flash("Kastrat berhasil menambahkan data", 'success');
        
        $this->reset('judul', 'keterangan', 'file');
    }

    public function update($id)
    {
        $validateData = $this->validate();
        $kastrat = ModelsKastrat::findOrFail($id);

        if (isset($this->file[0])) {
            $file = $this->file[0];
            $filename = auth()->user()->name . "-file-" . uniqid() . '.' . $file["extension"];
            $filePath = Storage::putFileAs('public/file', new File($file['path']), $filename);

            // Delete the old file if a new file is uploaded
            if ($kastrat->file) {
                Storage::delete($kastrat->file);
            }

            $kastrat->file = $filePath;
        }

        $kastrat->update([
            "judul" => $validateData['judul'],
            "keterangan" => $validateData['keterangan'],
        ]);

        flash("Data berhasil diperbarui", 'success');

        $this->reset('judul', 'keterangan', 'file');
    }



    public function render()
    {
        $kastrats = ModelsKastrat::all();

        return view('livewire.kastrat', compact('kastrats'));
    }
}
