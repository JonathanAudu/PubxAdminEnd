<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="/dist/tailwind.css" rel="stylesheet" /> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PubX Dashboard</title>
  </head>
  <body class="flex h-screen font-mono">
        <a href="{{route('home')}}"
            class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
            >
            <i class="bi bi-house-door-fill px-2 bg-gray-900 rounded-md"></i>

        </a>

        <a href="./../"
            class="absolute text-white text-4xl top-20 left-4 cursor-pointer"
            >
            <i class="bi bi-arrow-left-square px-2 bg-gray-900 rounded-md"></i>

        </a>

        @yield("contents")

    <!-- <script type="text/javascript">
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }
        dropdown();

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }
    </script> -->
</body>
</html>
