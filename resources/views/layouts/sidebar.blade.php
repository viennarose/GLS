<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    @livewireStyles()
    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin-top: 38px;
            padding: 0;
            width: 250px;
            background-color: #ffffff;
            position: fixed;
            height: 100%;
            overflow: auto;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1)
        }

        .sidebar a {
            display: block;
            color: rgb(43, 43, 43);
            padding: 16px;
            text-decoration: none;
        }

        /* Add CSS for toggle button
.toggle-menu {
  display: none;

} */

        /* Hide toggle button when screen size is larger than 700px */
        @media screen and (min-width: 701px) {
            .toggle-menu {
                display: none;
                text-align: center;
            }

            .toggle-menu:hover {
                background-color: none;
            }
        }

        /* Show toggle button when screen size is 700px or less */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: none;
            }

            .toggle-menu {
                display: block;
            }

            /* Show all menu items when toggle button is clicked */
            .sidebar.active a:not(.toggle-menu) {
                display: block;
            }
        }


        /* Show all menu items when toggle button is clicked */
        @media screen and (max-width: 700px) {
            .sidebar a {
                text-align: center;
                float: none;
            }

            .sidebar a:not(.toggle-menu) {
                display: none;
            }

            .toggle-menu {
                display: block;
                margin-bottom: 12px;
            }

            .sidebar.active a:not(.toggle-menu) {
                display: block;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a class="toggle-menu" href="#"><span class="fas fa-chart-bar"></span> Resources</a>
        {{-- @php
            $resources = DB::table('resources')->get();

    @endphp

    @foreach ($resources as $res)
       <div style="margin-top:-20px;">
        <a href="{{$res->id}}" style="font-size: 12px; margin-bottom: -10px;">{{$res->title}}</a>
       </div>

    @endforeach --}}

    </div>
    {{-- <livewire:user.resources> --}}

</body>
@livewireScripts()

</html>


<script>
    // Get the toggle button
    var toggleBtn = document.querySelector('.toggle-menu');

    // Get the sidebar
    var sidebar = document.querySelector('.sidebar');

    // When the toggle button is clicked
    toggleBtn.addEventListener('click', function() {
        // Toggle the 'active' class on the sidebar
        sidebar.classList.toggle('active');
    });
</script>
