Domain: Agriculture. 
Implement a mini-system what allows storing information about Fields, Tractors and Processed Fields and generating additional reports.


Preferred Frameworks: PHP / Symfony

Following features need to be implemented

Core Requirements:
1. Entering information about Fields. Each Field has:
- Name
- Type of Crops (Wheat, Broccoli, Strawberries)
- Area
2. Entering information about Tractors. Each Tractor is represented by: 
- Name
3. Storing information about Processing a Field. Process is as follows:
- Select a Tractor
- Select a Field
- Enter a date
- Enter area which should not exceed the area of the selected Field
- Save the information
4.Create a report for Processed Fields. Report should include:
- Name of the Field
- Culture
- Date
- Name of the Tractor
- Processed Area
As summary the report should output the total amount of processed area.
5. The report should allow filtering/search by following parameters:
- Name of the Field
- Culture
- Date
- Name of the Field

Additional:
- Authentication functionality
- Each user can manage only the fields he created
- Read access is allowed for all users
- Admin users can be manage all fields


- REST api
- Structure: Repositories, Entities, Services, API, etc...
- API Documentation (e.g. swagger)
- README
