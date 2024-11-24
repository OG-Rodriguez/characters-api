# Characters and Movies API

This API allows you to manage characters and movies, including their relationships.

## Endpoints

### Characters

- **Create a Character**
  - **Endpoint**: `POST /api/characters`
  - **Request Body**:
    ```json
    {
      "name": "Neo",
      "movies": [1, 2, 3, 4],
      "picture": "https://example.com/neo.jpg",
      "description": "The One from The Matrix."
    }
    ```
  - **Response**: The created character with a 201 status code.

- **Get All Characters**
  - **Endpoint**: `GET /api/characters`
  - **Response**: A list of all characters with their associated movies.

- **Get a Specific Character**
  - **Endpoint**: `GET /api/characters/{id}`
  - **Response**: The character with the specified ID and their associated movies.

- **Update a Character**
  - **Endpoint**: `PUT /api/characters/{id}`
  - **Request Body** (example):
    ```json
    {
      "name": "Neo Updated",
      "movies": [1, 2],
      "picture": "https://example.com/neo_updated.jpg",
      "description": "The One from The Matrix, Updated."
    }
    ```
  - **Response**: The updated character with their associated movies.

- **Delete a Character**
  - **Endpoint**: `DELETE /api/characters/{id}`
  - **Response**: A message indicating the character was deleted successfully.

### Movies

- **Create a Movie**
  - **Endpoint**: `POST /api/movies`
  - **Request Body**:
    ```json
    {
      "name": "The Matrix",
      "classification": "R",
      "release_date": "1999-03-31",
      "review": "A mind-bending sci-fi classic.",
      "season": "1"
    }
    ```
  - **Response**: The created movie with a 201 status code.

- **Get All Movies**
  - **Endpoint**: `GET /api/movies`
  - **Response**: A list of all movies with their associated characters.

- **Get a Specific Movie**
  - **Endpoint**: `GET /api/movies/{id}`
  - **Response**: The movie with the specified ID and its associated characters.

- **Update a Movie**
  - **Endpoint**: `PUT /api/movies/{id}`
  - **Request Body** (example):
    ```json
    {
      "name": "The Matrix Reloaded",
      "classification": "R",
      "release_date": "2003-05-15",
      "review": "The second installment in the Matrix trilogy.",
      "season": "2"
    }
    ```
  - **Response**: The updated movie.

- **Delete a Movie**
  - **Endpoint**: `DELETE /api/movies/{id}`
  - **Response**: A message indicating the movie was deleted successfully.

## Setup

1. Clone the repository:
    ```sh
    git clone https://github.com/your-username/your-repository.git
    cd your-repository
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Copy the [.env.example](http://_vscodecontentref_/3) file to [.env](http://_vscodecontentref_/4) and update the database configuration:
    ```sh
    cp .env.example .env
    ```

4. Generate the application key:
    ```sh
    php artisan key:generate
    ```

5. Run the migrations:
    ```sh
    php artisan migrate
    ```

6. Serve the application:
    ```sh
    php artisan serve
    ```

## Testing the API

Use Postman or any other API client to test the endpoints.

## License

This project is licensed under the MIT License.