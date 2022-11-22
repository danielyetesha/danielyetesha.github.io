UNIVERSITY OF GONDAR
COLLEGE OF INFORMATICS
DEPARTMENT OF COMPUTER SCIENCE
INDUSTRIAL PROJECT ENTITLED
“ONLINE TICKET RESERVATION SYSTEM FOR GONDAR CINEMA”
BY
GROUP MEMBER						ID
1.	DANIEL YETESHA							02731/11
2.	TADELE DAGNAW							02692/11
3.	BEREKET ZERIHUN						02660/11
4.	YILHAL ESKEZIAW						01432/10
5.	SOLOMON GETANEH						02702/11
UNDER THE GUIDANCE OF INSTRUCTOR HAILU
Submitted to the Department of computer science, college of Informatics, University of Gondar, in meeting the preliminary project requirement for partial fulfillment of the award of bachelor of science degree in computer science.
Gondar, Ethiopia
Date/Year: June 2/2022
 
DECLARATION
This is to declare that this project work which is done under the supervision of Mr. Hailu and having the title online ticket reservation system for Gondar cinema is the sole contribution of:
Daniel Yetesha 
Tadele Dagnaw 
Bereket Zerihun
Yilhal Eskeziaw
Solomon Getaneh
No part of the project work has been reproduced illegally (copy and paste) which can be considered as plagiarism. All referenced part has been used to argue the idea and have been cited properly. We will be responsible and liable for any consequence if violation of this declaration is proven.
Date:  ____________________
Group members:
Full name							signature
1.	Daniel yetesha					__________________
2.	Tadele Dagnaw 					__________________
3.	Bereket Zerihun					__________________
4.	Yilhal Eskeziaw					__________________
5.	Solomon Getaneh					__________________
 
CERTIFICATE
This group project entitled “online ticket reservation system for Gondar cinema” has been read and approved as meeting the preliminary project requirements of the department of computer science in partial fulfillment for the award of Bachelor of Science degree in computer science., University of Gondar, Gondar, Ethiopia
Approved by:
1.	Name of advisor: ________________________  signature :¬¬¬¬¬-_________Date:___________

2.	Name of project coordinator: _________________signature: _________Date:_________
 
ACKNOWLEDGEMENT
First and for most we are ever grateful to our God because nothing could be possible without his free will, keep our safe, give power and energy and help us to finish this project successfully. Next the project team expresses their heart full appreciation and owes a deep sense of gratitude to the project advisor Mr. Hailu for his professional support and encouragement throughout this project. Our efforts would not have been successful without the guidance of advisor Mr. Hailu useful inputs, helpful comments, insightful comments and most of all his patience with our group from the beginning to the end of the project work. Also, the project team proud privilege to release the feeling of our gratitude to the manager and workers of Gondar cinema who provide the necessary information, encouragement and comments. And thirdly we would like to thank several students who helped us directly or indirectly to conduct this project work. Finally, we would like to thank University of Gondar Department of Computer Science project committee for their contribution to the achievement of our project by loss their time in order to create a suitable condition to do our project.





 
TABLE OF CONTENTS
DECLARATION	i
CERTIFICATE	ii
ACKNOWLEDGEMENT	iii
TABLE OF CONTENTS	iv
LIST OF FIGURES	vii
LIST OF TABLES	viii
ACRONYMS	ix
ABSTRACT	x
CHAPTER ONE	1
1.	INTRODUCTION	1
1.1	Introduction	1
1.2	Organizational background	1
1.3	Statement of the problem	2
1.4	Objectives of the project	2
1.4.1	General objectives	2
1.4.2	Specific objectives	2
1.5	Methodology	3
1.5.1	Data collection techniques	3
1.5.2	System development methods	3
1.5.3	System development tools	4
1.6	Testing Methodology	5
1.6.1	Unit testing	5
1.6.2	Integration testing	6
1.6.3	Acceptance testing	6
1.7	Scope of the project	6
1.8	Limitation of the project	7
1.9	Significance of the project	7
1.10	Feasibility Study the System	7
1.10.1	Operational Feasibility	7
1.10.2	Technical Feasibility	8
1.10.3	Economic Feasibility	8
1.10.4	Schedule Feasibility	8
1.11	Management issue	9
1.11.1	Team configuration and management	9
1.11.2	Communication plan	9
CHAPTER TWO	10
2.	REQUIREMENT ANALYSIS	10
2.1	Current System Description	10
2.1.1	Major function of current system	10
2.1.2	problem of existing system	11
2.2	Requirement gathering	12
2.2.1	Requirement gathering methods	12
2.2.2	Business rules	12
2.3	Proposed system description	13
2.3.1	Overview	13
2.4	Functional requirements	14
2.5	Nonfunctional requirements	15
CHAPTER THREE	17
3.	SYSTEM MODEL	17
3.1	Scenario	17
3.2	Use cases	20
3.2.1	Actor Identification	20
3.2.2	Usecase Identification	20
3.3	use case diagram	21
3.3.1	Usecase description	22
3.4	Activity diagram	32
3.5	Object model	37
3.5.1	Data dictionary	37
3.6	Class model	42
3.7	Dynamic model	44
3.7.1	Sequence diagram	44
3.8	User interfaces	50
3.8.1	Welcome page	50
CHAPTER FOUR	51
4.	SYSTEM DESIGN	51
4.1	Introduction	51
4.2	Current software architecture	51
4.3	Proposed software architecture	51
4.4	Subsystem decomposition	52
4.4.1	Component diagram	53
4.5	Hardware/software mapping	54
4.6	Persistence data management	55
4.7	Access control and security	56
4.8	Detailed class diagram	57
4.9	Package diagrams	59
4.10	Deployment diagram	60
5.	CONCLUSION	61
6.	RECOMMENDATION	62
7.	APPENDIX	63
8.	REFERENCES	63

 
LIST OF FIGURES
Figure 1 1 : gantt chart for project schedule	8
Figure 3 1: usecase diagram for the system	22
Figure 3 2: Activity diagram for register	32
Figure 3 3: Activity diagram for login	33
Figure 3 4: Activity diagram for manage movies	33
Figure 3 5: Activity diagram for reserve ticket	34
Figure 3 6: Activity diagram for manage movie schedule	34
Figure 3 7: Activity diagram for Recharge balance	35
Figure 3 8: Activity diagram for view report	35
Figure 3 9: Activity diagram for send comment	36
Figure 3 10: Activity diagram for manage employee	37
Figure 3 11: Class diagram	43
Figure 3 12: Register Sequence Diagram	44
Figure 3 13: login sequence diagram	45
Figure 3 14: Reserve ticket Sequence Diagram	46
Figure 3 15:  Manage movie schedule Sequence Diagram	47
Figure 3 16: Employee Manage Sequence Diagram	48
Figure 3 17: Recharge balance Sequence Diagram	49
Figure 3 18 : welcome page UI	50
Figure 4 1: software architecture	52
Figure 4 2: component diagram	54
Figure 4 3: Deployment diagram for hardware and software mapping	55
Figure 4 4: Persistent data model diagram	56
Figure 4 5 : Detail class diagram	58
Figure 4 6: Package diagram	59
Figure 4 7 : Deployment diagram	60


 
LIST OF TABLES
Table 1 1: team configuration and management	9
Table 3 1 : UC Register	23
Table 3 2 : UC Login	24
Table 3 3 : UC Manage movies schedule	25
Table 3 4 : UC Reserve seat	26
Table 3 5 : UC Recharge balance	27
Table 3 6 : UC Manage movie	28
Table 3 7: UC Change username and password	28
Table 3 8: UC View report	29
Table 3 9: UC Manage employee	30
Table 3 10: UC Send comment	30
Table 3 11: UC Manage comment	31
Table 3 12: UC Edit cinema information	31
Table 4 1: Access control	57

 
ACRONYMS
CSS: - cascading stylesheet
HTML: - hypertext markup language
JS: - javascript
LAN: - local area network
MAN: - metropolitan network
MTD :-Movie Ticket Dispenser
PC: - personal computer
UML: - unified modeling language
UC: - use case
VS-code:-  visual studio 
WAN: - wide area network
 
