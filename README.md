# Project: Authentication with Email Verification and Book CRUD (Service + Repository + DTO Pattern)

## Features Overview

### 1. **Authentication**
- User authentication with email verification.
- Registration, login, and logout functionality.

### 2. **Book CRUD**
- Manage books with the following fields:
  - `title` (translated)
  - `content`
  - `user_id`
  - `images` (polymorphic, includes `icon` image).
- CRUD operations implemented using:
  - Service Layer
  - Repository Pattern
  - Data Transfer Objects (DTO).

### 3. **Advanced Responses and Pagination**
- Structured and detailed API responses.
- Pagination for listing books.

### 4. **Postman Documentation**
- [API documentation created in Postman](https://documenter.getpostman.com/view/39432331/2sAYJAdxZm)

### 5. **Translations**
- Book titles and descriptions support multiple languages.

---

## Prerequisites

### Technologies
- Laravel 11
- PHP 8+
- SQLite/MySQL (for development)

### Setup
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Create a `.env` file and configure the database and mail settings.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```
5. Serve the application:
   ```bash
   php artisan serve
   ```

---

## Project Structure

### 1. **Authentication**
- **Email Verification**: Utilizes Laravel's built-in email verification feature.
- Routes:
  - `POST /register` - Register a new user.
  - `POST /login` - Login.
  - `POST /logout` - Logout.
  - `GET /email-verify` - Verify email.

### 2. **Book Module**
- **Fields**:
  - `title`: Translatable.
  - `content`: Text field.
  - `user_id`: References the user.
  - `images`: Polymorphic relationship supporting multiple images and a distinct `icon` image.
- **Routes**:
  - `GET /books` - List all books with pagination.
  - `POST /books` - Create a new book.
  - `GET /books/{id}` - View a single book.
  - `PUT /books/{id}` - Update an existing book.
  - `DELETE /books/{id}` - Delete a book.
- **Patterns**:
  - **Service Layer**: Handles business logic.
  - **Repository Pattern**: Abstracts database operations.
  - **DTO**: Structures input data.

---

## Implementation Highlights

### Service and Repository Example

#### BookService.php
```php
namespace App\Services;

use App\Repositories\BookRepository;
use App\DTO\BookDTO;

class BookService
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function createBook(BookDTO $bookDTO)
    {
        return $this->bookRepository->create($bookDTO->toArray());
    }

    // Other service methods
}
```

#### BookRepository.php
```php
namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function create(array $data)
    {
        return Book::create($data);
    }

    // Other repository methods
}
```

### DTO Example
#### BookDTO.php
```php
namespace App\DTO;

class BookDTO
{
    public $translations;
    public $user_id;
    public $images;

    public function __construct($translations, $user_id, $images = [])
    {
        $this->translations = $translations;
        $this->user_id = $user_id;
        $this->images = $images;
    }

    public function toArray()
    {
        return [
            'translations' => $this->translations,
            'user_id' => $this->user_id,
            'images' => $this->images,
        ];
    }
}
```

---

## API Responses

### Example Response for `GET /books`
```json
{
    "success": true,
    "message": "Books retrieved successfully.",
    "data": [
        {
            "id": 1,
            "title": "Book Title",
            "content": "Book Content",
            "author": [
                {
                    "name": "Test",
                    "email": "example@gmail.com",
                }
            ],
            "images": [
                {
                    "type": "icon",
                    "url": "https://example.com/icon.jpg"
                },
                {
                    "type": "gallery",
                    "url": "https://example.com/image1.jpg"
                }
            ]
        }
    ],
    "pagination": {
        "total": 100,
        "per_page": 10,
        "current_page": 1,
        "last_page": 10
    }
}
```

---

## Postman Documentation
- The Postman collection file (`postman_collection.json`) is included in the project root.
- Import it into Postman to view and test all API endpoints.

---

## Translations
- Use Laravel's translation files for `title` and `description`.
- Example:
  - `resources/lang/en/books.php`
    ```php
    return [
        'title' => 'Book Title',
        'content' => 'Book content',
    ];
    ```

---

