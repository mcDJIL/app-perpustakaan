<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Perpustakaan Digital Kampus')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: #1f2937;
            font-family: sans-serif;
        }

        body > nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 14px 40px;
            background: #1e3a8a;
        }

        body > nav .brand {
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        body > nav ul {
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        body > nav ul li a {
            padding: 6px 4px;
            color: #cbd5e1;
            text-decoration: none;
        }

        body > nav ul li a.active {
            border-bottom: 2px solid #fff;
            color: #fff;
            font-weight: bold;
        }

        main {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 40px;
        }

        table {
            width: 100%;
            margin-top: 16px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .alert-success {
            margin-bottom: 16px;
            padding: 10px 14px;
            border-radius: 4px;
            background: #d1fae5;
            color: #065f46;
        }

        .btn {
            display: inline-block;
            padding: 6px 14px;
            border: none;
            border-radius: 4px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        form.inline {
            display: inline;
        }

        footer {
            margin-top: 40px;
            padding: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            margin-top: 4px;
            padding: 6px;
        }

        .error {
            margin-top: 4px;
            color: #b91c1c;
            font-size: 14px;
        }

        .pagination-wrap {
            margin-top: 24px;
        }

        .pagination-wrap nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            color: #4b5563;
            font-size: 14px;
        }

        .pagination-wrap nav > div:first-child {
            display: flex;
            width: 100%;
            justify-content: space-between;
            gap: 10px;
        }

        .pagination-wrap nav > div:last-child {
            display: none;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .pagination-wrap nav > div:first-child > a,
        .pagination-wrap nav > div:first-child > span,
        .pagination-wrap nav > div:last-child > div:last-child > span > a,
        .pagination-wrap nav > div:last-child > div:last-child > span > span {
            display: inline-flex;
            min-width: 44px;
            min-height: 44px;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            background: #fff;
            color: #1e3a8a;
            font-weight: 600;
            text-decoration: none;
        }

        .pagination-wrap nav > div:first-child > span,
        .pagination-wrap nav [aria-disabled="true"] > span {
            background: #f3f4f6;
            color: #6b7280;
        }

        .pagination-wrap nav [aria-current="page"] > span {
            border-color: #1e3a8a;
            background: #1e3a8a;
            color: #fff;
        }

        .pagination-wrap nav a:hover {
            border-color: #1e3a8a;
            background: #eff6ff;
        }

        .pagination-wrap nav a:focus-visible {
            outline: 3px solid #93c5fd;
            outline-offset: 2px;
        }

        @media (min-width: 640px) {
            .pagination-wrap nav > div:first-child {
                display: none;
            }

            .pagination-wrap nav > div:last-child {
                display: flex;
            }
        }

        @media (max-width: 600px) {
            body > nav {
                gap: 12px;
                padding: 14px 20px;
            }

            body > nav ul {
                flex-wrap: wrap;
                gap: 12px;
            }

            main {
                padding: 24px 20px;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main>
        @include('partials.alert')

        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistem Perpustakaan Digital Kampus
    </footer>
</body>
</html>
