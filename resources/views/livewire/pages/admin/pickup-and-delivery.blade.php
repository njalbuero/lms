<div>
    @section('title', 'Pickup and Delivery')

    @if (session()->has('message'))
    <div class="alert alert-success" role="alert" x-data="{show:true}" x-init="setTimeout(() => show = false, 1500)"
        x-show="show" x-transition>
        <strong>Success!</strong> {{ session('message') }}
    </div>
    @endif

    <div class="row">
        <div class="col-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Pickup</h3>
                        </div>
                        <div class="col-4 text-right">
                            <div>
                                <button wire:click="resetFilter" type="button" class="btn btn-sm btn-outline-primary">Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 px-4">
                   
                    <div class="col">
                        <div>
                            <input wire:model.debounce.300ms="search" type="text" class="form-control"
                                placeholder="Search..">
                        </div>
                    </div>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                               
                                <th scope="col" class="sort" data-sort="name">Order ID</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                                <th scope="col">{{--Actions--}}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($orders_pickup as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-{{status($order->status->id)}}"></i>
                                        <span class="status">{{$order->status->name}}</span>
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <button wire:click="mark({{$order->id}})" class="dropdown-item">Mark as Pickup/Picked Up</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p class="text-center">No Records Found</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer py-4">
                        <p>
                            {{$orders_pickup->links('pagination::bootstrap-4')}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Delivery</h3>
                        </div>
                        <div class="col-4 text-right">
                            <div>
                                <button wire:click="resetFilter" type="button" class="btn btn-sm btn-outline-primary">Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 px-4">
                   
                    <div class="col">
                        <div>
                            <input wire:model.debounce.300ms="search" type="text" class="form-control"
                                placeholder="Search..">
                        </div>
                    </div>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                               
                                <th scope="col" class="sort" data-sort="name">Order ID</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                                <th scope="col">{{--Actions--}}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($orders_delivery as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-{{status($order->status->id)}}"></i>
                                        <span class="status">{{$order->status->name}}</span>
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <button wire:click="mark({{$order->id}})" class="dropdown-item">Mark as Deliver/Delivered</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p class="text-center">No Records Found</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer py-4">
                        <p>
                            {{$orders_delivery->links('pagination::bootstrap-4')}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>