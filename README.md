# Library Management System
Languages/frameworks used for implementation
PHP- Programming Language 
 MySQL – Database backend 
 HTML- Development of webpages
 Bootstrap – UI – Look and feel 
 
Functionalities
Main Functionalities of our Project are –

As a user
1.) Sessions 
 Users can sign up and login. Once a user logs in he can see the options available i.e., borrow, return, view or search links.

2.) Lent Books: 
 After logging in the user can view the books he/she has already lent by using this link.
 The user once he/she clicks on this link all the books lent are displayed.

3.) Return Books
The user after logging can return the already lent books using this link. 
 Once the user clicks on the link the user is prompted to enter the id of the book he wants to return if the book id entered is already borrowed then it is returned otherwise an error message is shown.
 Once the book is returned the database is also updated accordingly.

4.) Search  
 The user after logging in can search for books.
If the user wants to search for any books then he/she click on this link. Once clicked then the page prompts the user to select the criteria for search, then the user has to enter the value for search based on this the results are returned.
 
5.) Borrow Books
 The user can borrow books using this link.
 Once clicked the user is prompted to enter the id of the book that he/she wants to borrow, if the book is not already borrowed and is available the book is added to the lent list and the database is updated accordingly.

As an admin
1.) Sessions 
 Admin can login. Once the admin logs in he can see the options available i.e., add books, view books, delete books and edit books.

2.) Add Books: 
 After logging in the Admin can add books to the database.
 Once clicked the Admin is asked to enter the details of the book to be added. If there is any error while adding the book an error message is returned.

3.) View Books
 The Admin after logging in can view the list of all books available. 
 Once the Admin clicks on this link all the books available in the database along with all the details are displayed.

4.) Edit books
 The Admin after logging can edit the books already in the database.
Once clicked the admin is asked to enter the id of the book he wants to edit and also the name of the value he wants to edit. Later the new value has to be entered and this change is reflected in the database

5.) Delete Books
 The admin can delete the books from the database.
 Once clicked the admin is asked to enter the id of the book to be deleted if this book is not available then an error message is returned else the book is deleted from the database.
