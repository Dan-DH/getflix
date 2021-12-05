# Getflix project

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
- (Both : everyone !)

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
- PHP (PDO to establish connections with the database + PHP)
- SQL

---

## Project log

### Day one (22/11) :

Getting set up, dividing up the roles, determining the steps to follow, and our soure of "inspiration" (Netflix).

**Site structure**
- Navigation (Sign in)
    - [x] Logo (left)
    - ~~Sign up + Log In buttons (right)~~
- Navigation (Main)
    - [x] Logo (left)
    - [x] Genre list
    - [x] Search icon
    - [x] Notifications
    - [x] Profile icon
- Sign up
    - [x] Username
    - [x] Email
    - [x] Password
    - [x] Confirm password
    - [x] Submit button
- Login
    - [x] Username/Email
    - [x] Password
    - [x] Submit
    - [x] Forgot password or id ?
- Main page
    - [x] Once a user logs in, display the movie list, organised by genre (comedy, drama, family)
    - [x] Nav page
    - [x] Horizontal movie lists (carousels for each genre + popup boxes for each movie)
        - Hover onmouseover = enlarge
        - Click = overlay with movie information + comments.
- [x] Pass recovery page (random string generator)
- [x] Contact form

- [x] Account page (Settings -> change)
    - Achievements (later added);
- Footer
    - ~~Contact us~~
    - [x] Copyright
    - [x] Links to our Githubs.

**Backend work**
- [x] Setting up a Docker environment
    - New .yml file
- [x] Setting up, creating and connecting to a database.

**Frontend work**
- [x] Writing HTML for Sign up and Log in
- [x] Finding a good color scheme

## Day two (23/11) :

**Tasks :**

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

**Tasks :**
- Shivani : frontend work on the main page (movie menus, carousel ?);
- Daniel : account page (front and back);
- Teo : testing the login page with the existing database, then research into unit testing and creating a back office.
- Brigita : finishing the contact page.

**Technical difficulties :**
- Establishing a connection to the database with PDO -> switch to mysqli, which led to some more difficulties in terms of which parameters and their values to insert in that line of code.
- Creating a "carousel" (or similar) display on the main page that would allow one to navigate one row of movies.
- Pending : having access to the main page once the correct data is input.

## Day four (25/11) :

**Morning meet**
- Brigita : finish the Contact page (PDO vs mysqli);
- Daniel : creating APIs
- Shivani : continuing the home page
- Teo : testing the login and logout, then adding data on the signup.

**Afternoon meets**
- Technical challenges :
    - [ ] Connecting the database to the contact page to save comments ;
    - Connecting the database to the login page ; 
    - Connecting db to the API page.
    - How to incorporate and view the movies according the genre ;
    - Problems with password encryption interfering with logging in ;
    - [x] Making the 'test.php' completely inaccessible if there's no one logged in ; 
    - [x] Making the correct messages appear on the sign in page, if the information is already taken.

## Day five (25/11) :

- Teo : keep the user logged in, even after refreshing the page + adapt to PDO.
- Shivani and Dan : transfer data from movie API to our database, and then get it back to the main page + search page.
- Make a proper welcome page that includes the sign up form but also a "sneak peek" into what the site offers.

## Day six (26/11) : 
Technical issues : lost in PDO translation, error messages popping up, buttons not working properly (redirecting to irrelevant pages).

## Day seven (29/11) :
Some technical issues resolved over the weekend : managed to make buttons work properly to direct to relevant pages, log in and sign up pages still connected to database + account page (though still some issues with the proper display of error messages ; resolved in the afternoon).
Style changes : log in and sign up buttons removed from the navbar as they are redundant.
Deployment strategy : how can we use Heroku to deploy our final site ?
Movie list API ! how to use SQL SELECT or other methods to sort and categorise movies based on gerne + avoid duplicates ?

## Day eight (30/11) : 
Create a welcome page that will introduce first-timers to our site (see Netflix).
Duplicates being resolved.
PDO connection established well with account and contact page (+ styles accepted).

## Day nine (01/12) :
- Write code for the comment section
- Finish all the PDO files
- Redeploy site on Heroku with PDO files

- Pop up info
- Deployment : Heroku unable to deploy all our pages properly (only the login appears as an 'index' file). Decision to forgo using Heroku as a deployment host and switched to atwebpages.
- Achievements
- Search filter
- PHPmailer

## Day ten (02/12) :
Pursuing the same tasks from the previous day.
Lots of difficulties encountered with creating the search page to display results after a user inputs a keyword in the searchbar. Mainly, these issues had to do with proper connection to the database, display of correct and corresponding information on the interface, and linking the pages together. In the latter situation, the headers that allow to page redirection seemed to be all over the place, and it seems that 'exit()' should have been implemented as a 'best pratice' in general, but also apparently to avoid this kind of error. The solution implement was to create new PDO connections on certain pages, though that might also contribute to the same error or produce a new kind. At any rate, this newly discovered 'best practice' will be implemented in future projects.
Finally reached a point where the code links the main page to the search-results page, while also displaying the data in the wanted form and layout (a few adjustments were made to accomodate for responsiveness, still in progress). The searchbar, however, seemed to work only on local device and in one account. Corrections to follow...

