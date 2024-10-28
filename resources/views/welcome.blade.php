<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('jquery-3.7.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('select2.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.25rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 0.75rem;
        }

        .select2-container--default .select2-selection--single:focus,
        .select2-container--default .select2-selection--single:hover {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .select2-container--default .select2-selection--single:focus {
            outline: none;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">


    <div class="container">
        <button type="button" class="btn btn-primary mt-4" id="add-more">Add More</button>

        <div class="row mt-5" id="item-row-template">
            <div class="col-md-4">
                <label for="color" class="form-label">Color</label>
                <select name="color_id[]" class="w-100 select2">
                    <option value="0">test 1</option>
                    <option value="2">test 2</option>
                    <option value="3">test 3</option>
                    <option value="4">test 4</option>
                    <option value="5">test 5</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock[]" value="">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-danger mt-4 remove-row">Remove</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize select2 on document load
            $('.select2').select2();

            // Function to clone a new row with select2 re-initialization
            $('#add-more').on('click', function() {
                // creat select 2 dropdown
                var newRow = '<div class="row mt-5" id="item-row-template">' +
                    '<div class="col-md-4">' +
                    '<label for="color" class="form-label">Color</label>' +
                    '<select name="color_id[]" class="w-100 select2">' +
                    '<option value="0">test 1</option>' +
                    '<option value="2">test 2</option>' +
                    '<option value="3">test 3</option>' +
                    '<option value="4">test 4</option>' +
                    '<option value="5">test 5</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<label for="stock" class="form-label">Stock</label>' +
                    '<input type="text" class="form-control" name="stock[]" value="">' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<button type="button" class="btn btn-danger mt-4 remove-row">Remove</button>' +
                    '</div>' +
                    '</div>';

                // Add new row
                // $(newRow).appendTo('#item-row-template');

                //add select 2 dropdown not working reinitialization
                // $(newRow).find('.select2').select2();

                $('.container').append(newRow); // Append new row
                //select2 reinitialization
                $('.select2').select2();
            });

            // Function to remove a row
            $(document).on('click', '.remove-row', function() {
                //check if there is more than one row before removing
                if ($('.row').length > 1) {
                    $(this).closest('.row').remove();
                }
            });
        });
    </script>
</body>

</html>
