<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('index')}}/style.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 well">
                <div class="col-sm-12 form-legend">
                    <h2>Add User</h2>
                </div>
                <div class="col-sm-12 form-column">
                    <form action="{{ route('store.user', $user->id ?? '') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name ?? '' }}"
                                placeholder="Enter your Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email ?? '' }}"
                                placeholder="Enter your Email">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">User Image</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="file" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Product Image" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" name="image"
                                    value="{{ $user->image ?? '' }}" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //override jquery validate plugin defaults
                // http://stackoverflow.com/a/18754780

                $.validator.setDefaults({
                    highlight: function(element) {
                        $(element).closest(".form-group").addClass("has-error");
                    },

                    unhighlight: function(element) {
                        $(element).closest(".form-group").removeClass("has-error");
                    },

                    errorElement: "span",

                    errorClass: "help-block",

                    errorPlacement: function(error, element) {
                        if (element.parent(".input-group").length ||
                            element.prop("type") === "checkbox" ||
                            element.prop("type") === "radio"
                        ) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });

                $("form").validate({
                    rules: {
                        email: {
                            required: true,
                            maxlength: 255
                        },
                        emailConfirm: {
                            required: true,
                            equalTo: "#email",
                            maxlength: 255
                        },
                        zipCode: {
                            maxlength: 32
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        passwordConfirm: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                        termsOfUse: "required"
                    },

                    messages: {
                        email: {
                            required: "Please enter your email address.",
                        },
                        emailConfirm: {
                            required: "Confirm your email address.",
                            equalTo: "Emails do not match."
                        },
                        password: {
                            required: "Please choose a password."
                        },
                        passwordConfirm: {
                            required: "Confirm your password.",
                            equalTo: "Passwords do not match."
                        },
                        termsOfUse: {
                            required: "You must agree to terms of service."
                        }
                    }
                });
            });
        </script>
</body>

</html>