ABSTRACT
Gondar cinema is one of popular cinema hall found in Gondar city. It offers different types of movies with different languages to satisfy the needs of customers. However, the Gondar cinema ticket reservation system uses manual operation. Because of this manual system there are so many difficulties on its performance in terms of effectiveness and efficiency. Some of those difficulties are customer cannot reserve ticket online before going to the place of the cinema, cannot accesses cinema movies schedule and cinema movies schedule do not advertised properly, it is difficult to generate report, time consuming and there is some sort of data redundancy. Additionally, the manual system only provides text-based interface, which is not as user-friendly as Graphical user Interface. So the project we are going to develop will try to address those problems in general and provides prototype of the system. Because the system to be developed is online, it includes online reservation ticket based on payment status of the customer, accessing movies schedule of the cinema without time consuming, easy report generation and interactive user interface.


 


 
CHAPTER ONE 
1.	INTRODUCTION
1.1	Introduction
The entertainment industry is one of the most profitable sectors in the business world. People always spent money for being entertained, and so will they in the future. [1] The only problem is how people get to know about all the currently presented movies as well as the future ones, and then, in case they know, how they can get tickets. This problem used to be solved by theaters’ ticket kiosks at the Showtime or by phone reservation which are in most cases restricted by time, location, and most important by availability of tickets. Because of that reason our document will describe the implementation details of a Movie Ticket Dispenser (MTD). The system will allow the user to buy tickets online for movies that are either stored in the system’s own database or available using web services offered by the Entertainment companies. Bookings can be made independent of time and location. 
 Cinema ticket reservation system aims at creating awareness and helping cinema customers on how to make bookings and reservation for cinema and to minimize the hassle of travelling down to the cinema location before making reservations and queuing up for tickets to avoid congestions. This involves making the customer aware of seat reservation schemes. Cinema Ticket reservation system achieves this using cinema booking software, which will contain various events that result into a graphical interface booking system which even special people can make reservations. This project makes it easy to make reservations for users to watch a movie at will anytime they want and anywhere they choose as long as they are connected to the Internet instead of travelling down to the booking center and this is time wasting., help confirm reservations and educate the customers on how to book cinema ticket, and seat reservation online in such a way that the congestion involved would be reduced. Online cinema ticket booking system is needed in order to run a check on the authenticity of the tickets to avoid fraud manipulated booking. 
1.2	Organizational Background 
Gondar main cinema was established before 80 years ago in 1948 by Italians and now the cinema is administered under a civil service named culture and tourism bureau. In the period of derg government the cinema was a branch of national theatre of main Ethiopia cinema. The cinema is consisted of 830 chairs, 2 projectors, 3 speakers and a stage in the main room and seven offices. It offers Amharic, English, Indian movies for customers. The cinema is popular in the city because of it offers different types of movie every day with beautiful seats; especially when there is a new movie show. In addition to that the cinema serves for showing foot ball matches, and for world tekuando graduation. The service time of the cinema is from 8:00 am – 12:00 am. This cinema house uses manual technique for booking tickets. It also use speaker, generator and minibus for adverting movies. [2]
To overcome this old system many students, create the online ticket reservation system for the cinema. But the company didn’t satisfied by their project because of the ugly interface they used, the expense of their project implementation and also they can’t digitalize the payment. 
1.3	Statement Of The Problem
 Gondar cinema currently uses a manual system. This manual system is very time consuming and Weak. This system is more prone to errors and sometimes the approach to various problems is unstructured.
The following questions need to be considered when starting out the problem.
	Can the use of manual operation be more efficient and time consuming during booking of a seat for a movie?
	Can the manual operation be able to reach operation standards of the movie theatre management in terms of speed and/or when there is increase in demand?
	Can it be able to detect any efficiency such as fraudulent activity by the employee and give proper account of the daily transaction?
Therefore in order to overcome those problems, we develop the web-based system that enables customers and the cinema house to perform different activities over the internet.
1.4	Objectives Of The Project
1.4.1	General Objectives
The general objective of this project is developing an online ticket reservation system for Gondar Cinema Hall. 
1.4.2	Specific Objectives
For the development of the general objective we have to follow the following specific objective:-
	Understand the current manual system of the organization.
	Gather requirement:- collect the requirement from the stake holder and customers.
	Analyze requirement:- specify the functional and non functional requirement.
	Design the system:- outline the structure of the system.
	Implement the system:- coding the designed system.
	Test the system: debugging the system if any error and problem occurred.
	Deployment: change the project into the real life and solve the problem.
1.5	Methodology
A system development methodology is a series of processes leads to the development of an application. This describes how the work is to be carried out to achieve the original goal based on the system requirements.
1.5.1	Data Collection Techniques
The Method and techniques used to analyze the existing system and designing electronic system includes, interview and observation. Those methods which help us to gather the required data to analyze our project and those methods selected due to the time and the organization’s willingness. 
	Interviewing:  This methodology encapsulates two types of methods. These methods are closed and open interview. So we select an open interview for interviewing the manager and employees for recognizing the existing working procedure of the organization. So we were able be to gather more information about the organization and requirements.
	Observation: - use this method to get the right information about the organization and also understand how the existing system works.
	Documentation:- reading the documentation available in the organization and read projects worked on the Gondar cinema.
1.5.2	System Development Methods
To design the system We used object-oriented methodology instead of structured approach, since it is more acceptable due to its great advantage of modularity, inheritance, and persistence. The project also chooses agile model because of its various advantage.
These are:-
	It is flexible and adaptable approach in lowering costs, improving quality ,increase customer satisfaction.
	The product is developed fast and frequently delivered.
	Regular adaptation to changing circumstances.
1.5.3	System Development Tools
for the development of the project we use these software and hardware tools.
1.5.3.1	Hardware tools
	Personal computer (PC) with 4GB ram: almost all tasks of our project are performed on computer.
	Flash disk: required for data movement to store & transfer data from one PC to another PC.
	Disks (hard disk): necessary for the movement of relevant data and for backup and recovery mechanism and version control.
	Network cable: It helps us to extract relevant information about our project from internet.
1.5.3.2	Software tools
	Modeling:- we use Microsoft visio for drawing unified modeling language(UML) diagram because it has the following features:
