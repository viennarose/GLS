<div>
    <div class="mt-5 col-md-12 d-flex justify-content-between">
        <input type="search" wire:model="search" class="form-control input me-1" placeholder="Search">
        <select class="form-select" style="width: 500px;" wire:model="byResource">
            <option selected value="all">Select Resources</option>
            @foreach ($resources as $resource)
                <option value="{{ $resource->id }}">{{ $resource->title }}
                </option>
            @endforeach
        </select>
    </div>
    {{-- <div class="col-md-2 mx-end" style="margin-top: -10px;">
        <Label>Year</Label>
        <input type="number" wire:model="byYear" class="form-control" id="year" min="1900"
            max="{{ date('Y') }}" step="1" value="{{ date('Y') }}">
        <input type="number" class="form-control" id="datepicker" wire:model="byYear" value="{{ date('Y') }}">
    </div> --}}

    <hr>
    <div class="container mt-3">
        @forelse ($files as $file)
            <div class="card text-start p-3 mb-1 shadow-lg">

                <div class="d-flex justify-content-between">
                    <p class="text-wrap text-center" style="font-size: 18px; font-weight: 500;">{{ $file->title }}</p>
                    <p style="font-weight: 400; font-size: 12px;">{{ $file->resource->title }}</p>
                </div>
                <p class="text-justify">{{ $file->description }}</p>
                <div class="ms-auto">
                    <a href="#" wire:click.prevent="download('{{ $file->upload_file }}')" class="text-center btn btn-primary"><span class="fas fa-download"></span> Download to View</a>

                </div>

            </div>
        @empty
            No files found.
        @endforelse
    </div>
</div>
