<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('permission_dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('permission_dist/js/jquery-3.6.0.min.js') }}"></script>
    <link href="{{ asset('permission_dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('permission_dist/js/select2.min.js') }}"></script>
    <title>{{ $title ?? '' }}</title>
</head>

<body>
    <div class="container-fluid p-5">
        <div class="row card  col-md-6 mx-auto my-2">
            <div class="card-header">
                <h3 class="text-center">Add Role</h3>
            </div>
            <div class="card-body p-2">
                <form action="{{ route('role.store')}}" method="post">
                    @csrf
                    <div class="col-md-4 mb-3">
                        <label for="role" class="form-label">Role Name</label>
                        <input required type="text" name="role" id="role" class="form-control" placeholder="Role">
                        {{-- @error('role') <small class="text-danger">{{ $message }}</small>@enderror --}}
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="permission_id" class="form-label">Select Permission</label>
                        <select required name="permission_id[]" id="permission_id" multiple="multiple"
                            class="form-control mb-1 permission ">
                            @foreach($permissions as $permission)
                            <option class="" value="{{ $permission->id }}">
                                {{ ucwords(str_replace(['.','-','_'],' ',$permission->permission)) }}
                            </option>
                            @endforeach
                        </select>
                        {{-- @error('permission_id') <small class="text-danger">{{ $message }}</small>@enderror --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="row card col-md-6 mx-auto my-2">
            <div class="card-header">
                <h3 class="text-center">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $role)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td> {{ $role->role }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('permission_dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.permission').select2({
                placeholder: "Select a permission"
            });
        });
    </script>
</body>

</html>