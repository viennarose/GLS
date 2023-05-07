<div>
    <input type="search" wire:model="search" class="form-control input mb-3 mt-3" placeholder="Search">
    <div class="col-md-2">
        <Label>Year</Label>
        <input type="number" wire:model="byYear" id="year" min="1900" max="{{ date('Y') }}"
            step="1" value="{{ date('Y') }}">
        {{-- <input type="number" class="form-control" id="datepicker" wire:model="byYear" value="{{ date('Y') }}"> --}}
    </div>


    <div class="mb-2">
        <select class="form-select" wire:model="byResource">
            <option selected value="all">Select Resources</option>
            @foreach ($resources as $resource)
                <option value="{{ $resource->id }}">{{ $resource->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="container mt-3">
        @forelse ($files as $file)
            <div class="card text-start p-3 mb-2">

                        {{ $file->title }}
                        {{ $file->date }}
                        <a href="{{ $file->link }}" target="_blank">View and Download Here</a>
                        {{ $file->hashtag }} <br>
                        {{ $file->resource->title }}
            </div>
            @empty
                    No files found.


        @endforelse
    </div>
</div>
