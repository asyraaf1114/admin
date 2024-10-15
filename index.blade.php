@extends('layouts.backend')

@section('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Page JS Code -->
    <script type="module">
        // Slick Slider, for more info and examples you can check out http://kenwheeler.github.io/slick/
        Dashmix.helpersOnLoad(['jq-notify']);
    </script>

    <!-- Page JS Code -->
    @vite(['resources/js/pages/datatables.js'])
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                {{-- <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Sundancemesa Firmware Releases</h1> --}}
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Releases</li>
                        <li class="breadcrumb-item active" aria-current="page">Sundancemesa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Latest Update</h3>
            </div>
            <div class="block-content">
                <p>
                    {{ $last->updated_at }} UTC+8 (Penang)
                </p>
            </div>
        </div>
        <!-- END Info -->
        @if (session('message') === 'Success')
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Sundancemesa <small>(agilex5.zip)</small></h3>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addnew"
                    class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> New Firmware</button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-borderless table-hover table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center">#ID</th>
                            <th class="text-center">Version</th>
                            <th class="text-center">Build</th>
                            <th class="text-center">Tag</th>
                            <th class="text-center">Branch</th>
                            <th class="text-center">Tag Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse($releases as $release)
                            <tr>
                                <td class="text-center">{{ $release->id }}</td>
                                <td class="text-center">{{ $release->version }}</td>
                                <td class="text-center">{{ $release->build }}</td>
                                <td class="text-center fw-semibold" id="{{ $release->tag }}">
                                    <a href="https://www.google.com" target="_blank">{{ $release->tag }}</a>
                                    @php
                                        $count = 20 - strlen($release->tag);
                                    @endphp
                                    @while ($count--)
                                        &nbsp
                                    @endwhile
                                    <button type="button" class="btn btn-sm fa-solid fa-copy text-primary"
                                        onclick="copyToClipboard(this)">
                                    </button>
                                </td>
                                <td class="text-center">{{ $release->branch }}</td>
                                <td class="text-center">{{ $release->tag_date }}</td>
                                <td class="text-center d-none d-sm-table-cell">
                                    @if ($release->status == 'Active')
                                        <span class="badge bg-primary">{{ strtoupper($release->status) }}</span>
                                    @elseif($release->status == 'Future')
                                        <span class="badge bg-info">{{ strtoupper($release->status) }}</span>
                                    @else
                                        <span class="badge bg-success">{{ strtoupper($release->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#edit{{ $release->id }}" data-bs-toggle="modal"
                                        class="btn btn-sm btn-success"><i class='fa fa-edit'></i> Edit</a>
                                    <a href="#delete{{ $release->id }}" data-bs-toggle="modal"
                                        class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Delete</a>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit{{ $release->id }}" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($releases, ['method' => 'patch', 'route' => ['smreleases.update', $release->id]]) !!}
                                                    <div class="mb-3">
                                                        {!! Form::label('version', 'Version') !!}
                                                        {!! Form::text('version', $release->version, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        {!! Form::label('build', 'Build') !!}
                                                        {!! Form::text('build', $release->build, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        {!! Form::label('tag', 'Tag') !!}
                                                        {!! Form::text('tag', $release->tag, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        {!! Form::label('branch', 'Branch') !!}
                                                        {!! Form::text('branch', $release->branch, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        {!! Form::label('tag_date', 'Tag Date') !!}
                                                        {!! Form::text('tag_date', $release->tag_date, ['class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="mb-3">
                                                        {!! Form::label('status', 'Status') !!}
                                                        {!! Form::text('status', $release->status, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                                    {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete{{ $release->id }}" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($releases, ['method' => 'delete', 'route' => ['smreleases.delete', $release->id]]) !!}
                                                    <h4 class="text-center">Are you sure you want to delete Tag?</h4>
                                                    <h5 class="text-center">Tag: {{ $release->tag }}</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="fa fa-times"></i>
                                                        Cancel</button>
                                                    {{ Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewModalLabel">Add New Firmware</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'smreleases/save']) !!}
                    <div class="mb-3">
                        {!! Form::label('version', 'Version') !!}
                        {!! Form::text('version', '', ['class' => 'form-control', 'placeholder' => 'Input Version', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('build', 'Build') !!}
                        {!! Form::text('build', '', ['class' => 'form-control', 'placeholder' => 'Input Build', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('tag', 'Tag') !!}
                        {!! Form::text('tag', '', ['class' => 'form-control', 'placeholder' => 'Input Tag', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('branch', 'Branch') !!}
                        {!! Form::text('branch', '', ['class' => 'form-control', 'placeholder' => 'Input Branch', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('tag_date', 'Tag Date') !!}
                        {!! Form::text('tag_date', '', ['class' => 'form-control', 'placeholder' => 'Input Tag Date', 'required']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::text('status', '', ['class' => 'form-control', 'placeholder' => 'Input Status', 'required']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Name</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Email</label>
                      <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                      <label for="dobWithTitle" class="form-label">DOB</label>
                      <input type="date" id="dobWithTitle" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div> --}}

    <script>
        function copyToClipboard(elem) {
            var content = elem.parentNode.id;
            navigator.clipboard.writeText(content);
            Dashmix.helpers('jq-notify', {
                type: 'success',
                icon: 'fa fa-check me-1',
                message: 'Copied to clipboard: ' + content,
            });
        }
    </script>
    <!-- END Page Content -->
@endsection
