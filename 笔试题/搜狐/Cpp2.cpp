#include <iostream>
using namespace std;
int main() {
	int a[10000][6],i=0,j,b=0,t;
	while(1){
		int flag=0;
		for(j=0; j<6; j++){
			cin>>a[i][j];
			if(a[i][j]!=0)
				flag=1;
		}
		i++;
		if(flag==0)
			break;
		
	}
	for(j=0; j<i; j++){
		b=0;
		while(1){
			if(a[j][5]>0){
				b++;
				a[j][6]--;
			}else if(a[j][4]>0){
				b++;
				a[j][0]-=6;
			}else if(a[j][3]>0){
				b++;
				if(a[j][1]>=5){
					a[j][1]-=5;
				}else{
					a[j][0]=a[j][0]-(5-a[j][1])*2;
					a[j][1]=0;
				}
			}else if(a[j][2]>0){
				b++;
				if(a[j][2]>=4){
					a[j][2]-=4;
				}else{
					a[j][2]=0;
				}
			}else if(a[j][1]>0){
				b++;
				if(a[j][1]>=18){
					a[j][1]-=18;
				}else{
					a[j][1]=0;
				}
			}else if(a[j][0]>0){
				b++;
				if(a[j][0]>=36){
					a[j][0]-=36;
				}else{
					a[j][0]=0;
				}
			}else{
				break;
			}
		}
		cout<<b<<endl;
	}
	return 0;
}