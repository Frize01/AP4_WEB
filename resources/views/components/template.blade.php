<!-- resources/views/components/template.blade.php -->
<html class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white dark:bg-black">
        {{ $slot }}
    </body>
</html>