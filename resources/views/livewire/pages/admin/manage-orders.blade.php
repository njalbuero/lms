<div>
    @section('title', 'Manage Orders')
    @section('header-buttons')
    <a href="{{route('admin.manage-orders.create')}}" class="btn btn-sm btn-neutral">New</a>
    @endsection

    @if (session()->has('message'))
    <div class="alert alert-success" role="alert" x-data="{show:true}" x-init="setTimeout(() => show = false, 1500)"
        x-show="show" x-transition>
        <strong>Success!</strong> {{ session('message') }}
    </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Orders</h3>
                        </div>
                        <div class="col-4 text-right">
                            <div>
                                <button wire:click="resetFilter" type="button" class="btn btn-sm btn-outline-primary">Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 px-4">
                    <div class="col form-inline">
                        <div class="mr-2">
                            <select wire:model="typeFilter" class="form-control">
                                <option value="">Show All</option>
                                <option value=0>Walk-in Only</option>
                                <option value=1>Online Only</option>
                            </select>
                        </div>
                        <div class="mr-2">
                            <select wire:model="statusFilter" class="form-control">
                                <option value="">Filter by Status</option>
                                @foreach ($statuses as $status)
                                <option value={{$status->id}}>{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                                <th scope="col" class="sort" data-sort="budget">Date</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col" class="sort" data-sort="status">Completion</th>
                                <th scope="col">{{--Badges--}}</th>
                                <th scope="col">{{--Actions--}}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->firstname . " " . $order->lastname}}</td>
                               
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-{{status($order->status->id)}}"></i>
                                        <span class="status">{{$order->status->name}}</span>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-{{status($order->status->id)}}"
                                                    role="progressbar"
                                                    style="width: {{progress($order->status->id)}}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>
                                        {!!$order->isOnline ? '<span class="badge badge-default">Online</span>' : '<span
                                            class="badge badge-primary">Walk-in</span>'!!}
                                    </span>
                                    <span>{!!$order->isPaid ? '<span class="badge badge-success">Paid</span>' : '<span
                                            class="badge badge-danger">Unpaid</span>'!!}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="{{route('admin.manage-orders.edit', ['order' => $order->id])}}">Manage</a>
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
                            {{$orders->links('pagination::bootstrap-4')}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>