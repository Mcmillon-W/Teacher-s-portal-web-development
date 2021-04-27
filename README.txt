PHASE A
This will work best with the XAMPP server to run the portal.
Assuming you have installed XAMPP in the default browser location that is the
local /C: disk

You will have to start the Apache server from the XAMPP control panel.
And drag the www folder to xampp/htdocs

Then type in url of chrome  http://localhost/www/

Select the login.php for the login page
The sample database and tables are provided in the project.txt
Function in the procedure.txt

Simply copy them in sql and run them before trying out the portal

Things you might want to know are

log: login credentials
faculty: personal information of the faculty

PHASE B
Before trying phase-B make your database ready in MongoDB by running the queries in MongoDBqueries.txt.

The personal background information(publications etc) is implemented via NoSQL (MongoDB)
It is linked to the above leave portal (PHASE-A).
To see this instead of url http://localhost/www/
go to this url http://localhost/www/phpmongodb/
then select login.php or any of the faculty webpage by choosing their corresponding php file (eg. Mac.php, ramesh.php, ra.php etc.)
This will include both PHASE-A and PHASE-B.
You can either publicly view the information or login as a particular staff and get the option to update his info (you can't update any other faculty's info. For that you will have to login using his credentials).
After logging in, then the staff can also apply leaves through the leave portal implemented in PHASE-A.
