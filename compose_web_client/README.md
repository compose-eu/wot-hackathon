compose_web_client
=============

A simple example on how to read data from a COMPOSE Service Object (SO) using a GET HTTP Request. 

Visualization is performed using the RGraph Javascript library.

The output looks like this:
http://www.compose-project.eu/hackathon/temperature/

The main index.php script checks every 10 seconds using an AJAX call to the hackathon.php the latest sensor reading stored within a COMPOSE SO. 
Then it visualises it.

The script hackathon.php makes a GET request to the COMPOSE SO, parses the JSON output and outputs the latest object value. 

More information on COMPOSE core platform and SO at http://www.compose-project.eu/content/software-information
