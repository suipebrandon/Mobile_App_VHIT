# QUICK START GUIDE

## Prerequisites
- XAMPP or LAMP stack installed and running
- Apache and MySQL services enabled
- PHP 7.0 or higher

## Step-by-Step Setup

### Step 1: Import Database (Choose One Method)

#### Method A: Using phpMyAdmin
1. Open http://localhost/phpmyadmin
2. Click "Import" tab
3. Choose `database.sql` file from BD_Web folder
4. Click "Go" button
5. Database will be created automatically

#### Method B: Using MySQL Command Line
```bash
mysql -u root -p < /path/to/BD_Web/database.sql
```

#### Method C: Manual SQL
1. Open phpMyAdmin
2. Click "SQL" tab
3. Copy all content from `database.sql`
4. Paste into SQL tab
5. Click "Go"

### Step 2: Verify Database Creation
1. Go to http://localhost/phpmyadmin
2. Look for database `bd_web_db` in left sidebar
3. Click on it
4. You should see `users` table with columns: id, name, email, password, created_at, updated_at

### Step 3: Start the Application
1. Open browser
2. Navigate to: http://localhost/BD_Web/
3. You should see Login/Register page

### Step 4: Test the System

#### Test Registration
1. Click "Register here"
2. Fill form:
   - Name: `Test User`
   - Email: `test@example.com`
   - Password: `test123`
   - Confirm: `test123`
3. Click "Register"
4. Should see: "Registration successful! You can now login."

#### Test Login
1. You'll be redirected to login page
2. Enter:
   - Email: `test@example.com`
   - Password: `test123`
3. Click "Login"
4. Should see dashboard with welcome message

#### Test View Users
1. Click "View All Users" button
2. Should see a modal with the test user in a table

#### Test Add User
1. Click "Add User" button
2. Fill form with new user details
3. Click "Add User"
4. Check "View All Users" to verify new user was added

#### Test Edit User
1. Click "View All Users"
2. Find a user
3. Click "Edit" button
4. Change the name or email
5. Click "Save Changes"
6. Confirm in dialog
7. View users again to verify changes

#### Test Delete User
1. Click "View All Users"
2. Find a user
3. Click "Delete" button
4. Confirm deletion in dialog
5. User should be removed

#### Test Logout
1. Click "Profile" button (top right)
2. Click "Logout"
3. Should return to login page

## File Locations

```
XAMPP/htdocs/BD_Web/
│
├── index.php              ← Start here (login page)
├── home.php              ← Dashboard after login
├── logout.php            ← Logout handler
├── database.sql          ← Database setup
├── README.md             ← Full documentation
├── SETUP.md              ← This file
│
├── config/
│   └── db.php            ← Database connection (edit if needed)
│
├── api/
│   ├── login.php         ← Login API
│   ├── register.php      ← Registration API
│   ├── users.php         ← Get users API
│   ├── user_edit.php     ← Edit user API
│   └── user_delete.php   ← Delete user API
│
└── js/
    └── script.js         ← JavaScript functions
```

## Modify Database Credentials (If Needed)

If your MySQL setup uses different credentials:

1. Open: `config/db.php`
2. Find these lines:
```php
$host = 'localhost';        // MySQL host
$db_name = 'bd_web_db';     // Database name
$db_user = 'root';          // MySQL username
$db_pass = '';              // MySQL password
```
3. Update with your credentials
4. Save file

## Common Issues & Fixes

### Issue: "Connection failed: Unknown database 'bd_web_db'"
**Fix**: You haven't imported the database.sql file. Follow Step 1 above.

### Issue: "Connection failed: Access denied for user 'root'@'localhost'"
**Fix**: Update credentials in `config/db.php` to match your MySQL setup.

### Issue: "Table 'bd_web_db.users' doesn't exist"
**Fix**: Database exists but table wasn't created. Re-import database.sql.

### Issue: Login page shows but Register button doesn't work
**Fix**: 
- Check if `js/script.js` is loaded (open DevTools → Console)
- Check if there are any JavaScript errors
- Verify file paths

### Issue: Can't access the application
**Fix**:
- Ensure Apache is running
- Ensure MySQL is running
- Check URL: http://localhost/BD_Web/ (not BD_Web.php)
- Verify files are in: C:\xampp\htdocs\BD_Web\ (Windows) or /opt/lampp/htdocs/BD_Web/ (Linux)

### Issue: "Header already sent" error
**Fix**: Make sure `session_start();` is the first line in PHP files (before any HTML).

## Database Info

**Database Name**: `bd_web_db`

**Table**: `users`

**Columns**:
- `id` - Auto-increment primary key
- `name` - User's full name (VARCHAR 100)
- `email` - User's email (VARCHAR 100, UNIQUE)
- `password` - Hashed password (VARCHAR 255)
- `created_at` - Registration timestamp
- `updated_at` - Last update timestamp

## Testing Checklist

- [ ] Database created successfully
- [ ] Can access login page
- [ ] Can register new user
- [ ] Can login with registered user
- [ ] Dashboard displays with welcome message
- [ ] Can view all users
- [ ] Can add new user
- [ ] Can edit user information
- [ ] Can delete user with confirmation
- [ ] Can logout

## Support

If you encounter any issues:

1. **Check Console**: Open DevTools (F12) → Console tab for errors
2. **Check Server**: Verify Apache and MySQL are running
3. **Check Database**: Verify database.sql was imported
4. **Check Credentials**: Verify config/db.php has correct credentials
5. **Check Logs**: Check Apache error logs for more details

## You're All Set! 🎉

Your User Management System is ready to use!

**Next Steps**:
- Test the system with the checklist above
- Customize the design if needed (modify Tailwind classes in HTML)
- Read README.md for full documentation

---

**Need Help?** Refer to README.md for complete documentation.
