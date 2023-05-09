<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Resource;

class Resources extends Component
{
    public $title;
    public $search;
    public function addResources()
{
    $this->validate([
        'title' => ['string', 'required']
    ]);

    Resource::create([
        'title' => $this->title
    ]);

    return redirect('/admin/resources')->with('message', 'Resources created successfully!');
}
    public function editResources(int $resources_id){
        $resources = Resource::find($resources_id);
        if($resources){
            $this->resources_id = $resources->id;
            $this->title = $resources->title;

        }else{
            return redirect('admin/resources');
        }

    }

    public function updateResources(){
        $this->validate([
            'title' => ['string', 'required'],

        ]);

        $resources = Resource::find($this->id);

        Resource::where('id',$this->resources_id)
                    ->update(['title' => $this->title]);
        return redirect('admin/resources')->with('message', 'Resources updated successfully!');

    }

    public function deleteResources(int $resources_id)
    {
        $this->resources_id = $resources_id;
    }

    public function destroyResources()
    {

        Resource::find($this->resources_id)->delete();
        return redirect('admin/resources')->with('delete_message', 'Resources has been deleted!');

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
