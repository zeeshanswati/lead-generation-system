Bold Leads
===================
lead Generation System
-------------
lead generation system for Real Estate Agents to collect the lead information and connect agent to lead in simplest way. Home owner can fill their information on landding page and Agents can see all leads on dashborad.php.

instruction
----------
* Change the database configuration in **includes/Querybuilder.php**
* Import database from **database/boldleads-Lead-system-10-8-1708.sql**

----------


Usage
-------------


You can use QueryBuilder in many ways

> **Example:**
```bash
# Create an Object of class QueryBuilder
$objDb = new QueryBuilder();

# Get all records from table
$objDb->table('tablename')->get();

# Get single record by ID
$objDb->table('tablename')->getById(4);

#select fewer columns by passing column names as array in get()
$objDb->table('tablename')->get(['column1', 'column2']);

#You can use WHERE like this
$objDb->table('tablename')
	->where('column1', '=', 'abc')
	->get(['column1', 'column2']);

#or use multiple WHERE
$objDb->table('tablename')
	->where('column1', '=', 'abc')
	->where('column2', '=', 'xyz')
	->where('column3', '!=', 'cba')
	->get();

# Insert record
# This will return inserted ID
$objDb->table('tablename')
	->insert(["column1" => "abc", "column2" => "xyz"]);

# Update record
$objDb->table('tablename')
	->where('column1', '=', 'abc')
	->update(["column1" => "abc", "column2" => "xyz"]);



``` 
