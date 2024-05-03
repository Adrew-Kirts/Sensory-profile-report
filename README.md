# Sensory Profile Report

## Introduction
This Symfony project is designed for generating Sensory Profile 2 reports, including scoring and interpretation. The project utilizes Tailwind CSS and DaisyUI for styling and frontend development.

## Installation
To install and set up the project, follow these steps:

1. Clone the repository:
   ```
   git clone https://github.com/Adrew-Kirts/Sensory-profile-report/
   ```

2. Navigate to the project directory:
   ```
   cd Sensory-profile-report
   ```

3. Install dependencies using npm:
   ```
   npm install
   ```

4. Load fixtures to seed database with the survey questions
   ```
   php bin/console doctrine:fixtures:load --fixtures=src/DataFixtures/SurveyQuestions/
   ```

5. Start the compiler to watch for changes:
   ```
   npm run watch
   ```

6. Run the php server to start the application:
   ```
   php -S localhost:8000 -t public
   ```

Or use Symfony server:
   ```
   symfony server:start
   ```

7. Access the application in your browser at `http://localhost:8000`

## Usage
Once the project is set up and running, you can use it to generate Sensory Profile 2 reports. The application will provide scoring and interpretation based on the sensory profile data entered.

## Handy commands

Clear database `php bin/console doctrine:database:drop --force`

Create database `php bin/console doctrine:database:create`

Migrate migrations `php bin/console doctrine:migrations:migrate`

Load fixtures `php bin/console doctrine:fixtures:load`

Or only load specific fixtures: `php bin/console doctrine:fixtures:load --fixtures=src/DataFixtures/SurveyQuestions/`

## Technologies Used
- Symfony: PHP framework for backend development
- Tailwind CSS: Utility-first CSS framework for styling
- DaisyUI: Plugin for Tailwind CSS providing additional utility classes

## Additional Information
This project aims to simplify the process of generating Sensory Profile 2 reports by providing a user-friendly interface and automated scoring and interpretation functionalities.

Feel free to customize and extend the project according to your specific requirements and use cases.

For any questions or issues, please refer to the project documentation or contact the project maintainer.