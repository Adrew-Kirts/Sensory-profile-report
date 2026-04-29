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

Create Admin command
1. Connect to your server
2. Navigate to your project directory
3. Run the command:
```
php bin/console app:create-admin
```
4. Follow the instructions to create a new admin user

## Technologies Used
- Symfony: PHP framework for backend development
- Tailwind CSS: Utility-first CSS framework for styling
- DaisyUI: Plugin for Tailwind CSS providing additional utility classes

## Branch strategy

This repo runs two parallel branches that are intentionally **not merged**:

- **`prod`** — deployed to the VPS at `spr.strikwerda.fr`. Contains `Dockerfile`, `Caddyfile`, `docker-compose.yml` (MariaDB 10.6), and `.github/workflows/deploy.yml` which auto-deploys on push via SSH. This is the source of truth for what runs in production.
- **`dev`** — local development only. Uses `compose.yaml` + `compose.override.yaml` (Postgres 16 + Mailpit) for the local Symfony stack. Never deployed.
- **`main`** — unused legacy branch, kept only because GitHub's default branch points here. Do not commit to it.

### Why the split

The two branches diverged early on (around commit `36dfd21`) when the VPS deployment was set up. `prod` was iterated directly on the server during a debugging spree, while `dev` kept the original Postgres-based local dev environment. The compose files, Dockerfile, and Caddyfile only exist on `prod`; the styling commits exist on both branches but as parallel re-implementations. Trying to merge them now would cause heavy conflicts on infra files for little benefit on a solo side project.

### Working rules

- New code: write on `dev`, run locally against Postgres.
- Shipping to VPS: cherry-pick the relevant commits onto `prod` and push. CI/CD takes over from there.
- Do **not** merge `dev` into `prod` or vice-versa.
- Local DB stack alternative: `mariadb/docker-compose.yml` exists if you want to mirror prod's MariaDB locally instead of the default Postgres compose.

## Additional Information
This project aims to simplify the process of generating Sensory Profile 2 reports by providing a user-friendly interface and automated scoring and interpretation functionalities.

Feel free to customize and extend the project according to your specific requirements and use cases.

For any questions or issues, please refer to the project documentation or contact the project maintainer.