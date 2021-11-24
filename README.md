# getflixproject

## Getting organized (22/11)

### Team members

- Daniel
- Shivani
- Brigita
- Teodora

#### Roles :
Each person is going to do at least a little bit of backend work. However, each team member will put more focus, research and energy into a specific aspect.

- Frontend : Shivani and Teo
- Backend : Brigi and Dan

### Tools :

- Got Trello set up : 
    - To do
    - In progress
    - Complete
- Docker
- VS Code
- Adobe XD

### Languages :
- HTML
- CSS
- Javascript
- PHP
- SQL

---

## Project log

### Day one (22/11) :

Getting set up, dividing up the roles, determining the steps to follow, and our soure of "inspiration" (Netflix).

**Site structure**
- Navigation (Sign in)
    - Logo (left)
    - Sign up + Log In buttons (right)
- Navigation (Main)
    - Logo (left)
    - Genre list
    - Search icon
    - Notifications
    - Profile icon
- Sign up
    - Username
    - Email
    - Password
    - Confirm password
    - Submit button
- Login
    - Username/Email
    - Password
    - Submit
    - Forgot password or id ?
- Main page
    - Once a user logs in, display the movie list, organised by genre (comedy, drama, family)
    - Nav page
    - Horizontal movie lists
        - Hover onmouseover = enlarge
        - Click = overlay with movie information + comments.
- Pass recovery page (random string generator)
- Contact form

- Account page (Settings -> change)
- Footer
    - Contact us
    - Copyright
    - Links to our Githubs.

**Backend work**
- Setting up a Docker environment
    - New .yml file
- Setting up, creating and connecting) a database.

**Frontend work**
- Writing HTML for Sign up and Log in
- Finding a good color scheme

## Day two (23/11) :
**Tasks** :

- Shivani : continue the main page.
- Brigita : method for MySQL, connecting databases, PDO.
- Teo : research on session system (registration, connection/disconnection).
- Dan : more data in database.

**Afternoon meet (13:30)**
- Shivani : 
    - dropdown menus with Bootstrap 5, refine notifications icon on navigation. 
    - Also, body background color more transparent and make titles and images pop more.
    - Footer.
- Daniel : 
    - Database modified + new Account (settings) page. 
    - Light/Dark versions ? Maybe later. 
    - + Local storage.
- Brigita : 
    - PDO vs mySQLi ? What's better/easier so implement ? 
- Teo :
    - Check if field is blank, and/or the email/username already exists. 
    - Tutorials.

## Day three (24/11) :

**Morning meet**
- Make a test.php ? Unit testing
- Adding animations to the pages (achievements)

Tasks :
- Shivani : frontend work on the main page (movie menus, carousel ?);
- Daniel : account page (front and back);
- Teo : testing the login page with the existing database, then research into unit testing and creating a back office.
- Brigita : finishing the contact page + 


## Resources
- https://dev.to/techworld_with_nana/top-8-docker-best-practices-for-using-docker-in-production-1m39
- https://www.section.io/engineering-education/dockerized-php-apache-and-mysql-container-development-environment/

- https://code.tutsplus.com/tutorials/how-to-use-sessions-and-session-variables-in-php--cms-31839
- https://www.youtube.com/watch?v=ShbHwaiyOps
    - Blog post : https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
- https://stackoverflow.com/questions/20397267/alternative-to-localstorage-for-php
- https://designcorral.com/blog/email-already-exists-in-php/
- https://www.formget.com/login-form-in-php/