o	Have the complete flexibility of getting productive quickly using standard templates.
o	The interface is quite intuitive.
o	It has no watermark and it has free version.
	Server side scripting:- PHP is used for handling the server side scripting. It is powerful and the widely used , free , and efficient alternative tool for making dynamic and interactive webpages.it has the following advantages:-
o	Support object oriented programming
o	It provide flexible and efficient set of security
o	PHP supports many databased(MYSQL, Informix , Oracle , Sybase , Solid , PostgreSQL …)
o	It is an open source and free to download and use
	Client side scripting:- JavaScript , because it has the following major characterstics
o	JS was designed to add interactivity to HTML pages
o	It is a lightweight programing language
o	JS is usually embedded directly into HTML pages
o	Everyone can use JavaScript without purchasing a license
o	Popular
	Web Interface Design
o	HTML – hypertext markup language, the language behind the appearance of documents on the web.
o	CSS – cascading style sheets, a set of styles that control the formation of a web page
	Server – WAMP server can be used for the running of the project. It has the following features:-
o	WAMP is stand for Windows, Apache, MySQL, and PHP
o	It used for developing dynamic internet web pages
o	Easy to install
o	WAMP comes in the form of package that binds the bundled programs together so that you don’t have to install and set them up separately
	Text Editors – VS-code, it stands for visual studio. We prefer these technologies because they contain the following features:
o	It is freely available
o	It support multiple programming languages
o	It support for web application
1.6	Testing Methodology
After a successful completion of developing the software, we must test it for its correct functionality according to customer requirement and scope boundaries. A testing method that we use in this project includes: 
1.6.1	Unit Testing	
We select sample code (one function or module) and run it separately to look its correct functionality.
1.6.2	Integration Testing	
When a number of components are complete; it will test to ensure that they integrate well with each other the operating system and other components.
1.6.3	Acceptance Testing
This testing is done by the customer (on-behalf) to ensure that the delivered product meets the requirements and works as the customer expected.
1.7	Scope Of The Project
The scope of this project is to provide an easy option for the customer who is willing to reserve tickets online for a movie. It saves time and customer ups and downs. On the other hand half of the tickets of the cinema hall have been provided for booking online. System can be accessed anywhere who has net connection at any time of day or night, thus providing customer’s comfort. 
The customers can buy ticket online through the use of net connection. To make the system more user friendly, the customer need not enter lots of data. And a step by step guideline should be given to the customer to complete the buying process.
Registration: - 
	The web page will be generated automatically according to the data in database.
	A way in which the customer can create its own account (member registration).
	A way in which the users (both customer, employee and administrator) can login to the system to perform different operation.
	A way in which the customer can modify its own data.
The buying Ticket steps are: 
	 Firs the customer buy coupon card.
	Then the customer is log in to the Gondar cinema website
	Customer choose the movie and time 
	By clicking reserve ticket button choose the seat.
Payment: -
	To enable the customer to reserve the ticket online, the system uses YenePay payment getaway which has many option to pay and it integrate our system to different bank of Ethiopia.
	 A customer initiates the payment process by clicking on the pay with YenePay button from the cinema website, [3]
	the customer is then redirected to YenePay’s checkout page and will requested to login with their YenePay account. Once authenticated, payment method alternatives are shown for selection. [3]
	The customer select from the available payment methods. The customer will complete the payment using the preferred payment method. The payment procedures depend on the selected payment method. [3]
	When the payment is verified, the platform will send an Instant Payment Notification (IPN) to the website [3]
1.8	Limitation Of The Project
There are some important features need to be included but not incorporated or covered in this project and considered as the limitations of the project due to time and resource constraints. These are:
	Ticket cancelation is not possible
	The system does not support any language rather than English.
1.9	Significance Of The Project
The significance of this project is primarily to improve the manual system into computerized system. The main purpose of online ticket reservation system is to provide another way for the customer to buy cinema ticket. The Ticket Reservation System is an Internet based application that can be accessed throughout the Net and can be accessed by anyone who has a net connection. It is an automatic system, where we will automate the reservation of tickets and enquiries about availability of tickets. After inserting the data to database, employee need not to worry about the orders received through the system and hence reduces the manual labor.
1.10	Feasibility Study The System
The feasibility study is the preliminary study that determines whether a proposed system project is financially, technically and operationally viable. Feasibility study is essential to evaluate the cost and benefits of the new system. The alternative analysis usually include as part of the feasibility study, identifies viable alternatives for the system design and development.
1.10.1	Operational Feasibility
The system to be developed will provide accurate, active, secured service and decreases labor of workers and also it is not limited to particular groups or body. The system will easily operational, as it doesn’t affect the existing organizational structure. So the system will be operationally feasible.    
1.10.2	 Technical Feasibility 
The system to be developed by using technological system development techniques such as PHP, Java script, CSS and Mysql database without any problems and the group members have enough capability to develop the project. Our focus is to develop well organized dynamic web site that is technically efficient and effective for managing the cinema ticket reservation system. Therefore it can be conclude that the system is technically feasible.
1.10.3	Economic Feasibility
The system to be developed is economically feasible and the benefit is outweighing the cost. Since this project already computerizes the existing system, by now the reduction of cost for materials used in manual operation becomes beneficiary to the organization.
1.10.4	Schedule Feasibility 
Schedule feasibility determines whether the proposed system will be completed on the given schedule or not. Whatever the scarcity of time given for the project by the internal motivation and potential of the team members of the project, we surely expect the project will be completed on time.
 
Figure 1 1 : Gantt chart for project schedule
1.11	Management Issue
1.11.1	Team Configuration And Management
This technique is used for managing the project team for effective team performance. The team configuration refers to the members of the team which is determined by the active and passive languages of the meeting and participation of the group often referred to as managing strength, team configuration in the narrow sense refers to the team strength that is the number of interpreters required for a given team depending on the language used. We are five team members that do this proposal.
GROUP MEMBERS	                     TASKS
Daniel yetesha	Project manager
Tadele Dagnaw	System designer
Bereket Zerihun	User interface designer 
Yilhal Eskeziaw	Requirement analyst
Solomon Getaneh	System building and tester
Table 1 1: team configuration and management
1.11.2	Communication Plan
While developing software or doing projects in group it is common to have a group norm and agreements which will lead the group to the successful accomplishment of the project. We are trying to work in team with one heart and soul so that we can accomplish our project on time with the expected quality. Based on the schedule suggested by the department together with our schedule we will contact our advisor in every phase and take correction and guideline for our project.
 
