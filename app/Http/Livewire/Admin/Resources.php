<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Resource;

class Resources extends Component
{
    public $title;
    public $search;
    public function AddResources(){

        $this->validate([
            'title' => ['string', 'required']]);

        Resource::create([
            'title' => $this->title
        ]);

            return redirect()->route('admin.resources')->with('message', 'Created Successfully');
    }

    public function editResources(int $resources_id){
        $resources = Resource::find($resources_id);
        if($resources){
            $this->resources_id = $resources->id;
            $this->title = $resources->title;

        }else{
            return redirect()->route('admin.resources');
        }

    }

    public function updateResources(){
        $this->validate([
            'title' => ['string', 'required'],

        ]);

        $resources = Resource::find($this->id);

        Resource::where('id',$this->resources_id)
                    ->update(['title' => $this->title]);
        return redirect()->route('admin.resources')->with('message', 'Updated Successfully');

    }

    public function deleteResources(int $resources_id)
    {
        $this->resources_id = $resources_id;
    }

    public function destroyResources()
    {

        Resource::find($this->resources_id)->delete();
        return redirect()->route('admin.resources')->with('message', 'Deleted Successfully');

    }

    public function showResources(){

        $query = Resource::orderBy('title', 'asc')
            ->search($this->search);


        $resources = $query->paginate(6);
        return compact('resources');
    }
    public function render()
    {
        return view('livewire.admin.resources', $this->showResources());
    }
}
