# Login-Registration System

A user authentication system implemented using PHP and MySQL, featuring functionalities for user registration, login, profile management, and administrative user management.

## Project Description

This project provides a comprehensive user authentication system that allows users to register, log in, and manage their profiles. Administrators have the capability to view, edit, and delete user accounts, facilitating effective user management.

![Screenshot from 2025-02-18 20-24-15](https://github.com/user-attachments/assets/cd95877c-6011-4140-b1a3-9b5eaad80089)
![Screenshot from 2025-02-18 20-28-29](https://github.com/user-attachments/assets/e33ec21d-dbfd-4389-9d08-14eaf7441a02)
![Screenshot from 2025-02-18 20-38-07](https://github.com/user-attachments/assets/f0ebe186-a232-4698-a0de-2ac5a6e5919c)
![Screenshot from 2025-02-18 20-45-57](https://github.com/user-attachments/assets/65f74b7d-c881-4540-8efa-394dcde4eed5)
![Screenshot from 2025-02-18 20-41-01](https://github.com/user-attachments/assets/b5ad1ea9-9a22-43db-bea3-8205525cc1fc)
![Screenshot from 2025-02-18 20-41-07](https://github.com/user-attachments/assets/ea4556d7-a652-447d-8aab-340c2da9d556)




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
