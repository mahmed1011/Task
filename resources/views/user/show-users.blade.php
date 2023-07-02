<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Table</title>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
        type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('index') }}/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card-header mt-5">
            <a href="{{ route('create.user') }}"><button class="btn btn-info mt-5">Add Product</button></a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr class="table-header">
                            <th class="cell">S.no</th>
                            <th class="cell">Name</th>
                            <th class="cell">Email</th>
                            <th class="cell">Image</th>
                            <th class="cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="active">

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ intval($key) + 1 }}</strong></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img src="{{ asset('image/' . $user->image) }}" alt=""
                                    style="width: 50px;border-radius: 50px;"></td>
                                    <td>
                                        <a href="{{ route('edit.user', $user->id) }}"
                                            class="btn btn-success"
                                            >Edit</a>
                                        <a href="{{ route('delete.user', $user->id) }}"
                                            class="btn btn-danger" onClick="showit()">Delete</a>
                                    </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
