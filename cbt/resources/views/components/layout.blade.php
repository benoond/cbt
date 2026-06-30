<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Modern Admin Dashboard</title> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" type="image/jpg" href="{{ asset('logo.jpg') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }
        body {

            background: #eef3ff;

        }
        .wrapper {

            display: flex;
            min-height: 100vh;
        }
/* =====================
   SIDEBAR
===================== */
        .sidebar {
            width: 280px;
            height: calc(100vh - 30px);
            margin: 15px;
            border-radius: 25px;
            background:
                linear-gradient(145deg,
                    #111827,
                    #1e40af);
            color: white;
            position: sticky;
            top: 15px;
            overflow: auto;
            transition: .35s;
            box-shadow:
                0 20px 50px #0004;
            z-index: 1000;
        }
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {

            background: #60a5fa;
            border-radius: 20px;

        }
       /* LOGO */
        .logo {
            height: 85px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 25px;
            font-weight: bold;
            background: #ffffff15;
            border-radius: 25px 25px 0 0;
        }
        .logo i {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background:
                linear-gradient(135deg, #60a5fa, #2563eb);
            box-shadow:
                0 10px 25px #2563eb88;
        }
        .menu {
            list-style: none;
            padding: 15px;
        }
        .menu li {
            margin-bottom: 8px;
        }
        .menu a,
        .dropdown-btn {
            height: 55px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 16px;
            color: #e5e7eb;
            text-decoration: none;
            cursor: pointer;
            transition: .25s;
        }
        .menu a:hover,
        .dropdown-btn:hover {
            background: #ffffff22;
            transform: translateX(6px);
            color: white;
        }
        .menu span,
        .dropdown-btn span {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .menu i {
            width: 20px;
        }
        /* CHILD */
        .submenu {
            background: #0002;
            border-radius: 15px;
            max-height: 0;
            overflow: hidden;
            transition: .35s;
        }
        .submenu a {
            height: 45px;
            padding-left: 50px;
            font-size: 14px;
        }
        .submenu a:hover {
            transform: none;
        }
        .dropdown.active .submenu {
            max-height: 300px;
        }
        .arrow {
            transition: .3s;
        }
        .dropdown.active .arrow {
            transform: rotate(180deg);
        }
/* =====================
MAIN
===================== */
        .main {
            flex: 1;
        }
        header {
            height: 75px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            box-shadow: 0 5px 20px #0001;
        }
        .menu-btn {
            display: none;
            background: none;
            border: 0;
            font-size: 25px;
        }
        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }
        .content {
            padding: 25px;
        }
        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        .card,
        .box {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow:
                0 15px 30px #0001;
        }
        .card {
            transition: .3s;
        }
        .card:hover {
            transform: translateY(-7px);
        }
        .card h3 {
            color: #777;
        }
        .card h1 {
            margin-top: 15px;
            color: #2563eb;
            font-size: 38px;
        }
        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #2563eb;
            color: white;
            padding: 15px;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        /* LOWER AREA */
        .bottom-grid {
            display: grid;
            grid-template-columns: 70% 30%;
            gap: 25px;
            margin-top: 25px;
            margin-right: 25px;
        }
        .large-box,
        .small-box {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            color: #2563eb;
        }
        /* MOBILE */
        .overlay {
            position: fixed;
            inset: 0;
            background: #0006;
            display: none;
            z-index: 999;
        }
        .overlay.show {
            display: block;
        }
        @media(max-width:768px) {
            .sidebar {
                position: fixed;
                left: -300px;
                top: 0;
                height: 100vh;
                margin: 0;
                border-radius: 0 25px 25px 0;
            }
            .sidebar.show {
                left: 0;
            }
            .menu-btn {
                display: block;
            }
            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }
/* ===========================
   RESPONSIVE DASHBOARD CONTENT
=========================== */
       /* prevent horizontal overflow */
        .main {
            min-width: 0;
        }
        .content {
            width: 100%;
            overflow: hidden;
        }
        /* cards mobile */
        @media(max-width:768px) {
            .cards {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            .card {
                width: 100%;
            }
            .box {
                width: 100%;
                padding: 18px;
                overflow-x: auto;
            }
            /* table becomes scrollable */
            table {
                min-width: 600px;
            }
            .bottom-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
           .large-box,
            .small-box {
                height: 200px;
                width: 100%;
            }
            header {
                padding: 0 15px;
            }
            header h2 {
                font-size: 18px;
            }
        }
        @media(max-width:480px) {
            .content {
                padding: 15px 10px;
            }
            .card h1 {
                font-size: 30px;
            }
            .card h3 {
                font-size: 15px;
            }
            .box h2 {
                font-size: 18px;
            }
            .avatar {
                width: 38px;
                height: 38px;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="wrapper">
        <aside class="sidebar">
            <div class="logo">
                <i class="fa fa-cube"></i>
                Admin
            </div>
            <ul class="menu">
                <li>
                    <a href="{{ route('admindashboard') }}">
                        <span>
                            <i class="fa fa-home"></i>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="dropdown">
                    <div class="dropdown-btn">
                        <span>
                            <i class="fa fa-users"></i>
                            Students
                        </span>
                        <i class="fa fa-chevron-down arrow"></i>
                    </div>
                    <div class="submenu">
                        <a href="#">All Students</a>
                        <a href="{{ route('addstudents') }}">Add Students</a>
                        <a href="#">Roles</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="dropdown-btn">
                        <span>
                            <i class="fa fa-box"></i>
                            Products
                        </span>
                        <i class="fa fa-chevron-down arrow"></i>
                    </div>
                    <div class="submenu">
                        <a href="#">Products</a>
                        <a href="#">Categories</a>
                        <a href="#">Orders</a>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <span>
                            <i class="fa fa-chart-line"></i>
                            Reports
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>
                            <i class="fa fa-gear"></i>
                            Settings
                        </span>
                    </a>
                </li>
            </ul>
        </aside>
        <main class="main">
            <header>
                <button class="menu-btn">
                    <i class="fa fa-bars"></i>
                </button>
                <h2>{{ $heading }}</h2>
                <img class="avatar" src="https://i.pravatar.cc/100">
            </header>

        {{ $slot }}

        </main>
    </div>
    <script>
        const sidebar =
            document.querySelector(".sidebar");
        const btn =
            document.querySelector(".menu-btn");
        const overlay =
            document.querySelector(".overlay");
        btn.onclick = () => {
            sidebar.classList.add("show");
            overlay.classList.add("show");
        };
        function closeSidebar() {
           sidebar.classList.remove("show");
            overlay.classList.remove("show");
        }
        overlay.onclick = closeSidebar;
        document.querySelectorAll(".dropdown")
            .forEach(item => {
                item.querySelector(".dropdown-btn")
                    .onclick = () => {
                        item.classList.toggle("active");
                    };
            });
        document.querySelectorAll(".menu a")
            .forEach(link => {
                link.onclick = () => {
                    if (innerWidth <= 768)
                        closeSidebar();
                };
            });
        window.onresize = () => {
            if (innerWidth > 768)
                closeSidebar();
        };
    </script>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>