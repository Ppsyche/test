#include <iostream>
using namespace std;
int main() {
	int n,m,i,j,p,q;
	cin>>n>>m;
	int a[1000],b[10000];
	for(i=0; i<m; i++){
		cin>>a[i];
	}
	p=0;
	q=0;
	b[0]=a[0];
	b[1]=a[1];
	i=0;
	while(i<n){
		for(j=0; j<b[p]; j++){
			cout<<a[q]<<endl;
			b[i]=a[q];
			i++;
			if(i==n)
				break;
		}
		p++;
		q=(q+1)%m;
	}
	return 0;
}