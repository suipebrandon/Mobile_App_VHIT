<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center py-8">
    <div class="w-full max-w-md mx-4 sm:mx-auto">
        <!-- Login Form -->
        <div id="loginTab" class="bg-white rounded-lg shadow-lg p-6 sm:p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Login</h2>
            
            <form id="loginForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your password">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-200">Login</button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">Don't have an account? 
                    <button type="button" onclick="toggleForms()" class="text-blue-500 hover:text-blue-600 font-semibold">Register here</button>
                </p>
            </div>
        </div>

        <!-- Register Form -->
        <div id="registerTab" class="bg-white rounded-lg shadow-lg p-6 sm:p-8 hidden">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Register</h2>
            
            <form id="registerForm" class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your full name">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Create a password (min 6 characters)">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                    <input type="password" name="confirm_password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm your password">
                </div>

                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-200">Register</button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">Already have an account? 
                    <button type="button" onclick="toggleForms()" class="text-blue-500 hover:text-blue-600 font-semibold">Login here</button>
                </p>
            </div>
        </div>
    </div>

    <script>
        function toggleForms() {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            loginTab.classList.toggle('hidden');
            registerTab.classList.toggle('hidden');
        }
    </script>
    <script src="js/script.js"></script>
</body>
</html>
