<x-app-layout navbar="no">
    @section('title', 'Filkom Pulse - Dashboard')
    <section id="layoutContainer" class="tw-h-dvh tw-flex tw-flex-col">
        <section class="d-flex align-items-center justify-content-start tw-px-5 max-md:tw-pt-0 tw-border-b-2 tw-border-[#0c6574]">
            <button class="btn txt-a poppins-bold d-block d-md-none tw-py-2 tw-px-2 tw-text-2xl" data-bs-toggle="offcanvas" data-bs-target="#sidebarSection" aria-controls="Sidebar Button">
                <i class="bi bi-list"></i>
            </button>
            <a href="{{ Route('dashboard') }}" class="tw-flex tw-flex-auto tw-py-3 tw-align-middle">
                <img src="{{URL::asset('images/filkompulse.png')}}" class="tw-flex tw-h-full tw-w-[18rem] max-md:tw-hidden" />
            </a>
        </section>
        <div class="tw-flex tw-flex-auto tw-flex-grow tw-overflow-hidden">
            <section id="sidebarSection" class="col-3 offcanvas-md offcanvas-start tw-max-w-[70%] tw-bg-gray-900 tw-py-5 tw-border-r-2 tw-border-[#0c6574] tw-h-full" tabindex="-1" aria-labelledby="Sidebar">
                <div class="d-flex align-items-start offcanvas-body tw-px-0">
                    <div class="nav flex-column row-gap-3 flex-grow-1 nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button 
                            class="nav-link tw-py-3 tw-ps-5 text-start txt-a active" 
                            id="v-pills-verify" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-verifying" 
                            type="button" 
                            role="tab" 
                            aria-controls="v-pills-verifying" 
                            aria-selected="true">
                            <i class="bi bi-person-fill"></i> Verify Users
                        </button>
                        <button 
                            class="nav-link tw-py-3 tw-ps-5 text-start txt-a" 
                            id="v-pills-events-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-events" 
                            type="button" 
                            role="tab" 
                            aria-controls="v-pills-events" 
                            aria-selected="false">
                            <i class="bi bi-gear-fill"></i> Manage Events
                        </button>
                        <!-- <button 
                            class="nav-link tw-py-3 tw-ps-5 text-start txt-a" 
                            id="v-pills-connection-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-connection" 
                            type="button" 
                            role="tab" 
                            aria-controls="v-pills-connection" 
                            aria-selected="false">
                            <i class="bi bi-intersect"></i> Koneksi
                        </button>
                        <button
                            class="nav-link tw-py-3 tw-ps-5 text-start txt-a"
                            id="v-pills-accessibility-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#v-pills-accessibility"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-accessibility"
                            aria-selected="false"
                        >
                            <i class="bi bi-person-arms-up"></i> Aksesibilitas
                        </button>
                        <button 
                            class="nav-link tw-py-3 tw-ps-5 text-start txt-a" 
                            id="v-pills-security-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-security" 
                            type="button" 
                            role="tab" 
                            aria-controls="v-pills-security" 
                            aria-selected="false">
                            <i class="bi bi-shield-lock-fill"></i> Sekuritas
                        </button> -->
                        <a href="{{ route('dashboard') }}" class="nav-link tw-py-3 tw-ps-5">
                            <button class="btn btn-primary text-white text-start txt-a">Back To Dashboard</button>
                        </a>
                    </div>
                </div>
            </section>
            <section class="col tw-overflow-hidden">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active tw-py-5 tw-px-5" id="v-pills-verifying" role="tabpanel" aria-labelledby="v-pills-verify" tabindex="0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="tw-flex">
                                            <h4 class="card-title tw-my-auto">Users List</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="add-row" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Verified Type</th>
                                                        <th colspan="2" style="width: 10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($verifiedUsers as $user)
                                                    <tr>
                                                        <td>{{ $user->user->name }}</td>
                                                        <td>{{ $user->user->email }}</td>
                                                        <td>{{ $user->verified_type }}</td>
                                                        <td class="tw-h-full">
                                                            <form action="{{ route('admin.verify-user', $user->VerifiedID) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-success tw-text-center tw-w-full tw-mb-2">Approve</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.unverify-user', $user->VerifiedID) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-danger tw-text-center tw-w-full">Reject</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade tw-py-5 tw-px-5" id="v-pills-events" role="tabpanel" aria-labelledby="v-pills-events-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="tw-flex">
                                            <h4 class="card-title tw-my-auto">Users List</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive tw-max-h-96">
                                            <table id="add-row" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Location Type</th>
                                                        <th>Location</th>
                                                        <th>Date</th>
                                                        <th colspan="2" style="width: 10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($events as $event)
                                                    <tr>
                                                        <td class="tw-overflow-x-hidden">{{ $event->title }}</td>
                                                        <td>{{ $event->location_type }}</td>
                                                        <td>{{ $event->location }}</td>
                                                        <td>{{ $event->date->format('Y M d') }}</td>
                                                        <td class="tw-h-full">
                                                            <form action="{{ route('event-submissions.edit', $event) }}" method="GET">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary tw-text-center tw-w-full tw-mb-2">Update</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.delete-event', $event->eventsID) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger tw-text-center tw-w-full">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="v-pills-connection" role="tabpanel" aria-labelledby="v-pills-connection-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-accessibility" role="tabpanel" aria-labelledby="v-pills-accessibility-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab" tabindex="0">...</div> -->
                </div>
            </section>
        </div>
    </section>
    <style>
            #layoutContainer {
                .nav-link {
                    border-radius: 0 !important;
                }
            }
        </style>
</x-app-layout>