#include "compose.h"
#include "TCPlib.h"
#include "httplib.h"


void postSensorValue(char* channel_name, double value, char* soId)
{
	TCP_SOCKET* socket = create_http_socket("api.compose-project.eu");
	
	char* tmp_res = (char*)malloc(28+strlen(soId)+strlen(channel_name)*sizeof(char));
	
	sprintf(tmp_res, "/thngs/%s/streams/%s/store.data",soId,channel_name);
	
	struct HTTP_HEADER_REQUEST pp;
	pp.method = "PUT";
	pp.resource = tmp_res;
	pp.version = "HTTP/1.1";
	pp.host = "api.compose-project.eu";
	pp.parameters_size = 2;
	pp.content_type="application/json";
	pp.authorization = "YOUR_API_KEY";
	
	char* param = (char*)malloc(54+sizeof(value)+strlen(channel_name)*sizeof(char));
	sprintf(param,"{\"channels\": [{\"name\": \"%s\",\"current-value\": %3.2f}]}",channel_name, value);
	
	
	char* payload[] = {param,""};
	
	pp.parameters = payload;
	
	char* request = get_http_request(&pp);
	
	do_http_request(socket,request);
	free(request);
	
	
	char* response = http_get_response(socket);
	UARTWrite(1,response);
	free(response);
	close_socket(socket);
	free(tmp_res);
	free(param);
	
}