CHAPTER TWO
2.	REQUIREMENT ANALYSIS
Web-based ticketing system refers to the use of technology in buying tickets for the interested movie and theater. There are several aspects to describing the intellectual and technical development of web-based online cinema ticket booking
Online movie ticket reservation system is the process in which a customer can purchase her/his movie tickets directly by using the Internet. Online movie ticket booking system is measurable, cost effective and has very good user interface. This web based project provides the all working of the online Movie Ticket Booking System. Online movie ticket booking system is useful for both cinema service providers and customers equally. Customers can buy movie tickets online at any instance of 24 hours a day. And as this is a web based application therefore they can buy ticket from anywhere around the world Customers with cinema website to know about new movies, showing timings and cinema locations.
2.1	current System Description
2.1.1	Major Function Of Current System
The existing system of Gondar cinema is totally manual. Customers who want to watch movies or theater must go to the cinema house to get their cinema tickets. Advertisement and promotion of films to be shown is by posting film posters on market strategic areas in the town. The delivery of information for the different customers, communicating and information sharing are operated manually by individual and group of people. In such situations many customers involved in the process of managing the whole activities in such a way that to sharing information such as new released cinema its quantity and the show date and time of the cinema  all these things have to be carried out manually in content handling and managing is also a problem. Sometimes user might not available in the customer service in such situations people get abused. 
In the existing system, the Customer has to visit cinema hall for booking seats. Further they do not even have the information about the Movie which is in the cinema hall, its show time and different rates of the ticket. Even the customer may not be able to get information about different cinema hall available in the city. So, if he/she wishes to see a Movie on a particular day he/she has to first travel around the city to find out where it is being shown at the specific time.
The work flow in the existing system is performed starting from the top level cinema manager to lower level of the ticket seller person. The manager can get movies from film directors and he makes some arguments with film directors. The ticket seller seat in the door and make sell a ticket for customers and the ticket receiver. Receive tickets from customers then the seat shower directs the customer to proper seat.
















2.1.2	Problem Of Existing System
currently Gondar cinema use a manual system. Due to this cause, the cinema is under several problems that negatively affects the reliability, performance, efficiency and effectiveness of day to day activities. 
Some of the major problems are: -
	Since the system is implemented in Manual, so the response is very slow and has poor performance.
	The transactions are executed in off-line mode, hence on-line data capture and modification is not possible.
	Difficulty in providing appropriate Cinema information for customer.
	Difficulty in updating information system (getting information about the movie newly released and when (the date and time) the movie will be shown)
	Wastage of time ,money and human power
	The selling, buying and management is manual. 
	Recording or capturing Movies‘ information is manual 
	The present system is very less secure. 
	It is unable to generate different kinds of report. 
2.2	Requirement Gathering
2.2.1	Requirement Gathering Methods
We used different techniques to make this project complete well. The technique is used to achieve the objective of the project that will accomplish a perfect result. In order to perform this project, the fact-finding techniques we used are:-
	Interviewing:  It is the primary technique used to elicit the necessary information. During the data gathering time the hall administrator head of Gondar cinema and the ticket seller gives us valuable information about the overall activity of Gondar cinema, concerning on how they sell the ticket and the show time of the movies.
	Observation: - we will observe how the staff members are using their current system and try to find out some shortcomings related to the existing system. This method is best to find out the real drawback of the existing system as it demonstrates the real operation of the system and where the problem lays. We also observes that the customer able to reserve tickets only by going to the cinema house physically.
2.2.2	Business Rules
1.	The system may not accept customer, Employee and administrator without customer name and password.
Description:   customer, Employee& administrator can access the system when they enter valid customer name and password. Unless access will be denied.
BR1.	customer Employee &administrator cannot do anything without logging into website by using their customer name and password.
BR2.	If these accessing the system are new they should fill sign up form.
BR3.	after the system validate all necessary information then it will be accessed
2.	Only the authorized Employee has the responsibility to manage movies
Description: Except the Employee, no one can add, delete, and update movies schedule.
BR1.	Employee should log into Employee page own page with valid customer name & password.
BR2.	System must verify whether he/she is authorized Employee. 
BR3.	The Employee can advert movies ,add schedule, update information delete old schedule and movie.
3.	Only the administrator has the responsibility to manage Employee and customer
Description: Except the administrator, no one can add, delete, and update Employee and customer
BR1.	Administrator should log into administrator page own page with valid administrator name & password.
4.	Ticket is valid only in date
Description: once the ticket has been reserved it is valid only for one day. It cannot be refundable.
5.	Sold ticket is not returned
Description: once the ticket has been sold it can not be returned
2.3	Proposed System Description
2.3.1	Overview
The proposed web based application should give customer announcements with lists of Movies title and show sessions, online Ticket Booking/Reservation system, should record the reservation seats, update existing records, search the timetable/schedule for the daily shown movies, register customers, reserve the seats and payments , prepare report for manager
Proposed system provides a solution to existing system problems by extending its facilities, making important information available online for users to view the information from the comfort of their own place whenever required, here in this project we are identifying the users and the tasks to be done by each user , the newly released Movies and the all the related information to display online on executable files and maintaining them with the help of Data Base i.e. storing all the released Movies with the help of server. 
Gondar cinema online cinema ticket reservation system will provide information to efficiently manage all of the customers services, effectively utilize people and motivate in selling, buying & distribution and dissemination of information, coordinate internal activities and communicate with customers/users . The proposed site increases the services of the organization income, records and decreases the overall work load in the employee‘s and the customers‘ undesired outcomes
Therefore, the proposed system will: 
	Enhances communication 
	It can be accessed over the Internet everywhere 
	Viewing and display the available Movie titles and show sessions with full information and can precede further for other information like ordering, payment and reservation 
	Security for the systems or the status will be confidential i.e. access is denied for unauthorized persons 
	Attractive and user friendly interfaces to navigate through the system for the users 
	Give time saving and reliable announcement /searching facility to the users 
	The system makes the overall project management much easier and flexible 
	Facilitates and speed up the information promotion and advertisement of the movies
	Speed up accessing ticket availabilities for movies
	Provides facilities to buy movie and theater tickets online.
	Generate reports immediately the status of ticket sales.
	Provide online payment service.
2.4	Functional Requirements
Functional requirements define the fundamental actions that system must perform. This online cinema ticket booking system consists of various modules with different functions described each module in system with its features and requirements described as follows: 
Req 1.	The system shall show movies new information.
Req 2.	The system shall show movies schedule.
Req 3.	The system shall enable customer or visitor to view list of movies.
Req 4.	The system shall allow customer to recharge his/her balance.
Req 5.	The system shall function to create account for customers who want to a member.
Req 6.	The system shall allow the employee to add movie schedule.
Req 7.	The system shall allow the employee to search movies schedule from the list
Req 8.	The system shall allow the employee to add movies.
Req 9.	The system shall allow the employee to update movies.
Req 10.	The system shall allow the employee to delete movies.
Req 11.	The system shall allow the employee to delete movies schedule from the list.
Req 12.	The system shall allow the employee to add movie adverts
Req 13.	The system shall allow the employee to delete movie adverts.
Req 14.	The system shall allow the admin to add employee.
Req 15.	The system shall allow the admin to delete employee.
Req 16.	The system shall allow the admin to view report.
Req 17.	The system shall record the following details for each movies.
1.	Movie Title
2.	Movie Description
3.	Movie Duration
4.	Movie Director
5.	Movie Photos/poster
Req 18.	The system shall have to allow delete or remove add movies only for administrator.
Req 19.	The system shall enable customer to purchase the movie ticket.
Req 20.	The system shall have book now button. When the book now is pressed, the system shall prompt customer to fill ticket purchase information.
Req 21.	The system shall display the message for the availability of seats for the selected movies based on the date and show time.
Req 22.	The system shall display both the customer and booking details.
Req 23.	The system shall allow the customer to pay online using YenePay payment getaway
2.5	Nonfunctional Requirements
1.	Security: 
	The system shall provide high level of security by blocking an authorised user to view system page.
	The external security should be provided by giving login authentication.
	The system uses password encryption mechanism.
