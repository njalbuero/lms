<div>
    @section('title', 'Create Order')
    @section('header-buttons')
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-neutral">Back</a>
    @endsection
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Order Details </h3>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <h6 class="heading-small text-muted mb-4">Customer information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">First Name</label>
                                <input required wire:model="firstname" type="text" class="form-control"
                                    placeholder="First name">
                                @error('firstname')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Last Name</label>
                                <input wire:model="lastname" type="text" class="form-control" placeholder="Last name">
                                @error('lastname')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Mobile No.</label>
                                <input wire:model="mobile" type="number" class="form-control" placeholder="09123456789">
                                @error('mobile')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Address</label>
                                <input wire:model="address" type="text" class="form-control" placeholder="123 Main St.">
                                @error('address')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <h6 class="heading-small text-muted mb-4">Service</h6>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Type</label>
                                <select wire:model="type" class="form-control">
                                    <option value="">Select Type</option>
                                    @foreach ($types as $type)
                                    <option value={{$type->id}}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Instructions</label>
                                <textarea wire:model="instructions" rows="4" class="form-control"
                                    placeholder="Instructions"></textarea>
                                @error('instructions')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Weight</label>
                                <div class="input-group">
                                    <input wire:model="weight" type="number" class="form-control text-right">
                                    <div class="input-group-append">
                                        <span class="input-group-text">kg</span>
                                    </div>

                                </div>
                                @error('weight')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label text-right">Price</label>
                                <div class="input-group">
                                    <input wire:model="price" disabled type="number" class="form-control text-right">
                                    <div class="input-group-append">
                                        <span class="input-group-text">php</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox ml-3">
                                <input wire:model="isPaid" type="checkbox" class="custom-control-input" id="isPaid">
                                <label class="custom-control-label" for="isPaid">Paid</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary" wire:click="submit">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>