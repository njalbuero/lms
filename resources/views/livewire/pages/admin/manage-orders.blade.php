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
                    <h3 class="mb-0">Orders</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Order ID</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="status">Type</th>
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
                                <td>{{$order->firstname . " " . $order->lastname}}</td>
                                <td>{{$order->type->name}}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>