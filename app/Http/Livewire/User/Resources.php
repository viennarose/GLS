<?php

namespace App\Http\Livewire\User;

use App\Models\File;
use Livewire\Component;
use App\Models\Resource;

class Resources extends Component
{

    public $search;
    public $byYear;
    public $byResource = 'all';
    public function showFiles(){

        $query = File::orderBy('date', 'asc')
            ->search($this->search);

            if($this->byResource != 'all'){
                $query->where('resource_id', $this->byResource);
            }
            if($this->byYear){
                $query->whereYear('date', $this->byYear);
            }
        $files = $query->paginate(6);
        return compact('files');
    }
    public function download($file)
    {
        return response()->download('/home/mdccapst/gls.mdc-capstone.com/GLS_System/storage/app/public/pdf/' . $file);
    }

    public function render()
    {
        $resources = Resource::get();
        return view('livewire.user.resources', compact('resources'), $this->showFiles());
    }
}
