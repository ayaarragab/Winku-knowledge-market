# Winku Knowledge Exchange Market

Winku is a knowledge exchange platform similar to Quora and StackOverflow. It allows users to register, log in, ask questions, and provide answers in an organized format. The platform includes user authentication, information sharing, and a knowledge exchange mechanism.

## Project Structure
The project was developed using PHP and MySQL, with the XAMPP environment for local development and testing.

## Features
- User authentication: Register and login functionality with database support.
- Knowledge exchange: Users can post questions, provide answers, and engage with other users.
- Database management: Information is stored in a MySQL database, including user credentials and posts.
- Developed locally using XAMPP for easy setup and testing.

## Getting Started
### Prerequisites
- XAMPP (or any LAMP/WAMP environment) installed on your local machine.

### Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/ayaarragab/Winku.git
    ```

2. Start the XAMPP server:
    - Open XAMPP Control Panel and start **Apache** and **MySQL**.

3. Create a MySQL database:
    - Open `phpMyAdmin` in your browser (`http://localhost/phpmyadmin`).
    - Create a new database called `winku_db`.

4. Import the database:
    - Inside `phpMyAdmin`, navigate to the `Import` section.
    - Import the SQL file located in the project repository (`/database/winku_db.sql`).

5. Configure the project:
    - Navigate to the `config.php` file and update the database credentials (host, username, password) to match your local environment settings.

6. Access the project:
    - Open your browser and go to `http://localhost/Winku` to see the application in action.

## Technologies Used
- **PHP**: For backend logic and server-side operations.
- **MySQL**: For database management and storing user information.
- **HTML/CSS**: For the front-end structure and styling.
- **XAMPP**: For local development environment.

## Contributing
Contributions are welcome! Feel free to fork the repository, make changes, and submit pull requests.

## License
This project is open source and available under the [MIT License](https://opensource.org/licenses/MIT).
