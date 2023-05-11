<?php

namespace App\Http\Livewire\Admin\Files;

use Exception;
use App\Models\File;
use Livewire\Component;
use App\Models\Resource;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $description, $date, $hashtag, $link, $resource_id, $upload_file, $title;
    public $byResource = 'all', $year;
    public $search;

    public function addFile(){
        $validatedData = $this->validate([
            'title' => 'required|string|max:255',
            'resource_id' =>'required',
            'description' => 'required|string|max:255',
            'date' => 'string|required',
            'link' => 'string|required',
            'hashtag' => 'required',
            'upload_file' => 'required|mimes:pdf', //10MB max file size


        ]);

        $file_name = $validatedData['upload_file']->getClientOriginalName();

        $validatedData['upload_file']->storeAs('public/pdf', $file_name);

        File::create([
            'title' => $validatedData['title'],
            'resource_id' => $validatedData['resource_id'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'link' => $validatedData['link'],
            'hashtag' => $validatedData['hashtag'],
            'upload_file' => $file_name,

        ]);

        return redirect()->route('admin.files.index')->with('message', 'File created successfully!');
    }

    public function download($file)
    {
        return response()->download(storage_path('app/public/pdf/' . $file));
    }

    public function editFile(int $file_id){
        $file = File::find($file_id);
        if($file){
            $this->file_id = $file->id;
            $this->resource_id = $file->resource_id;
            $this->title = $file->title;
            $this->description = $file->description;
            $this->date = $file->date;
            $this->link = $file->link;
            $this->hashtag = $file->hashtag;

        }else{
            return redirect()->route('admin.files.index');
        }

    }
    // public function download($file){
    //     return response()->download(storage_path('app/public/files' . $file->file_path));

    // }

    public function updateFile(){
        $this->validate([
            'resource_id' => ['required'],
            'title' => ['required'],
            'description' => ['string', 'required'],
            'date' => ['string', 'required'],
            'hashtag' => ['required'],
            'link' => ['string', 'required'],
        ]);

        $file = File::find($this->id);

        File::where('id',$this->file_id)->update([
            'resource_id' => $this->resource_id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'hashtag' => $this->hashtag,
            'link' => $this->link
        ]);
        return redirect()->route('admin.files.index')->with('message', 'File updated successfully!');

    }

    public function deleteFile(int $file_id)
    {
        $this->file_id = $file_id;
    }

    public function destroyFile()
    {

        File::find($this->file_id)->delete();
        return redirect()->route('admin.files.index')->with('delete_message', 'File has been deleted!');

    }

    public function showFiles(){

        $query = File::orderBy('date', 'asc')
            ->search($this->search);

            if($this->byResource != 'all'){
                $query->where('resource_id', $this->byResource);
            }
            if($this->year){
                $query->whereYear('date', $this->year);
            }


        $files = $query->paginate(6);
        return compact('files');
    }
    public function render()
    {
        $resources = Resource::get();
        return view('livewire.admin.files.index', $this->showFiles(), compact('resources'));
    }
}
