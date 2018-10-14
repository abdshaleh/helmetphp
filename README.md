#php script for detecting sqli,xss and lfi attack on your system.

###Usage:
You have to just include this file in other php file and maintain the application by handling the variables which will return true for different attacks.

*SQLI (post): 
	If this script detects a sqli attack on post request then post_sqli variable will return true ($post_sqli=true)
*SQLI (get):
	If this script detects a sqli attack on post request then get_sqli variable will return true ($get_sqli=true)

*XSS (post):
	If this script detects a xss attack on post request then post_xss variable will return true ($post_xss=true)
*XSS (get):
	If this script detects a sqli attack on post request then get_xss variable will return true ($get_xss=true)

*LFI:
	If this script detects a lfi attack on post request then lfi variable will return true ($lfi=true)

