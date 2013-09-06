#include "taskFlyport.h"
#include "grovelib.h"
#include "compose.h"
#include "analog_temp.h"


void FlyportTask()
{	
	vTaskDelay(100);
	UARTWrite(1,"Welcome to GROVE NEST example!\r\n");

	// GROVE board
	void *board = new(GroveNest);
	
	void *tempAn = new(An_Temp);
 
	// Attach devices
	attachToBoard(board, tempAn, AN1);
 
	float anVal = 0.0;
	char mess[50];
	char msg[50];
	
	// Connection to Network
	#if defined (FLYPORT_WF)
	WFConnect(WF_DEFAULT);
	while (WFStatus != CONNECTED);
	#endif
	#if defined (FLYPORTETH)
	while(!MACLinked);
	#endif
	UARTWrite(1,"Flyport connected... hello world!\r\n");
	vTaskDelay(200);
	
	
	while(1)
	{
		postSensorValue("temperature", (double)(get(tempAn)), "1377515972748279ff7a4b8ee4b27ba6f6db0412227ba");
		
		vTaskDelay(6000);
	}
}


