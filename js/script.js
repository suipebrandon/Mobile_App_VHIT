// Show modal
function showModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

// Hide modal
function hideModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modals = document.querySelectorAll('[id$="-modal"]');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
});

// Handle registration form
document.getElementById('registerForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('api/register.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('Registration successful! You can now login.');
            window.location.href = 'index.php';
        } else {
            alert('Error: ' + data.message);
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});

// Handle login form
document.getElementById('loginForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('api/login.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('Login successful!');
            window.location.href = 'home.php';
        } else {
            alert('Error: ' + data.message);
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});

// Load users in modal
async function loadUsers() {
    try {
        const response = await fetch('api/users.php');
        const data = await response.json();
        
        if (data.success) {
            displayUsers(data.users);
            showModal('usersModal');
        } else {
            alert('Error: ' + data.message);
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
}

// Display users in the table
function displayUsers(users) {
    const tbody = document.getElementById('usersTableBody');
    tbody.innerHTML = '';
    
    users.forEach(user => {
        const row = document.createElement('tr');
        row.className = 'border-b hover:bg-gray-50';
        row.innerHTML = `
            <td class="px-6 py-4 text-sm text-gray-900">${user.id}</td>
            <td class="px-6 py-4 text-sm text-gray-900">${user.name}</td>
            <td class="px-6 py-4 text-sm text-gray-900">${user.email}</td>
            <td class="px-6 py-4 text-sm text-gray-900">${new Date(user.created_at).toLocaleDateString()}</td>
            <td class="px-6 py-4 text-sm space-x-2">
                <button onclick="openEditModal(${user.id}, '${user.name}', '${user.email}')" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Edit</button>
                <button onclick="deleteUser(${user.id}, '${user.name}')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Open edit modal
function openEditModal(userId, userName, userEmail) {
    document.getElementById('editUserId').value = userId;
    document.getElementById('editUserName').value = userName;
    document.getElementById('editUserEmail').value = userEmail;
    hideModal('usersModal');
    showModal('editModal');
}

// Handle edit form
document.getElementById('editUserForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const userId = document.getElementById('editUserId').value;
    const name = document.getElementById('editUserName').value;
    const email = document.getElementById('editUserEmail').value;
    
    if (confirm('Are you sure you want to save these changes?')) {
        const formData = new FormData();
        formData.append('user_id', userId);
        formData.append('name', name);
        formData.append('email', email);
        
        try {
            const response = await fetch('api/user_edit.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                alert('User updated successfully!');
                hideModal('editModal');
                loadUsers();
            } else {
                alert('Error: ' + data.message);
            }
        } catch (error) {
            alert('An error occurred: ' + error.message);
        }
    }
});

// Delete user
async function deleteUser(userId, userName) {
    if (confirm(`Are you sure you want to delete user "${userName}"? This action cannot be undone.`)) {
        const formData = new FormData();
        formData.append('user_id', userId);
        
        try {
            const response = await fetch('api/user_delete.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                alert('User deleted successfully!');
                loadUsers();
            } else {
                alert('Error: ' + data.message);
            }
        } catch (error) {
            alert('An error occurred: ' + error.message);
        }
    }
}

// Handle add user form
document.getElementById('addUserForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const name = document.getElementById('newUserName').value;
    const email = document.getElementById('newUserEmail').value;
    const password = document.getElementById('newUserPassword').value;
    const confirmPassword = document.getElementById('newUserConfirmPassword').value;
    
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('confirm_password', confirmPassword);
    
    try {
        const response = await fetch('api/register.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('User added successfully!');
            document.getElementById('addUserForm').reset();
            hideModal('addUserModal');
            loadUsers();
        } else {
            alert('Error: ' + data.message);
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});
