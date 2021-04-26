<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Merchant extends Component
{
    use WithPagination;

    public $pagination = 10;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->merchants->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getMerchantsProperty()
    {
        return $this->merchantsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        \App\Models\admin\Merchant::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح حذف التجار الذي تم تحديدهم');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        \App\Models\admin\Merchant::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('message', 'تم بنجاح حذف التاجر من قاعدة البيانات');
    }

    public function cancelSelectAll()
    {
        $this->selectAll = false;
        $this->selectPage = false;
        $this->checked = [];
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->merchantsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getMerchantsQueryProperty()
    {
        return \App\Models\admin\Merchant::where('role_id', '2')
            ->where(function ($query) {
                $query->where('name', 'like', "%$this->search%")
                    ->OrWhere('email', 'like', "%$this->search%");
            })->latest('id');
    }

    public function isChecked($id)
    {
        return in_array($id, $this->checked);
    }


    public function render()
    {
        return view('livewire.merchant', ['merchants' => $this->merchants]);
    }

}
