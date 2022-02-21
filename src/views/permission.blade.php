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
                <h3 class="text-center">Add Permission</h3>
            </div>
            <div class="card-body p-2">
                <form action="{{ route('permission.store')}}" method="post">
                    @csrf
                    <div class="col-md-4 mb-3">
                        <label for="permission" class="form-label">Select Permission</label>
                        <select required name="permission[]" id="permission" multiple="multiple"
                            class="form-control mb-1 permission ">
                            @foreach($routesName as $permission)
                            <option class="" value="{{ $permission }}">
                                {{ ucwords(str_replace(['.','-','_'],' ',$permission)) }}
                            </option>
                            @endforeach
                        </select>
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
                            <th scope="col">Permision Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $key => $permission)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td> {{ ucwords(str_replace(['.','-','_'],' ',$permission->permission)) }}</td>
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