2.	Performance: 
	We improve performance by using computers or laptops that have high processor speed
	The system is developed to run in different network level and strategy like LAN, MAN and WAN and different protocols.
3.	Usability
	The system has easy interface and user friendly so any persons can use it easily.
4.	Availability
	The availability of the software shall be for everyone who has an internet connection. So our s
	The system shall be available for 24 hours and 7 days a week.
5.	Correctness
	The results of the functions should be correct and accurate. Our system validate any inputs and check 
6.	Flexibility
	The operation shall be flexible and reports shall be presented in different ways.
7.	Maintainability
	After the deployment of the project if any error occurs then it should be easily maintained by the software developer.
8.	Portability
	The software shall work properly in any browsers.
9.	Reliability
	The performance of the software shall be better which will increase the reliability of the Service.
	The system shall require guide and help to be understood by user.
10.	Reusability
	The data and record that are saved shall be reused if needed.
11.	Scalability
	As the world is capable of change from time to time; there will be future change to the system as a result of the invention of new technology. Therefore the system can be upgraded to the new technology by scaling it.
12.	Robustness
	If there is any error in any window or module then it should not affect the remaining part of the software
 
CHAPTER 3
3.	SYSTEM MODEL
3.1	scenario
Scenario 1:
Scenario name: manage employee account
Participating actor: admin
Entry condition: the user must login using administrator privilege
Flow of events: 
1.	The admin login to the system using his/her account
2.	Choose manage employee navbar link
3.	Then the admin can add or delete specific employee account and he can edit employee information by click the manage button
Scenario 2:
Scenario name: Reserve ticket
Participating actor: customer
Entry condition: the customer must be login to the system with his/her account
Flow of event: 
1.	The customer login by his/her own account to the system
2.	Click the schedule button on the menu bar
3.	Select the movies
4.	Click reserve button 
5.	Select the seat number 
6.	Procced the payment process by click reserve button
7.	the system provide different option for payment
8.	if the customer pay the cash using his balance the system check weather the customer have enough balance and check whether the customer is registered
9.	after he payed the required fee customer gets notification of ticket number
Scenario 3:
Scenario name: Recharge balance
Participating actor: customer
Entry condition: the customer must login into the system. And use any type of online banking system.
Flow of event: 
1.	The customer click recharge balance .
2.	The system redirect to the YenePay checkout page
3.	The customer login into the YenePay account and the system display different payment methods.
4.	The customer select the presented payment method alternatives, the customer will complete the payment using the preferred payment method.
5.	After he complete the payment process the yenepay site redirect to the cinema cite
6.	When the payment is verified, he/she will notified by the system.
Scenario 4:
Scenario name: view movies schedules
Participating actor: user(customer , employee , administrator)
Entry condition: the customer ,employee, admin must login to the system with his/her account
Flow of event: 
1.	The user login by his/her own account to the system
2.	Simply open the schedule page and it will display the list of movies with their date and time
Scenario 5:
Scenario name: view report
Participating actor: administrator
Entry condition: the admin must login to the system with his/her account
Flow of event: 
1.	The admin login to the system
2.	Select the report link
3.	The system will generate the report 
4.	The admin can customize the report by deleting a row of data
Scenario 6:
Scenario name: manage movies
Participating actor: employee
Entry condition: the employee must login to the system with his/her account
Flow of event: 
1.	The employee login to the system
2.	Click manage movie button
3.	Type movies name that the customer want to manage
4.	The employee can edit the searched movie by update and delete operation
Scenario 7:
Scenario name: manage movie schedule
Participating actor: employee
Entry condition: the employee should have user name and password and must login to the system.
Flow of event: 
1.	The employee login to the system
2.	Click manage movie schedule button
3.	The employee add, delete , update movie schedule by using add, delete, update buttons
Scenario 8:
Scenario name: view log file
Participating actor: admin
Entry condition: the admin must login to the system with his/her account
Flow of event: 
1.	The admin login to the system
2.	The click show system log file button 
3.	The system display all operations that performed on the system by categorizing in terms of actors
4.	The admin click one of the actor that he want to view
5.	View all operation that performed by the clicked actor and the admin can filter the log file by using date
Scenario 9:
Scenario name: send comment for specific movie
Participating actor: Customer
Entry condition: the customer must login to the system with his/her account
Flow of event: 
1.	The customer login to the system
2.	The customer click watch now button on the movie card
3.	The card redirect to the movie detail page
4.	The customer write his comment on the comment section
Scenario 10:
Scenario name: send replay for specific comment
Participating actor: Customer
Entry condition: the customer must login to the system with his/her account
Flow of event: 
1.	The customer login to the system
2.	The customer click watch now button on the movie card
3.	The card redirect to the movie detail page and the page display the list of comment on that write for that movie
4.	The customer write his replay message for specific comment and he can chat with other people

Scenario 11:
Scenario name: check ticket
Participating actor: employee(ticket checker)
Entry condition: the employee must login to the system with his/her account
Flow of event: 
1.	The employee login to the system
2.	The worker click check ticket button
3.	The system display list of schedule and customer selected one of the listed schedule
4.	The system prepare a search bar to search the ticket for specific schedule
5.	After the employee search the ticket by the ticket number the system display the ticket detail information
6.	The employee change its status to used by click check it button

3.2	Use Cases
 Use case classes are used to model and represent units of functionality or services provided by a system (or parts of a system: subsystems or classes) to users.
3.2.1	Actor Identification
Actor classes are used to model and represent roles for "users" of a system, including human users and other systems. Based on this we identify the following user of our system:
	customers
	employee
	administrator
3.2.2	Usecase Identification
use cases are actions performed by the actors or users of the system. The activities performed by the above actors in this system are:
•	for customers
1.	Register
2.	login
3.	Show schedule
4.	Recharge balance 
5.	View list of movies
6.	View available seat
7.	View coming soon movies
8.	View current balance
9.	Manage personal ticket history
10.	Write comment
11.	Write replay message for the comment
12.	Change password and other personal information
13.	Reserve seat
14.	Send feedback for the employee
15.	Show cinema information
16.	manage comment history
17.	Make payment
18.	Show news
19.	Show movies information and preview
•	For employee
1.	Login in to the system
2.	Edit profile information
3.	Change password
4.	set movie schedule
5.	update movie information
6.	delete movie
7.	add movie
8.	update movie schedule
9.	delete movie schedule
10.	view detail schedule information
11.	Manage news
12.	View reservation list
13.	Show reservation tickets detail
14.	Change password
•	For administrator
1.	Login
2.	Change password and his personal information
3.	manage employee 
4.	view list of registered customer
5.	View ticket report
6.	View customer report
7.	View list of customer feedback
8.	View customer list
9.	Activate and deactivate account
10.	manage comment
11.	view log file
3.3	Use Case Diagram

 
Figure 3 1: usecase diagram for the system
3.3.1	Usecase Description
Use case description is a sequence of actions that provide measurable value to an actor. It is a way in which a real world actor interacts with the system. 
Use case name:	Register
Use case id:	Uc01 
Actor 	Customer
Description 	The system allow the customer registered
Precondition 	The customer wishes to register
Basic flow 	Customer action 	System response
	1.click sign up button 
