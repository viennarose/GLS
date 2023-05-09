<div>
    {{-- <div class="col-md-6">
        <h1 class="text-left" style="font-size: 22px; font-weight: 600;">Get in touch with us!</h1>
        <p class="text-justify" style="font-size: 18px;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente facilis repellendus architecto
            esse, amet at officia unde, omnis quod harum laudantium in veniam inventore soluta. Recusandae
            expedita deleniti vel voluptatem?</p>

        <div class="mx-auto mt-5" style="width: 18rem;">
            <div class="">
                <div class="d-flex justify-content-center">
                    {{ $this->name }}
                </div>
                <p class="text-center" style="font-size: 16px; font-weight: 700;">NAME</p>

                <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                    {{ $this->name }}
                </p>

            </div>
        </div>

        <div class="mx-auto" style="width: 18rem;">
            <div class="">
                <div class="d-flex justify-content-center">

                </div>
                <p class="text-center" style="font-size: 16px; font-weight: 700;">EMAIL</p>

                <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                    {{ $this->email }}
                </p>

            </div>
        </div>

        <div class="mx-auto" style="width: 18rem;">
            <div class="">
                <div class="d-flex justify-content-center">

                </div>
                <p class="text-center" style="font-size: 16px; font-weight: 700;">ADDRESS</p>

                <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                    {{ $this->address }}
                </p>

            </div>
        </div>


        <div class=" mx-auto" style="width: 18rem;">
            <div class="">
                <div class="d-flex justify-content-center">

                </div>
                <p class="text-center" style="font-size: 16px; font-weight: 700;">CONTACT</p>
                <p class="text-center" style="font-size: 15px; font-weight: 450; margin-top: -15px;">
                    {{ $this->number }}</p>


            </div>
        </div>


    </div> --}}

    <div>
        <form wire:submit.prevent="update">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" wire:model.defer="data.name">
                @error('data.name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="number">Number</label>
                <input type="text" id="number" wire:model.defer="data.number">
                @error('data.number') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" wire:model.defer="data.address">
                @error('data.address') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" id="email" wire:model.defer="data.email">
                @error('data.email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <!-- Add more fields here as needed -->

            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>

</div>
