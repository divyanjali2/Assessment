# Assessment

In  library management system, I've developed a web application using PHP and MySQL to manage books. The system allows admin to perform various tasks such as adding, updating, and deleting books. I've implemented features like user authentication, data validation, and database interaction using Object-Oriented Programming (OOP) principles. The system consists of multiple PHP files for different functionalities, including signup, login, book management, and database connection. Additionally, I've utilized HTML and CSS for frontend presentation, ensuring a user-friendly interface. Despite encountering some errors, I've demonstrated the ability to troubleshoot and resolve issues, ensuring the smooth operation of the library management system.


username : library
password : admin1234


stmt:Prepared statements help prevent SQL injection attacks by separating SQL code from the data being supplied.


Waterfall Model: This traditional SDLC model involves a linear and sequential approach to development, where each phase must be completed before the next one begins. It typically consists of phases like Requirements Analysis, Design, Implementation, Testing, Deployment, and Maintenance.

code standars
 use PascalCase naming convention, where the first letter of each word is capitalized.
  use of OOP principles with class definitions and methods encapsulating related functionality
  The code is organized into classes and methods, making it modular and easier to maintain.
  Sessions are started using session_start(), allowing for the maintenance of user-specific data across multiple requests.
  Comments
  Code Reusability: The code appears to be designed with reusability in mind, with methods like getTotalBooks(), getAvailableBooks(), and getBorrowedBooks() providing reusable functionality for fetching book statistics.



Class Definitions: You've defined classes such as Admin and Book, encapsulating related functionality within each class.

Encapsulation: Class properties are declared with appropriate visibility modifiers (private, protected), limiting access to those properties from outside the class and promoting encapsulation.

Constructor Method: You've used constructor methods (__construct()) within classes to initialize class properties or perform setup tasks when an object is instantiated.

Method Definitions: Within each class, you've defined methods (functions) such as login() in the Admin class and getTotalBooks(), getAvailableBooks(), getBorrowedBooks() in the Book class to encapsulate specific behavior.

Instantiation: You've created instances of classes using the new keyword, such as $db = new DB(); to create a new database connection instance.

Method Invocation: You've called methods on class instances using the object operator (->), such as $db->getConnection()->query($query);, to invoke methods within the class hierarchy.

Inheritance: While not explicitly demonstrated in the provided snippets, you have the option to utilize inheritance to create specialized classes that inherit properties and methods from parent classes.