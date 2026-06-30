

<x-layout title="Dashboard" heading="Dashboard">
        <main class="main">
            <header>
                <button class="menu-btn">
                    <i class="fa fa-bars"></i>
                </button>
                <h2>Dashboard</h2>
                <img class="avatar" src="https://i.pravatar.cc/100">
            </header>
            <div class="content">
                <div class="cards">
                    <div class="card">
                        <h3>Total Users</h3>
                        <h1>1245</h1>
                    </div>
                    <div class="card">
                        <h3>Orders</h3>
                        <h1>892</h1>
                    </div>
                    <div class="card">
                        <h3>Revenue</h3>
                        <h1>$24K</h1>
                    </div>
                    <div class="card">
                        <h3>Visitors</h3>
                        <h1>15K</h1>
                    </div>
                </div>
                <div class="box">
                    <h2>Recent Orders</h2>
                    <br>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>john@mail.com</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>Sarah Smith</td>
                            <td>sarah@mail.com</td>
                            <td>Pending</td>
                        </tr>
                    </table>
                </div>
                <div class="bottom-grid">
                    <div class="box large-box">
                        70% Width Container
                    </div>
                    <div class="box small-box">
                        30% Width Container
                    </div>
                </div>
            </div>
        </main>
</x-layout>