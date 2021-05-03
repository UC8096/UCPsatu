<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Mahasiswas;
use Livewire\WithPagination;

class Mahasiswa extends Component
{
    public $id_mhs, $nama, $alamat, $nim;

    public $selectedItem, $action;

    public $isOpen = 0;
    public $isOpenDelete = 0;

    use WithPagination;

    public function render()
    {
        return view('livewire.mahasiswa', ['data_mahasiswa' => Mahasiswas::paginate(5),]);
    }

    public function add()
    {
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required'
        ]);

        Mahasiswas::updateOrCreate(['id' => $this->id_mhs], [
            'nama' => $this->nama,
            'nim' => $this->nim,
            'alamat' => $this->alamat
        ]);

        session()->flash(
            'message',
            $this->id_mhs ? 'Mahasiswa Updated Successfully.' :
                'Mahasiswa Created Successfully.'
        );

        $this->closeModal();
        
    }

    public function edit($id)
    {
        $mhs = Mahasiswas::findOrFail($id);
        $this->id_mhs = $id;
        $this->nama = $mhs->nama;
        $this->nim = $mhs->nim;
        $this->alamat = $mhs->alamat;

        $this->openModal();
    }

    public function destroy()
    {
        Mahasiswas::find($this->selectedItem)->delete();

        session()->flash(
            'message',
            'Mahasiswa Delete Successfully.'
        );

        $this->closeDeleteModal();

        return redirect()->back();
    }

    public function selectItem($id_mhs, $action)
    {
        $this->selectedItem = $id_mhs;

        if ($action == 'delete') {
            $this->openDeleteModal();
        }
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function openDeleteModal()
    {
        $this->isOpenDelete = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
        $this->resetValidation();
    }

    public function closeDeleteModal()
    {
        $this->isOpenDelete = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->id_mhs = '';
        $this->nama = '';
        $this->nim = '';
        $this->alamat = '';
    }
}
