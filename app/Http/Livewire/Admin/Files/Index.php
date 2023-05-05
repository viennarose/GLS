<?php

namespace App\Http\Livewire\Admin\Files;

use Exception;
use App\Models\File;
use Livewire\Component;

class Index extends Component
{

    public $description, $date, $hashtag, $link;
    public $search;
    public function AddFile(){

        $this->validate([
            'description' => ['string', 'required'],
            'date' => ['string', 'required'],
            'hashtag' => ['required'],
            'link' => ['string', 'required'],

        ]);

        File::create([

            'description' => $this->description,
            'date' => $this->date,
            'hashtag' => $this->hashtag,
            'link' => $this->link
        ]);

            return redirect()->route('admin.files.index')->with('message', 'Created Successfully');
    }

    public function editFile(int $file_id){
        $file = File::find($file_id);
        if($file){
            $this->file_id = $file->id;
            $this->description = $file->description;
            $this->date = $file->date;
            $this->link = $file->link;
            $this->hashtag = $file->hashtag;

        }else{
            return redirect()->route('admin.files.index');
        }

    }

    public function updateFile(){
        $this->validate([
            'description' => ['string', 'required'],
            'date' => ['string', 'required'],
            'hashtag' => ['required'],
            'link' => ['string', 'required'],

        ]);

        $file = File::find($this->id);

        file::where('id',$this->file_id)->update([
            'description' => $this->description,
            'date' => $this->date,
            'hashtag' => $this->hashtag,
            'link' => $this->link
        ]);
        return redirect()->route('admin.files.index')->with('message', 'Updated Successfully');

    }

    public function deleteFile(int $file_id)
    {
        $this->file_id = $file_id;
    }

    public function destroyFile()
    {

        File::find($this->file_id)->delete();
        return redirect()->route('admin.files.index')->with('message', 'Deleted Successfully');

    }

    public function showFiles(){

        $query = File::orderBy('date', 'asc')
            ->search($this->search);

        // if($this->byRate){
        //     $query->where('rate', '>=', $this->byRate);
        // }

        // if($this->byLocation != 'all'){
        //     $query->where('location', $this->byLocation);
        // }

        $files = $query->paginate(6);
        return compact('files');
    }
    public function render()
    {

        return view('livewire.admin.files.index', $this->showFiles());
    }
}