3. The user enter required information and Click register button.	2. the system display registration form
4. validates the user information 
5. The system informs the user that they successfully registered.
Post condition:	The customer will use the website 
Alternatives Flows:	If the user enters invalid password and username
	4.2 go back to step3	4.1The system display try again error message
Table 3 1 : UC Register

Use case name:	Login
Use case id	Uc02
Actor 	employee, admin, customer
Description 	The system allow the employees, customers and the admin to login to the system
Precondition 	The employees, customer  and admin must have user name and password to login
Basic flow 	User action 	System response
	1.the users click login button
3. The users enter his/her username and password
4.Then click login button 	2. The system display login form
5. The system validates the entered information and display main page
Post condition:	The employee and users use their own pages 
Alternatives Flows:	If the employee  enters invalid user name or password 
	5.2 Employees and users re enter the correct information 	5.1 the system displays try again error message
Table 3 2 : UC Login
Use case name	manage movies schedule
Use case id 	Uc03
Actor	Employee 
Description	The system allow the employee to add, delete, and update movie schedule
Pre condition	The employee should visit the site
	employee action	System response
Basic flow	1.Click the schedule tab
3.then click “movie schedule” button
5.the user can manage the movie schedule
6.End use case	2.the system display the movies schedule button
4.the system will display movie schedule

Post condition	The movie schedule will be visited by customers
Alternative flow	If the user nothing found movie schedule
	6.1 an employee should enter any movie schedule 	

Table 3 3 : UC Manage movies schedule
Use case name	Reserve seat
Use case id 	Uc04
Actor	Customer
Description	The system allow the customers to Reserve ticket
Precondition	The user should have account 
	customer action	System response
Basic flow	1. Customer click “schedule” link 
3. Customer click on movie detail
5. Customer click reserve button
7. Customer select numbers of seat that he/she want to reserve
8.click reserve button.
	2.The system display schedule list
4.system display movie detail
6.The system display available seat
9.the system check the validate
10. the system uses the customer balance for the reservation process
11. end of use case
Post condition	After collecting information from user, this users seat should be reserved
Alternative flow	If the users has no enough money or if the seat is reserved 
	8.2. go back to the schedule page	8.1the system gives error message
Table 3 4 : UC Reserve seat

Use case name:	Recharge balance	
Use case id	UC05
Actor 	Customer
Description 	The system allows the customer to make payment for reserved ticket.
Precondition 	The customer must have YenePay account and use online banking
Basic flow 	User action 	System response
	1. the customer login to the customer page.
3. the customer click recharge balance button
5. the customer login to the YenePay
8. the customer click one of these option and proceed the payment procedure
10. end of use case	2.The system display the customer page
4. The system redirect to the YenePay payment getaway website
7. the system display list of payment option.
9. the system automatically validate the payment information and send a notification
Post condition:	customer make successful payment
Alternatives Flows:	If the customer have balance on the system

	4.1 customer click recharge balance button
4.2 customer fill the recharge balance number	4.3 The system display recharge balance form
4.4 the system will automatically decrease the balance
Table 3 5 : UC Recharge balance
Use case name	Manage movie
Use case id	Uc06
Actor	 Employee
Description	The system allow the employees to add, delete update movie 
Pre condition
	The employee should have user name and password and must login to the system
	User action	System response
Basic flow	1.Click the manage movie link 
3.the employee add, delete, update movie 
4.Click“add”,”delete”,“update” button
6.End use case	2.the system display manage  movie page
5.the system will check the validity and display  successful message
Post condition	The movie schedule will be added to the database.
Alternative flow
	If the employee enters invalid information 
	5.2 If nothing is found go to basic flow 	5.1the system gives error message
Table 3 6 : UC Manage movie
Use case name	Change username and password
Use case id	Uc07
Actor	Employee, customer, admin
Description 	The system allows the user to manage his/her account.
Precondition	The user must login to the system 
	User action	System response
Basic flow	1.the user login to the system
3.the user click his profile and click change username and password button. 
 5. The user insert his/her current and updated username and password
7.End use case	2.The system display the home page with user profile
4.The system display a form
6. The system will check the validity and display successfully message. 
Post condition	The user will be update his username and password
Alternative flows 	If the user enters invalid information 
	6.2 go back to step 5	6.1 the system display error message
Table 3 7: UC Change username and password
Use case name:	View Report
Use case id	Uc08
Actor 	Admin
Description 	The system allow the admin to see report
Precondition 	The admin must login to the admin page
Basic flow
	User action 	System response
	1.Click report link
3.the admin click report button
6.End use case	2.the system display the report page
4. the system fetches and display report 
5. The admin view report.
Post condition:	Admin view weekly and monthly reports
Table 3 8: UC View report
Use case name	Manage employee
Use case id	Uc09
Actor	Administrator
Description	The system allow Admin to add, delete.
Precondition	The administrator to login to the admin page
	User action	System response
Basic flow	1. The admin click “Manage employee” button.
3. The admin click add, delete employee button.	2. The system displays the Manage employee form
4. The system displays successful message
5.End use case
Post condition	Add new employee, delete the employee 
Alternative flow	if the admin insert invalid input for employee
	B. follow the same step from step 1	A.	the system display error message
Table 3 9: UC Manage employee
Use case name	Send comment
Use case id	UC10
Actor	Customer  
Description	The system allows the customer to send his feedback
Precondition	The Customer should an account and login to the system 
	Customer action	System response
Basic flow	1.Customer click specific movie 
3. The customer write any comment on the comment section
4.Then click “comment” button
6.end of use case	2.The system display a movie detail and also comment section
5.the system will save his/her comment
Post condition	Send customer comment to the admin

Table 3 10: UC Send comment
Use case name	manage comment
Use case id	UC12
Actor	admin
Description	The system allows the admin to manage customers feedback
Precondition	The admin must login to the system 
	admin action	System response
Basic flow

	1.admin click comment section 
3. The admin can manage these comments by deleting and view
4.end of use case	2.The system display all available comments

Post condition
	The admin has managed comments
Table 3 11: UC Manage comment
Use case name	Edit cinema information
Use case id	UC13
Actor	admin
Description	The system allows the admin to change information about the cinema
Precondition	The admin must login to the system 
	admin action	System response
Basic flow	1.admin click about cinema section 
3. The admin can write any text which describe about the cinema
4.end of use case	2.The system display a form to write any text

Post condition	The system must show updated cinema information to the customer

Table 3 12: UC Edit cinema information
3.4	Activity Diagram
An activity diagram illustrates the dynamic nature of a system by modeling the flow of control from activity to activity. An activity represents an operation on some class in the system that results in a change in the state of the system. Typically, activity diagrams are used to model workflow or business processes and internal operation. Because an activity diagram is a special kind of state chart diagram, it uses some of the same modeling conventions. Activity diagrams are mainly used as a flow chart consists of activities performed by the system. An Activity Diagram is similar to a flow chart; the one key difference is that activity diagrams can show parallel processing. [4]
 
Figure 3 2: Activity diagram for register
 
