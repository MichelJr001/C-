/**
*
* @author: Michel Anderson
* @github: MichelJr001
* @Twitter: _Michel_Jr_
*
*/

#include <iostream>

using namespace std;

int main(){
	system("clear");
	int num, resp, cont;

	cout << "\t\t TABUADA\n\t\t -------\n\n";
	cout << "\t[+] Tabuada desejada: ";
	cin >> num;
	cout << "\n";

	for (cont = 0; cont <= 10; cont++){
		resp = num * cont;
		cout << " " << num << " X " << cont << " = " << resp << endl;
	}
}
