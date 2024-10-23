# NutriPT - Diet Coaching Application

## Introduction

**NutriPT** is a personalized nutrition software developed by **NutriTech**. The application is designed to provide tailored diet plans, track user progress, and assist users with nutrition-related questions through an AI-powered chat interface.

This README file provides an overview of the application, including the purpose, features, setup, and system requirements.

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
- **LLM Integration**: Utilizes LangChain-powered language models for responses.

---

## System Requirements

### Operating Environment
- **Server**: PHP web server
- **Database**: MySQL
- **Client**: Modern web browsers (Desktop, Tablet, Mobile)
  
### Programming Languages and Tools
- **Backend**: PHP, Flask/FastAPI (for AI integration)
- **Frontend**: HTML, CSS (Tailwind), JavaScript
- **AI Integration**: LangChain (OpenAI or Hugging Face models)

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
   git clone https://github.com/YourUsername/nutriPT.git
   ```
2. Set up the MySQL database:
   ```bash
   mysql -u root -p
   CREATE DATABASE nutriPT;
   ```
3. Configure the database connection in `config/config.php`.

4. Install dependencies:
   ```bash
   composer install
   ```

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

## Documentation

User guides and in-app assistance are provided for navigating the application. Detailed documentation is available through the help section of the app and the NutriPT website.

---

## Security and Privacy

- **GDPR Compliance**: All personal data, including passwords and health information, is encrypted.
- **API Security**: External API calls (for the chatbot) are made over HTTPS with secure tokens and keys.

---

## License

This project is licensed under the MIT License.
