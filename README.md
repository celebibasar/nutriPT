# NutriPT - Diet Coaching Application

## Introduction

**NutriPT** is a personalized nutrition software developed by **NutriTech**. The application is designed to provide tailored diet plans, track user progress, and assist users with nutrition-related questions through an AI-powered chat interface.

This README file provides an overview of the application, including its purpose, features, setup, and system requirements.

---

## Features

### User Management

- **User Registration & Login**: Secure user authentication with password encryption.
- **User Profiles**: Manage personal health data for tailored diet plans.
- **Calendar Integration**: Create and manage diet programs using a calendar interface.

### Meal Plan Management

- **AI-Powered Meal Planning**: Chatbot provides customized meal plans based on user health data.
- **Recipe Storage**: Save and track meal plan recipes.
- **Calorie Calculation**: Reports include calorie values of all ingredients.

### Progress Tracking

- **Diet Progress**: Track weight and adherence to diet programs.
- **Reward System**: Users earn rewards for progress and consistent use.

### AI-Powered Chat Interface

- **Diet Coaching**: Real-time interaction with a chatbot to get diet advice.
- **LLM Integration**: Utilizes Gemini-powered language models for responses.

---

## System Requirements

### Operating Environment

- **Server**: PHP web server
- **Database**: MySQL
- **Client**: Modern web browsers (Desktop, Tablet, Mobile)

### Programming Languages and Tools

- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript
- **AI Integration**: Gemini (LLM-based chatbot)

---

## Installation and Setup

### Prerequisites

- PHP (v7.4 or higher)
- MySQL
- Web browser with modern HTML5 and JavaScript support
- Internet connection

### Installation Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/celebibasar/nutriPT.git
   ```
2. Set up the MySQL database:
   ```bash
   mysql -u root -p
   CREATE DATABASE nutriPT;
   ```
3. Import the database schema:
   ```bash
   mysql -u root -p nutriPT < nutriPT-MySQL.session.sql
   ```
4. Configure the database connection in `config/Database.php`.

5. Run the server:
   ```bash
   php -S localhost:8000
   ```

---

## Usage

- **User Registration**: Create a new account and log in.
- **Meal Planning**: Use the AI-powered chat to create meal plans.
- **Track Progress**: Monitor diet adherence and progress through the user dashboard.

---

## Screenshots from the application

<img width="1440" alt="Screenshot 2025-01-13 at 17 30 45" src="https://github.com/user-attachments/assets/afd1d8d3-c960-4b28-b7ae-defe6ab6fa83" />
<img width="1440" alt="Screenshot 2025-01-13 at 17 30 38" src="https://github.com/user-attachments/assets/bfd705ad-f155-4f12-a16c-8ac365ed77f7" />
<img width="1440" alt="Screenshot 2025-01-13 at 17 30 32" src="https://github.com/user-attachments/assets/5d7c00ff-3004-4bbf-be51-13a3b28a651e" />
<img width="1440" alt="Screenshot 2025-01-13 at 17 30 21" src="https://github.com/user-attachments/assets/db19c8e8-815c-42a1-8e3b-36f96cf469ae" />
<img width="1440" alt="Screenshot 2025-01-13 at 17 30 07" src="https://github.com/user-attachments/assets/5741c37d-52c5-46b2-8f2d-15633f1b46c0" />
<img width="1440" alt="Screenshot 2025-01-13 at 17 29 57" src="https://github.com/user-attachments/assets/d0896909-e034-4db0-acd5-0acb22c17454" />

---

## Documentation

User guides and in-app assistance are provided for navigating the application. Detailed documentation is available through the help section of the app and the NutriPT website.

---

## Security and Privacy

- **GDPR Compliance**: All personal data, including passwords and health information, is encrypted.
- **API Security**: External API calls (for the chatbot) are made over HTTPS with secure tokens and keys.

---

## License

This project is licensed under the MIT License.
