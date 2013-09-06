COMPOSE Flyport example
=============

This is a sample project for Flyport WiFig. It demonstrates how to store temperature sensor data into a COMPOSE Service Object (SO).

For information on COMPOSE core platform and generation of SOs, please refer to:
http://www.compose-project.eu/content/software-information

For information on the Flyport platform please check: 
http://www.compose-project.eu/content/hardware-information

To ease the communication with the COMPOSE core platform, a COMPOSE Flyport library has been developed (based heavily on HTTP Library (http://wiki.openpicus.com/index.php/HTTPicus) for the Flyport).

To use the library simply:
- Include the header file in your taskFlyport.c file:
<code>#include "compose.h"</code>

and put the compose library files inside the 'Libs/ExternalLib' folder of your Flyport project.

- Edit the "Libs/ExternalLib/compose.c" file and change the value of "pp.authorization" with your authorisation token.

- Use in your code the method posSensorValue("SO_name", sensor_value, "SO_ID")

- Before compiling your Flyport project, run the configuration Wizard and at the 'TCP Socket Configuration' section, select "GENERIC_TCP_CLIENT" and put 600 for TX Buffer and 200 for RX Buffer.

- Remember to put the correct WiFi Access Point settings at the next step :)

Remember also that you need first to register to COMPOSE and create a COMPOSE Service Object. To register into COMPOSE and receive an authorisation token (API Key) please visit:
http://testbed.compose-project.eu:8081/

To create a SO you can use the following link:
http://testbed.compose-project.eu:8081/thngs/create

OR follow these steps:
- Make a POST request to:
http://testbed.compose-project.eu:8010/thngs/create.json

- Including in the request header the following:
authorisation: YOUR_API_TOKEN

- Including in the body a JSON representing your SO, like the following:

<code>
{
  "streams": {
    "streams": [
     {
      "name":"location",
      "url":"location",
       "channels": [
       {
         "unit": "celcius",
         "type": "numeric",
         "name": "temperature"         
       }
     }
}
</code>

The POST should return the new SO ID that you need to use in the "postSensorValue" method.
