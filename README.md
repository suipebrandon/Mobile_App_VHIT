# User Management System with Login/Signup

A complete user authentication and management system built with PHP, MySQL, and Tailwind CSS.

## Features

✅ **User Registration** - Sign up with email validation
✅ **User Login** - Secure login with session management
✅ **Dashboard** - Welcome message with logged-in user's name
✅ **View All Users** - Display all registered users in a modal
✅ **Add New Users** - Create new users from the dashboard
✅ **Edit Users** - Modify user information with confirmation
✅ **Delete Users** - Remove users with confirmation dialog
✅ **User Profile Button** - Quick access to user info and logout
✅ **Responsive Design** - Built with Tailwind CSS for mobile compatibility
✅ **Security** - Password hashing with bcrypt, SQL injection protection

## Project Structure

```
BD_Web/
├── index.php              # Login and Registration page
├── home.php              # Dashboard (after login)
├── logout.php            # Logout handler
├── database.sql          # Database schema
├── config/
│   └── db.php           # Database connection
├── api/
│   ├── login.php        # Login API endpoint
│   ├── register.php     # Registration API endpoint
│   ├── users.php        # Get all users API
│   ├── user_edit.php    # Edit user API
│   └── user_delete.php  # Delete user API
├── js/
│   └── script.js        # JavaScript for modals and forms
└── README.md            # This file
```

## Installation & Setup

### 1. Create the Database

- Open phpMyAdmin (http://localhost/phpmyadmin)
- Import the `database.sql` file OR
- Copy and paste the SQL queries from `database.sql` into the SQL tab

The SQL will create:
- Database: `bd_web_db`
- Table: `users` with columns: id, name, email, password, created_at, updated_at

### 2. Configure Database Connection

The database configuration is in `config/db.php`:
```php
$host = 'localhost';
$db_name = 'bd_web_db';
$db_user = 'root';
$db_pass = '';
```

If your XAMPP/LAMP setup uses different credentials, update these values.

### 3. Start Your Server

- Ensure Apache and MySQL are running in XAMPP/LAMP
- Navigate to: http://localhost/BD_Web/

## Usage Guide

### Register a New Account
1. Go to http://localhost/BD_Web/
2. Click "Register here"
3. Fill in: Name, Email, Password, Confirm Password
4. Click "Register"
5. You'll be redirected to login

### Login
1. Enter your email and password
2. Click "Login"
3. You'll be redirected to the dashboard

### Dashboard Features

#### View All Users
- Click the **"View All Users"** button in the header
- A modal will display all registered users in a table with:
  - User ID
  - Name
  - Email
  - Registration Date
  - Edit & Delete buttons

#### Add New User
- Click the **"Add User"** button in the header
- Fill in the form: Name, Email, Password, Confirm Password
- Click "Add User"
- A confirmation message will appear

#### Edit User
1. Click "View All Users"
2. Find the user you want to edit
3. Click the **"Edit"** button
4. Update the Name and/or Email
5. Click "Save Changes"
6. A confirmation dialog will ask: "Are you sure you want to save these changes?"
7. User information will be updated

#### Delete User
1. Click "View All Users"
2. Find the user you want to delete
3. Click the **"Delete"** button
4. A confirmation dialog will ask: "Are you sure you want to delete user [name]?"
5. Click "OK" to confirm deletion
6. User will be removed from the database

#### Logout
1. Click the **"Profile"** button in the header
2. Click **"Logout"**
3. You'll be redirected to the login page

## File Details

### Frontend Files

#### index.php
- Login and registration form
- Toggle between login/register views
- Form validation
- Calls API endpoints for authentication

#### home.php
- Dashboard with welcome message showing logged-in user name
- Header with profile button, view users, and add user buttons
- Welcome banner
- Quick stats cards
- Instructions section
- Modals for users, edit, and add user

### Backend Files (API)

#### api/login.php
- POST method
- Verifies email and password
- Creates session on successful login
- Returns JSON response

#### api/register.php
- POST method
- Validates input (name, email, password)
- Checks for duplicate emails
- Hashes password with bcrypt
- Inserts user into database
- Returns JSON response

#### api/users.php
- GET method
- Returns all users from database
- Requires active session
- Returns JSON array of users

#### api/user_edit.php
- POST method
- Updates user name and email
- Validates email format
- Checks for duplicate emails
- Updates session if editing current user
- Returns JSON response

#### api/user_delete.php
- POST method
- Deletes user by ID
- Requires active session
- Returns JSON response

### JavaScript File

#### js/script.js
- Modal management (show/hide)
- Form submission handlers
- User CRUD operations
- Confirmation dialogs
- Modal close on outside click
- JSON API communication

### Configuration

#### config/db.php
- MySQLi connection
- Database credentials
- Character set (UTF-8)
- Error handling

## Security Features

🔒 **Password Security**
- Passwords are hashed using bcrypt (PASSWORD_BCRYPT)
- Never stored in plain text

🔐 **SQL Injection Protection**
- Prepared statements with parameterized queries
- All user input is bound safely

🛡️ **Session Management**
- Session checks on protected pages
- Auto-redirect to login if not authenticated

✅ **Input Validation**
- Email format validation
- Password length validation
- Password confirmation matching
- Duplicate email prevention

## Troubleshooting

### "Connection failed" Error
- Check if MySQL is running
- Verify database credentials in `config/db.php`
- Ensure `bd_web_db` database exists

### "Undefined session variables"
- Make sure `session_start()` is at the top of each PHP file
- Check if cookies are enabled in browser

### Users modal not showing
- Check browser console for JavaScript errors
- Verify `js/script.js` is loaded
- Ensure database has users in it

### Edit/Delete not working
- Verify you're logged in
- Check browser console for errors
- Ensure database connection is working

## API Endpoints

All endpoints return JSON responses:

| Endpoint | Method | Purpose | Response |
|----------|--------|---------|----------|
| `/api/login.php` | POST | User login | `{success: bool, message: string}` |
| `/api/register.php` | POST | User registration | `{success: bool, message: string}` |
| `/api/users.php` | GET | Get all users | `{success: bool, users: array}` |
| `/api/user_edit.php` | POST | Edit user | `{success: bool, message: string}` |
| `/api/user_delete.php` | POST | Delete user | `{success: bool, message: string}` |

## Required Fields

### Registration/Login
- **Email**: Valid email format
- **Password**: Minimum 6 characters

### Add/Edit User
- **Name**: Required
- **Email**: Valid, unique email format
- **Password** (add only): Minimum 6 characters

## Browser Compatibility

- Chrome/Chromium ✅
- Firefox ✅
- Safari ✅
- Edge ✅
- Mobile browsers ✅

## Technologies Used

- **Backend**: PHP 7.0+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Styling**: Tailwind CSS 3
- **Authentication**: bcrypt password hashing
- **Server**: Apache (XAMPP/LAMP)

## Future Enhancements

- User roles and permissions
- Email verification on registration
- Password reset functionality
- User profile picture upload
- Activity logging
- Two-factor authentication
- Email notifications

## License

This project is free to use and modify.

## Support

For issues or questions:
1. Check the Troubleshooting section
2. Review the console for error messages
3. Verify database and server setup

---

**Version**: 1.0
**Last Updated**: 2026
