<div>
    <input type="search" wire:model="search" class="form-control input mb-3 mt-3 mx-auto" style="width: 400px;"
        placeholder="Search">
    <div class="col-md-2 mx-end" style="margin-top: -10px;">
        <Label>Year</Label>
        <input type="number" wire:model="byYear" class="form-control" id="year" min="1900"
            max="{{ date('Y') }}" step="1" value="{{ date('Y') }}">
        {{-- <input type="number" class="form-control" id="datepicker" wire:model="byYear" value="{{ date('Y') }}"> --}}
    </div>


    <div class="mb-2 mt-1 d-flex justify-content-start">
        <select class="form-select" style="width: 400px;" wire:model="byResource">
            <option selected value="all">Select Resources</option>
            @foreach ($resources as $resource)
                <option value="{{ $resource->id }}">{{ $resource->title }}
                </option>
            @endforeach
        </select>
    </div>
    <hr>
    <div class="container mt-3">
        @forelse ($files as $file)
            <div class="card text-start p-3 mb-2 shadow-lg">

                <div class="d-flex justify-content-between">
                    <p><span style="font-weight: 600;">Date:</span>
                        {{ Carbon\Carbon::parse($file->date)->format('F d, Y') }}</p>
                    <p style="font-weight: 600; font-size: 12px;">{{ $file->resource->title }}</p>
                </div>
                <p class="text-wrap text-center" style="font-size: 18px; font-weight: 500;">{{ $file->title }}</p>
                <hr>
                <p class="text-justify"><span style="font-weight: 600;">Description:</span> {{ $file->description }}</p>
                <div class="mx-auto">
                    <a href="{{ $file->link }}" target="_blank" class="text-center btn btn-primary"
                        style="width: 23    0px;"><span class="fas fa-download"></span> View and Download Here</a>

                </div>
                <p><span style="font-weight: 600;">Hashtag:</span> {{ $file->hashtag }}</p>
            </div>
        @empty
            No files found.
        @endforelse
    </div>
</div>


<p class="text-center" style="font-size: 30px;">On Progress</p>
