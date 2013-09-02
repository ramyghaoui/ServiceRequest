Web3 Project (Service Request)
------------------------------

“Service Request” is a web application through which users can register a profile of their own, log on to their profile and submit a service request for support on their computers technical issues.

The “Service Request” consists of eleven PHP (Personal Home Page Hypertext Preprocessor) pages (Connect.php, Core.php, Index.php, LogInForm.php, LogOut.php, Main.php, Register.php, RegistrationSuccess.php, Reports.php, ServiceRequest.php, Solution.php), one CSS (Cascading Style Sheet) page (Styling.css) and a MySQL (My Structured Query Language) five tables database (departments, servicerequests, servicetypes, titles, users) defined as follows:

MySQL Database Tables and Fields:
1.	departments: `ID`, `Department`;
2.	servicerequests: `ID`, `Requested_by`, `Urgency`, `ServiceType`, `Problem`, `Status`, `Solution`, `SubmittedDate`, `TimeCost`;
3.	servicetypes: `ID`, `ServiceType`;
4.	titles: `ID`, `Title`;
5.	users: `ID`, `Username`, `Password`, `FirstName`, `LastName`, `E-mail`, `Department`, `Title`;

Styling.css:
The Styling.css page has attributes for headers, body background image, table, table header, table rows, table data and input forms (Select, radio button, input text, text area) styling.

PHP Pages:
1.	Connect.php: it has required credentials (host, user, password, database and error message in case of connection failure) to connect to MySQL Server.
2.	Core.php: it has all functions and it saves the session of the current logged in user for future records and references.
3.	Index.php: the first page that loads when we open the website, you can either log in or register if new user, once registered then logged in you can navigate to Main.PHP page.
4.	LogInForm.php: it is included in the Index.php to provide the user with login ability.
5.	LogOut.php: it will destroy all sessions when users need to log out and redirect to Index.php page.
6.	Register.PHP: is the registration form for new users, once it is filled and submitted to MySQL Database, it will redirect to RegistrationSuccess.php page.
7.	RegistrationSuccess: the purpose of this page is to prevent refreshing on the Register.php and submit the same data repeatedly. It also has a hyperlink that redirect to Index.php page.
8.	Main.PHP: as its name says, it is the main page of the web application through which we can navigate to the different available pages.
9.	ServiceRequest.php: it is the page that allow users to submit any technical issue about their computer, it automatically provide the name of the logged in user, time at which form submitted, it also has a Select input, Urgency radio button and a text area for a description about the problem
10.	Reports.php: in this page, any user can list his own pending requests, solved requests, or both at a time whereas IT personnel are able to fetch any request for all other users.
11.	Solution.php: is available only to IT personnel, it fetches the available requests with “Awaiting” status and displays `ID`, `Requested_by`, `Urgency`, `Status`, `ServiceType`, `SubmittedDate`, `Problem`, `Solution` and will add a `TimeCost` (by hours) when it is submitted to tell how much time it took to get solved.