Figure 3 3: Activity diagram for login

 
Figure 3 4: Activity diagram for manage movies


 
Figure 3 5: Activity diagram for reserve ticket

 
Figure 3 6: Activity diagram for manage movie schedule
 
Figure 3 7: Activity diagram for Recharge balance
 
Figure 3 8: Activity diagram for view report
 
Figure 3 9: Activity diagram for send comment

 
Figure 3 10: Activity diagram for manage employee
3.5	Object Model
Object model refers to a visual representation of software or systems objects, attributes, actions and relationships.
3.5.1	Data Dictionary
This section hold data dictionary that is a collection of descriptions of the data objects or items and there attributes and the description of the attributes in a data model for the benefit of programmers and others who need to refer to them. In our system we have identified the following objects with their attributes.
Customer
Entity 	Attribute	Description
customer 	Fname	Describe the first name of the customer
	Lname	Describe the last name of the customer
	Email address	Describe the email address of the customer
	Username	Describe the username of the customer
	Password	Describe the security code of the customer
	Phone number	Describe the phone number of the customer
	Gender	Describe the sex of the customer
	City	Describe the location where the customer live
	Balance	Describe the current balance of the customer

employee
Entity 	Attribute	Description
employee	Fname	Describe the first name of the employee
	Lname	Describe the last name of the employee
	Email address	Describe the email address of the employee
	Username	Describe the username of the employee
	Password	Describe the security code of the employee
	Phone number	Describe the phone number of the employee
	Gender	Describe the sex of the employee
	City	Describe the location where the employee live

administrator
Entity 	Attribute	Description
administrator	Fname	Describe the first name of the admin
	Lname	Describe the last name of the admin
	Email address	Describe the email address of the admin
	Username	Describe the username of the admin
	Password	Describe the security code of the admin
	Phone number	Describe the phone number of the admin
	Gender	Describe the sex of the admin
	City	Describe the location where the admin live

schedule
Entity 	Attribute	Description
Schedule	Movie ID	Describe the identification number of the movie
	Movie title	Describe the title of the movie
	Show date	Describe the date where the movie is show
	Show time	Describe the time where the movie started
	Price	Describe the price of the movie ticket
	Seats	Describe the number of seat available 

movie
Entity 	Attribute	Description
Movie	Movie title	Describe the title of the move
	Movie type	Describe the category of the movie
	Movie length	Describe the duration of the movie
	Actor 	Describe the person who works on the movie
	Photo	Describe the poster of the movie
	Description	Describe information about the movies

news
Entity 	Attribute	Description
News	Headline	Describe the title of the news
	Date	Describe the date where the news was released
	News	Describe the description of new  message

report
Entity 	Attribute	Description
Report 	ID	Describe report identification number
	Username	Describe the customer who buy the ticket
	Movie title	Describe the title of the movie that you want to report
	Price	Describe the ticket price of the movie
	Date	Describe the date of the movie
	Time	Describe when the seat was reserved
	viewer	Describe the number of viewer available in the movie

Ticket 
Entity 	Attribute	Description
Ticket	ID	Describe identification number of the ticket
	Movie title	Describe the title of the movies
	Price	Describe the movies price.
	Date	Describe the date when the movies are shown
	Time	Describe the date when the movies are shown
	Seat	Describe the seat number

Comment 
Entity 	Attribute	Description
Comment	Id	Describe the identification id of the comment
	User name	Describe the name of commenter
	Email	Describe the email of commenter
	Comment	Describe the text that the user comment
	Date	Describe the date when the comment is commented

About
Entity 	Attribute	Description
About	Id	Describe the identification id of the information
	about	Describe the information about the cinema

Replay
Entity 	Attribute	Description
Replay	Id	Describe the identification id of the replay
	User name	Describe the sender name
	Comment	Describe to which comment the replay was sent
	Description	Describe the text that the user replay
	Date	Describe the date when the replay is commented

Bill
Entity 	Attribute	Description
payment	Id	Describe the identification of the bill
	payer	Describe the payer personal information
	amount	Describe the the currency of the bill
	date	Describe the date of the payment
	type	Describe the payment method
3.6	Class Model
Class Diagrams are used to represent the structure of the system in terms of objects, their notes and nature of relationship between classes. It shows the static features of the actors and do not represent any particular processing
	Employee: is the representation of the real world class or employee that interacts with system to accomplish the employee’s activity. 
	Customer: is the representation of the real world collection customer. 
	Administrator: is an administrator which uses the automated system to retrieve report.
	Movie:  it is the representation of the real world class of movie.
	Report: a summary of information about the ticket reserve to display to the administrator.
	Comment : feedback for the system
	Profile : an identification of users in to the system
	Payment : it is a set bill that performed on the system
	News : any announcement 
	Schedule :  a list of movies that has specific time to show.
	Ticket : a class that allows you to have a permission to participate in cinema. It is the representation of real world ticket.
 
Figure 3 11: Class diagram
3.7	Dynamic Model
3.7.1	Sequence Diagram
A sequence diagram is a UML interaction diagram. It represents the chronology of the passing of messages between system objects and actors. It may be used to illustrate a possible scenario of a use case, the execution of an operation, or simply an interaction scenario between classes of the system. [5]
 
Figure 3 12: Register Sequence Diagram

 
Figure 3 13: login sequence diagram


 
Figure 3 14: Reserve ticket Sequence Diagram
 
Figure 3 15:  Manage movie schedule Sequence Diagram


 
Figure 3 16: Employee Manage Sequence Diagram


 
Figure 3 17: Recharge balance Sequence Diagram
3.8	User Interfaces
 
Figure 3 18 : welcome page UI

 
CHAPTER FOUR
4.	SYSTEM DESIGN
4.1	introduction
Systems design is the process of defining the architecture, components, module, interfaces, and data for a system to satisfy specified requirements. [6] In this section the we provide a brief overview of the software architecture and the design goals (Subsystem decomposition, Hardware/software mapping, Persistent data management and Access control and security).  In order to achieve effective online cinema ticket  reservation system, structured system analysis and design methodology were used. This is because structured system analysis and design methodology is an internationally accepted software engineering model mainly used in most result oriented analysis and design
4.2	Current Software Architecture
Since the existing techniques are manual there is no software architecture.
4.3	Proposed Software Architecture
The purpose of designing is to show the direction as to how application is developed and obtain clear and obtain clear and enough information needed to derive the actual implementation of the application. The work is based on the services provided in the internet to customer. Once the services is available based on the customer request the services will be delivered with each specific privilege to access, to receive, to visit site. The architecture used for the system is a 3 tire client/server architecture where the client can use internet browsers to access the online Gondar cinema ticket reservation system. it stores these data in a relational database management system. the middle level( web/application server) implements the business logic, controller logic and presentation logic to control the interaction between the application’s client and data.
In the proposed system the Gondar cinema have online ticket reservation system that gives different services for users like giving movies information, online payment, view movies schedule. Therefore, the system must maintain the data store 
 
