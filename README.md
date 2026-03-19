HI, I'm Shivam Deb Barman
PHP RESTful API
Overview
This project is a RESTful API built with PHP, designed to provide a simple yet powerful backend for handling CRUD operations. It follows REST principles, using standard HTTP methods (GET, POST, PUT, DELETE) and returns data in JSON format. The API is lightweight, modular, and easy to integrate with web or mobile applications.

Features
The API supports creating, reading, updating, and deleting resources through well-structured endpoints. It includes secure input validation, error handling, and a clean architecture that makes it easy to extend with new functionality. Its design ensures scalability and maintainability, making it suitable for both small projects and larger systems.

Installation
To get started, clone the repository and configure your server (Apache or Nginx) to point to the project directory. Update the database credentials in the configuration file and import the provided SQL schema if available. Once set up, the API will be ready to serve requests from your applications.

API Endpoints
The API exposes endpoints for managing resources. For example, you can fetch all items with a GET request, retrieve a single item by ID, create new items with POST, update existing ones with PUT, and remove items with DELETE. Each endpoint returns structured JSON responses for easy consumption.

Testing with Postman
Postman is an excellent tool for testing this API. After installing Postman, you can create requests to the API by selecting the appropriate HTTP method and entering the endpoint URL (e.g., http://localhost/php-rest-api/api/items). For POST and PUT requests, you can provide JSON data in the request body. Postman will display the API’s response, allowing you to verify functionality quickly. This makes it easy to debug, explore endpoints, and ensure the API behaves as expected.

Future Enhancements
Planned improvements include adding authentication (such as JWT), implementing pagination and filtering, and expanding error handling. Additional features like Docker support and automated testing will further enhance the project’s usability and reliability.



Here’s an example JSON payload you can use with your PHP RESTful API when testing in **Postman**:

### Example: Create a New Item (POST request)
```json
{
  "name": "Sample Item",
  "description": "This is a test item created via Postman.",
  "price": 49.99,
  "quantity": 10,
  "category": "Electronics"
}
```

### Example: Update an Item (PUT request)
```json
{
  "name": "Updated Item",
  "description": "This item has been updated.",
  "price": 59.99,
  "quantity": 15,
  "category": "Electronics"
}
```

### Example: Response from API (GET request)
```json
{
  "id": 1,
  "name": "Sample Item",
  "description": "This is a test item created via Postman.",
  "price": 49.99,
  "quantity": 10,
  "category": "Electronics",
  "created_at": "2026-03-19T14:30:00Z"
}
```

These examples show how you can send data to your API and what kind of structured JSON you might receive back. In **Postman**, you would paste the request JSON into the **Body → raw → JSON** section, then hit **Send** to see the API’s response.  