Another technical difficulty related to the mailer and 'forgot password' functions, particularly the fact that most tutorials that were looked up used mysqli instead of PDO. Most of the documents (main, contact, account, log in and sign up) were fairly easy to 'translate' into PDO (having been initially written in mysqli), resulting in a secure connection (and perhaps more secure code overall).

## Day eleven (03/12) :
Corrections to the searchbar and search-results page : fruitless morning retracing steps taken and comparing code. However, later adjusted the fetch function and the foreach loop querying through the database, and now the search engine works well across all users and local machines once pulled from the repo. A few more responsive design adjustments followed.

Pursuit of the mailer and forgot password feature ; more translation problems, new tutorials specific to PDO + advice from other colleagues attempted.
PHPmailer functioning.

## Final weekend push (04 and 05/12) :
- Forgot password page and functions verified.
- PHP mailer verified.
- Code reviewed in the validation tools.
- Final responsive touches to the layout of each page : navigation, footer, button and logo sizes.
- Popup boxes for each movie in the carousel.

---

## Resources
- https://dev.to/techworld_with_nana/top-8-docker-best-practices-for-using-docker-in-production-1m39
- https://www.section.io/engineering-education/dockerized-php-apache-and-mysql-container-development-environment/

- https://code.tutsplus.com/tutorials/how-to-use-sessions-and-session-variables-in-php--cms-31839
- https://www.youtube.com/watch?v=ShbHwaiyOps
    - Blog post : https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
- https://stackoverflow.com/questions/20397267/alternative-to-localstorage-for-php
- https://designcorral.com/blog/email-already-exists-in-php/
- https://www.formget.com/login-form-in-php/
------------------
- https://flickity.metafizzy.co/ for carousel - Javascript library

- https://www.w3schools.com/howto/howto_js_password_validation.asp
- https://www.codespeedy.com/create-a-simple-contact-form-in-php-mysql/


- https://www.studentstutorial.com/php/login-logout-with-session
- https://www.studentstutorial.com/php/login-logout-with-session

- https://www.w3schools.com/PHP/php_sessions.asp
- https://www.w3schools.com/php/php_mysql_connect.asp
- https://stackoverflow.com/questions/33368507/how-to-stay-signed-in-even-after-clicking-refresh-button
- https://phpdelusions.net/pdo

- https://www.php.net/manual/fr/pdo.query.php
- https://forums.commentcamarche.net/forum/affich-19242774-l-equivalent-de-mysql-query-avec-pdo
- https://stackoverflow.com/questions/26137972/php-pdo-alternative-for-mysqli-num-rows

- https://www.sqlshack.com/different-ways-to-sql-delete-duplicate-rows-from-a-sql-table/
- https://www.sqlservertutorial.net/sql-server-basics/delete-duplicates-sql-server/
- https://www.mssqltips.com/sqlservertip/4486/find-and-remove-duplicate-rows-from-a-sql-server-table/

- https://stackoverflow.com/questions/34578093/forgotten-password-script-with-pdo-decrypt-needed
- https://www.dailyaspirants.com/2020/10/how-to-get-forgot-password-and-reset-password.html
- https://thisinterestsme.com/php-reset-password-form/

- https://www.youtube.com/watch?v=Zm1T3YBZtP0

- https://devcenter.heroku.com/articles/local-development-with-docker-compose
- https://www.freecodecamp.org/news/how-to-deploy-an-application-to-heroku/
- https://developers.themoviedb.org/3/getting-started/introduction to import movie list into our database
- https://www.google.com/search?q=cinema+background&tbm=isch&ved=2ahUKEwiv9qyI77_0AhVL2KQKHVBFC3cQ2-cCegQIABAA&oq=cinema+background&gs_lcp=CgNpbWcQAzIECAAQQzIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDoHCCMQ7wMQJ1CsCVj8IGD0I2gBcAB4AIAB1QGIAeQPkgEGMTIuNi4xmAEAoAEBqgELZ3dzLXdpei1pbWfAAQE&sclient=img&ei=g_ulYe-oHsuwkwXQiq24Bw&bih=875&biw=1760&client=firefox-b-d#imgrc=0i6WXUNI9UXzfM

- https://www.sourcecodester.com/tutorials/php/13884/php-search-filter-using-pdo.html

- https://www.youtube.com/watch?v=OL-nSfHquUE
- https://www.youtube.com/watch?v=maYnD0Sdr7c