Figure 4 1: software architecture
4.4	Subsystem Decomposition
System decomposition is undertaken to reduce the complexity of the system and gaining insight into the identity of the constituent components. The system is decomposed into sub-systems which are a collection of classes, associations, operations, events and constraints that are closely interrelated with each other.
The proposed web-based cinema ticket reservation system is decomposed into smaller sub-system.
Registration subsystem: - this sub-system concern about the registration of customer and movies with their personal details.
Employee management subsystem: - this sub-system is concern about managing employee account and managing the system 
Ticket reservation subsystem: - this sub system used to manage the ticket. This sub system is accessed by the customer to reserve ticket. It also contains a subsystem called seat reservation.
Report management subsystem: -this sub-system used for generate the report and it accessed by the admin.
Comment/feedback management subsystem: - this sub-system used for manage comments that comes from the customer. It accessed by employee and administrator privilege.
Movies schedule management subsystem: - this sub-system used to manage any movies schedule that show in the cinema hall. The subsystem accessed by the admin. He can delete, update, add any movies schedule. 
Movies management subsystem: - this sub system used to manage the movies that are available on the system. It also used to categorize these movies in to different field. So the user can easily filter the movies. And this sub system used to add, delete, update movies information.
Payment management subsystem:-this sub system used to recharge customers balance and use this balance in ticket reservation subsystem
4.4.1	Component Diagram
In this Diagram components of the system will be wired showing that there is relation among components, management of the system, database and operation preformed on database such issue. This in some extent show which subsystem will be accessed by whom and what type of security infrastructures it is using.
 
Figure 4 2: component diagram
4.5	Hardware/Software Mapping
This section describes the hardware / software mapping of the proposed system. To describe this we use the UML deployment diagram.
 
Figure 4 3: Deployment diagram for hardware and software mapping

4.6	Persistence Data Management
It describes the persistent data stored by the system and the data management infrastructure required for it. Moreover, storing data in a database enables the system to perform complex queries on large data sets. Persistent data denoted information that is rarely accessed and not likely to be modified. Persistent storage is any data storage device that retains data after power to that device is shut off.  It also sometimes referred to as non-volatile storage. Since we follow object oriented approach to develop our system, the persistence data management is described using object diagram. The reason we select object oriented approach is it is used to manage the complexity of software systems. 
Object diagram is a diagram that shows a complete or partial view of the structure of a modeled system at a specific time. It’s a graph of instances, including objects and data values. An object diagram is an instance of a class diagram; it shows a snapshot of the detailed state of a system at a point of time.
 
Figure 4 4: Persistent data model diagram
4.7	Access Control And Security
In the systems, different actors have access to different functionality and data therefore these privileges prevent unauthorized users from accessing data’s which they don’t have granted to access authentication. This take place by letting users to insert their user name and password in the displayed login form.
	Actors
Functions	Admin	Employee	Customer
View comment	 		
Generate report	 		
Manage employee	 		
View movie schedule	 	 	 
Give comment			 
Search movie		 	
View available seat	 	 	 
Register			 
Reserve ticket			 
Change schedule		 	
Set seat limit		 	
Set schedule	 		
View current balance			 
Manage movie schedule		 	
Send comment			 
View movies	 	 	 
View news	 		
Update movie banner		 	
Manage comment	 		
Manage report	 		
Change user name and password	 	 	 
Table 4 1: Access control
4.8	Detailed Class Diagram
Detailed class diagram is class diagram with visibility and signature specified for each attributes and operations. In this class diagram we define which attributes and operations are private to that class, which attributes and operations can be accessed by the class protected. And which attributes and operations are publicly accessible by the class user(public). We also define the return type of each operations as well as the number and type of parameters of each operations  
Figure 4 5 : Detail class diagram
4.9	Package Diagrams
A package diagram in the UML depicts the arrangement, organization and dependencies between the packages that make up a model.
Package: a general proposed mechanism for organizing model statements into groups. It provides an encapsulated more space within which all the names must be unique. It is used to group semantically related elements. The subsystems can be divieded into three packages.
	Interface package layer is client tier that is user identified
	Application package layer is middle tire that subsystem
	Storing packages layer is data tier that is database of the system
 
Figure 4 6: Package diagram
4.10	Deployment Diagram
Deployment diagram shows physical communication links between hardware items. And relationship between physical machine and processes. It also shows how the software and the hard ware component work together. [7]
 
Figure 4 7 : Deployment diagram
 
5.	CONCLUSION
In general, the software that we developed will benefit the Gondar cinema which is found in Gondar city.  The benefits of our system can be summarized as improved manual system and safety customers service by making computerized and online ticket reservation.
While developing an electronic system in Gondar cinema we have gained more knowledge and experience about the different phases of the software development life-cycle, php programming languages. As a information System student we are working together and to solve a lot of manual ticketing reservation system. We hope that our system can solve lot of problems encountered in the manual system.  

 
6.	RECOMMENDATION
The system that we have tried to automate is not the whole system of the online cinema ticket reservation system. Because of time limitation and budget, we can’t develop all parts of the system, but we tried to automate most of sub systems and functionalities.
The following functionalities can’t be automated because of the limitations that we have discussed above.
	Ticket cancelation possible.
	The system supports local languages (Amharic, oromic) it will be clear to the user to manipulate the system
Therefore, others interested individuals to develop on online cinema Ticket reservation can get some initial idea about the system and no need of more data gathering process the only need will be improving the system.














7.	REFERENCES

[1] 	ELC, "what will be the future of the entertainment industry?," 5 April 2021. [Online]. Available: https://wcuquad.com/6018215/arts-entertainment/what-will-be-the-future-of-the-entertainment-industry/.
[2] 	tesfaye, yordanos, konjit, ayalew, emebiet, "CINEMA HOUSE MANAGEMENT.pdf," 2019. [Online]. Available: https://www.coursehero.com/file/125046471/CINEMA-HOUSE-MANAGEMENTpdf/.
[3] 	T. husan, "customer's payment experience," 5 april 2019. [Online]. Available: https://community.yenepay.com/docs/getting-started/customers-payment-experience/.
[4] 	"UML Activity Diagram," smart draw, [Online]. Available: https://www.smartdraw.com/uml-diagram/examples/uml-activity-diagram/.
[5] 	"Chapter 5 Building Dynamic Diagrams," sybase, [Online]. Available: https://infocenter-archive.sybase.com/help/index.jsp?topic=/com.sybase.stf.powerdesigner.docs_12.5.0/html/clug/clugp186.htm.
[6] 	B. S. W. J. F. Blanchard, Systems Engineering and Analysis (5th Ed.), New Jersey: Prentice Hall., 2010. 
[7] 	A. Athuraliya, "The Easy Guide to UML Deployment Diagrams," 27 september 2021. [Online]. Available: https://creately.com/blog/diagrams/deployment-diagram-tutorial/.
[8] 	B. B. &. A. H. Dutoit, Object oriented software engineering th Using UML, patterns, and Java third edition. 





 
8.	APPENDIX
Sample Interview questions 
1.	How and when your organization established?
2.	How many number of seats does the cinema hall has?
3.	What is the objective of the organization?
4.	What is mission and vision of the organization?
5.	The input and output of the current system?
6.	Actor of the current system and their role?
7.	How does this existing ticket reservation system performing the activities?
o	Is it manual?
o	It it computerized?
8.	What are the things a customer has to do in a cinema house to watch a movie?
9.	What are the problem of the current system during the process of ticket reservation?
 

