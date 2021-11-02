<div>
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body mb-7">
                <div class="row justify-content-center">

                    <div class="col-xl-8 d-flex justify-content-center">
                        @if (session()->has('message'))
                        <div class="alert alert-success" role="alert" x-data="{show:true}"
                            x-init="setTimeout(() => show = false, 1500)" x-show="show" x-transition>
                            <strong>Success!</strong> {{ session('message') }}
                        </div>
                        @endif

                        @if (isset($order))
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6 pt-3">
                                        <h5 class="card-title">Order #{{$order->id}}</h5>
                                    </div>

                                    <div class="col-6 text-right">
                                        <span class="badge badge-{{status($order->status->id)}}">{{$order->status->name}}</span>
                                    </div>
                                </div>

                                <p class="card-text"><strong>Name:</strong> {{$order->firstname . " " . $order->lastname}}</p>
                                <p class="card-text"><strong>Address:</strong> {{$order->address}}</p>
                                <p class="card-text"><strong>Contact:</strong> {{$order->mobile}}</p>
                                <hr>
                                <p class="card-text"><strong>Service Type:</strong> {{$order->type->name}}</p>
                                <p class="card-text"><strong>Instructions:</strong> {{$order->instructions}}</p>
                                <p class="card-text"><strong>Weight:</strong> {{$order->weight}} kg</p>
                                <p class="card-text"><strong>Price: </strong>{{$order->price}} php</p>
                            </div>
                        </div>
                        @else
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
                                                <input wire:model="lastname" type="text" class="form-control"
                                                    placeholder="Last name">
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
                                                <input wire:model="mobile" type="number" class="form-control"
                                                    placeholder="09123456789">
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
                                                <input wire:model="address" type="text" class="form-control"
                                                    placeholder="123 Main St.">
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
                                                <label class="form-control-label">Estimated Weight</label>
                                                <div class="input-group">
                                                    <input wire:model="weight" type="number"
                                                        class="form-control text-right">
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
                                                    <input wire:model="price" disabled type="number"
                                                        class="form-control text-right">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">php</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <button class="btn btn-primary" wire:click="submit">Submit</button>
                                </div>
                            </div>

                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
</div>