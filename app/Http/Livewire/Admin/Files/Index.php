<?php

namespace App\Http\Livewire\Admin\Files;

use Exception;
use App\Models\File;
use Livewire\Component;
use App\Models\Resource;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $description, $date, $hashtag, $link, $resource_id, $upload_file, $title, $selectedFile, $new_upload_file;
    public $byResource = 'all', $year;
    public $search;

    public function addFile(){
        $validatedData = $this->validate([
            'title' => 'required|string',
            'resource_id' =>'required',
            'description' => 'string|nullable',
            'date' => 'date|nullable',
            'link' => 'string|nullable',
            'hashtag' => 'nullable',
            'upload_file' => 'nullable|mimes:pdf', //10MB max file size
        ]);

        $file_name = '';
        if (isset($validatedData['upload_file']) && !empty($validatedData['upload_file'])) {
            $file_name = $validatedData['upload_file']->getClientOriginalName();
            $validatedData['upload_file']->storeAs('/home/mdccapst/gls.mdc-capstone.com/GLS_System/storage/app/public/pdf/', $file_name);
        }

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
        return response()->download('/home/mdccapst/gls.mdc-capstone.com/GLS_System/storage/app/public/pdf/' . $file);
    }

    public function editFile(int $file_id){
        $file = File::find($file_id);
        if($file){
            $this->file_id = $file->id;
            $this->title = $file->title;
            $this->resource_id = $file->resource_id;
            $this->description = $file->description;
            $this->date = $file->date;
            $this->link = $file->link;
            $this->hashtag = $file->hashtag;
            // $this->upload_file = $this->upload_file;

        }else{
            return redirect()->route('admin.files.index');
        }

    }



    public function updateFile(){
        $validatedData = $this->validate([
            'title' => 'required|string',
            'resource_id' =>'required',
            'description' => 'string|nullable',
            'date' => 'date|nullable',
            'link' => 'string|nullable',
            'hashtag' => 'nullable',
            'upload_file' => 'nullable|mimes:pdf', //10MB max file size


        ]);

        $file = File::find($this->id);

        if ($this->new_upload_file) {
            Storage::delete($file->upload_file);

            $path = $this->new_upload_file->store('public/files');
            $file->upload_file = $path;
        }

        File::where('id',$this->file_id)->update([
            'title' => $validatedData['title'],
            'resource_id' => $validatedData['resource_id'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'link' => $validatedData['link'],
            'hashtag' => $validatedData['hashtag'],

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
