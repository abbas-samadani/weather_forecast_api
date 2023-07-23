# Laravel Weather API

This is a simple Laravel API that provides weather information for a given city. The API uses JWT for authentication and interacts with a third-party weather service to fetch the weather data.

## Features
- User authentication with JWT
- Fetch weather information for a given city

## Routes
The API has the following routes:

- **POST /v1/auth/login:** Authenticate a user and generate a JWT
- **POST /v1/auth/user-profile:** Fetch the authenticated user's profile
- **GET /v1/weather/{city}:** Fetch the weather information for a given city

## Controllers
The API has two main controllers:

- **AuthController:** Handles user authentication and profile fetching
- **WeatherController:** Fetches weather information for a given city

## Services
The API uses several services to handle business logic:

- **AuthService:** Handles user authentication
- **WeatherService:** Interacts with a third-party weather service to fetch weather data
- **RapidApiService:** Handles interactions with the RapidAPI service

## Tests
The API includes tests for user authentication and weather fetching.

## Installation
To install the API, follow these steps:

1. Clone the repository
2. Run `composer install` to install the necessary dependencies
3. Copy `.env.example` to `.env` and fill in your database and RapidAPI credentials
4. Run `php artisan jwt:secret` to update .env with jwt secret
5. Run `php artisan migrate` to create the necessary database tables
6. Run `php artisan db:seed --class=UserSeeder` to seed the database with test data
7. Run `php artisan serve` to start the server

## Usage
To use the API, send a POST request to `/v1/auth/login` with the following credentials to authenticate and receive a JWT:

- Email: test@test.com
- Password: testtest

Include this JWT in the Authorization header of your requests to the `/v1/weather/{city}` endpoint to fetch weather information.

## Testing
To run the tests, use the following command:
`php artisan test`

## License
This project is licensed under the MIT License.
