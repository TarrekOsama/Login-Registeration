# Login-Registration System

A user authentication system implemented using PHP and MySQL, featuring functionalities for user registration, login, profile management, and administrative user management.

## Project Description

This project provides a comprehensive user authentication system that allows users to register, log in, and manage their profiles. Administrators have the capability to view, edit, and delete user accounts, facilitating effective user management.

## Features

- **User Registration**: New users can create accounts by providing necessary details.
- **User Login**: Registered users can log in using their credentials.
- **Profile Management**: Users can view and update their personal information.
- **Admin Panel**: Administrators can view a list of all users, edit user details, and delete user accounts.

## Installation

To set up this project locally:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/TarrekOsama/Login-Registeration.git
   ```
2. **Navigate to the Project Directory**:
   ```bash
   cd Login-Registeration
   ```
3. **Set Up the Database**:
   - Create a MySQL database named `user_management`.
   - Import the `user_management.sql` file located in the project directory to set up the necessary tables.
4. **Configure Database Connection**:
   - Open the `config.php` file (ensure you have this file for database configuration).
   - Update the database host, username, password, and database name as per your local setup.
5. **Start the Server**:
   - Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP).
   - Start your web server and navigate to `http://localhost/Login-Registeration/login.php` to access the login page.

## Usage

- **Registration**: Navigate to the registration page to create a new account.
- **Login**: Use your credentials to log in.
- **Profile Management**: After logging in, access your profile to view or edit your information.
- **Admin Panel**: Log in as an administrator to manage user accounts.

## Contributing

Contributions are welcome! If you have suggestions for improvements or encounter any issues, please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
