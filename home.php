<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row md:justify-between items-start md:items-center gap-4">
            <div class="w-full md:w-auto">
                <h1 class="text-3xl font-bold text-gray-800">User Management System</h1>
            </div>
            <div class="flex flex-wrap items-center gap-3 sm:gap-4 w-full md:w-auto">
                <button onclick="loadUsers()" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold transition duration-200">
                    👥 View All Users
                </button>
                <button onclick="showModal('addUserModal')" class="w-full sm:w-auto bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold transition duration-200">
                    ➕ Add User
                </button>
                <div class="relative w-full sm:w-auto">
                    <button onclick="toggleUserMenu()" class="w-full sm:w-auto bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg font-semibold transition duration-200">
                        👤 Profile
                    </button>
                    <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10">
                        <div class="px-4 py-3 border-b">
                            <p class="font-semibold text-gray-800"><?php echo htmlspecialchars($user_name); ?></p>
                            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($user_email); ?></p>
                        </div>
                        <a href="logout.php" class="block px-4 py-2 text-red-500 hover:bg-gray-100 font-semibold">🚪 Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-lg p-8 text-white mb-8">
            <h2 class="text-4xl font-bold mb-2">Welcome back, <?php echo htmlspecialchars($user_name); ?>! 👋</h2>
            <p class="text-lg opacity-90">Manage users and their information from this dashboard.</p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-600 font-semibold mb-2">Quick Actions</h3>
                <p class="text-2xl font-bold text-blue-500">3</p>
                <p class="text-sm text-gray-500">View, Add, Edit Users</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-600 font-semibold mb-2">Logged In As</h3>
                <p class="text-2xl font-bold text-purple-500"><?php echo htmlspecialchars($user_name); ?></p>
                <p class="text-sm text-gray-500">Your account</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-gray-600 font-semibold mb-2">Status</h3>
                <p class="text-2xl font-bold text-green-500">Active</p>
                <p class="text-sm text-gray-500">Session active</p>
            </div>
        </div>

        <!-- Instructions -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
            <h3 class="text-lg font-semibold text-blue-900 mb-3">How to use this dashboard:</h3>
            <ul class="list-disc list-inside space-y-2 text-blue-800">
                <li><strong>View All Users:</strong> Click the "View All Users" button to see all registered users in a modal</li>
                <li><strong>Edit User:</strong> Select a user and click "Edit" to modify their information</li>
                <li><strong>Delete User:</strong> Remove a user (with confirmation) using the "Delete" button</li>
                <li><strong>Add User:</strong> Click "Add User" to register a new user directly from the dashboard</li>
                <li><strong>Logout:</strong> Click your profile button and select "Logout" to exit</li>
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <p class="text-center text-gray-400">&copy; 2026 User Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Users Modal -->
    <div id="usersModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center px-4 py-6">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full mx-auto max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b px-4 py-4 sm:px-6 sm:py-5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <h3 class="text-2xl font-bold text-gray-800">All Users</h3>
                <button onclick="hideModal('usersModal')" class="text-gray-500 hover:text-gray-700 font-bold text-2xl">×</button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Joined</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Loading users...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center px-4 py-6">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-auto">
            <div class="border-b px-4 py-4 sm:px-6 sm:py-5 flex justify-between items-center">
                <h3 class="text-2xl font-bold text-gray-800">Edit User</h3>
                <button onclick="hideModal('editModal')" class="text-gray-500 hover:text-gray-700 font-bold text-2xl">×</button>
            </div>
            
            <form id="editUserForm" class="p-6 space-y-4">
                <input type="hidden" id="editUserId">
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="editUserName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="editUserEmail" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Add User Modal -->
    <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center px-4 py-6">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-auto">
            <div class="border-b px-4 py-4 sm:px-6 sm:py-5 flex justify-between items-center">
                <h3 class="text-2xl font-bold text-gray-800">Add New User</h3>
                <button onclick="hideModal('addUserModal')" class="text-gray-500 hover:text-gray-700 font-bold text-2xl">×</button>
            </div>
            
            <form id="addUserForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input type="text" id="newUserName" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter full name">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="newUserEmail" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="newUserPassword" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Create password (min 6 characters)">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                    <input type="password" id="newUserConfirmPassword" name="confirm_password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm password">
                </div>

                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">Add User</button>
            </form>
        </div>
    </div>

    <script>
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            menu.classList.toggle('hidden');
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('userMenu');
            const profileBtn = event.target.closest('button[onclick="toggleUserMenu()"]');
            if (!profileBtn && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
    <script src="js/script.js"></script>
</body>
</html>
